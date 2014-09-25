<?php
error_reporting(E_ERROR);
/**
 * 文件: database.inc.php
 * 描述: 数据库操作类
 * 作者: heiyeluren
 * 说明: 本库使用PHPLib DB库作为核心, 同时增加一些实用方法, 详细参考注释
 */
class DB_MySQL { 
public $dsn = array( 
'Host'     => 'localhost', 
'User'     => 'root', 
'Password' => 'root', 
'Database' => 'osadmin'
); 

/* private: link and query handles */ 
private $Link_ID = 0; 
private $Query_ID = 0; 

/* public: current error number and error text */ 
public $Errno = 0; 
public $Error = ''; 

/* public: configuration parameters */ 
public $Halt_On_Error = 'yes'; // "yes" (halt with message), "no" (ignore errors quietly), "report" (ignore errror, but spit a warning) 
public $PConnect      = 0; 
public $QueryNum      = 0;     //所有的查询都通过query（）函数，这样便于统计查询次数 

function __destruct() { 
$this->close(); 
} 

function connect($dsn = null) { 
if ($dsn) {$this->dsn = $dsn;} 

if (!$this->dsn) {$this->error('请配置数据库连接参数');} 

if ( 0 == $this->Link_ID ) { 
	if (!$this->PConnect) { 
		$this->Link_ID = @mysql_connect($this->dsn['Host'], $this->dsn['User'], $this->dsn['Password']); 
	} else { 
		$this->Link_ID = @mysql_pconnect($this->dsn['Host'], $this->dsn['User'], $this->dsn['Password']); 
	} 

	if (!$this->Link_ID) { 
	$this->error("Could not connect to the database server " ); 
	return false; 
	} 

	if ($this->version() > '4.1') { 
	@mysql_query('SET NAMES utf8');
	@mysql_query('SET character_set_connection= utf8, character_set_results= utf8, character_set_client = binary', $this->link); 

		if ($this->version() > '5.0.1') { 
			@mysql_query("SET sql_mode=''", $this->link); 
		} 
	} 

	if ($this->dsn['Database']) { 
	if (!@mysql_select_db($this->dsn['Database'], $this->Link_ID)) { 
	$this->haltmsg("cannot use database " . $this->dsn['Database']); 
	return false; 
	} 
} 

} 
return $this->Link_ID; 
} 

/** 
* 方法: affected_rows() 
* 功能: 取得前一次 MySQL 操作所影响的记录行数 
* 参数: 
* 返回: 执行成功则返回受影响的行的数目，如果最近一次查询失败的话，函数返回 -1。 
*/ 
function affected_rows() { 
return @mysql_affected_rows($this->Link_ID); 
} 

/** 
* 方法: query($Query_String) 
* 功能: 发送一条 MySQL 查询 
* 参数: $sql 需要执行的SQL语句，例如：query("SELECT * FROM table1 WHERE id = '1'") 
* 返回: 仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符。 
*/ 
public function query($Query_String) { 
if (!$this->Link_ID) { 
$this->error('数据库连接丢失'); 
return false; 
} 

if ($Query_String) { 
$this->Query_ID = @mysql_query($Query_String, $this->Link_ID); 
$this->Errno = mysql_errno(); 
$this->Error = mysql_error(); 
if (!$this->Query_ID) { 
$this->Error("Invalid SQL: " . $Query_String); 
} 
$this->QueryNum = ($this->QueryNum + 1); 
return true; 
} else { 
$this->error('sql语句为空'); 
return false; 
} 
} 

/** 
* 方法: execute($sql) 
* 功能: 执行一条SQL语句，主要针对没有结果集返回的SQL 
* 参数: $sql 需要执行的SQL语句，例如：execute("DELETE FROM table1 WHERE id = '1'") 
* 返回: 更新成功返回True，失败返回False 
*/ 
function execute($sql) { 
if (empty($sql)) { 
$this->error("sql语句为空"); 
} 
if (!$this->query($sql)) { 
return false; 
} 
return true; 
} 

/** 
* 方法: get_all($sql) 
* 功能: 获取SQL执行的所有记录 
* 参数: $sql 需要执行的SQL,例如: get_all("SELECT * FROM Table1") 
* 返回: 返回包含所有查询结果的二维数组 
*/ 
function get_all($sql) { 

$result_array = array(); 
$this->query($sql); 

while($row = mysql_fetch_array($this->Query_ID)) { 
$result_array[]=$row; 
} 

return $result_array; 

} 

/** 
* 方法: get_One($sql) 
* 功能: 获取SQL执行的一条记录 
* 参数: $sql 需要执行的SQL,例如: get_One("SELECT * FROM Table1 WHERE id = '1'") 
* 返回: 返回包含一条查询结果的一维数组 
*/ 
function get_One($sql) { 
$this->query($sql); 
return mysql_fetch_array($this->Query_ID); 
} 

/** 
* 方法: count($sql) 
* 功能: 统计表中数据总数 
* 参数: 
* $table 需要统计的表名 
* $field 需要统计的字段，默认为* 
* $where 条件语句，缺省为空 
* 例如 按照ID统计所有年龄小于20岁的用户, count("user_table", "id", "user_age < 20") 
* 
* 返回: 返回统计结果的数字 
*/ 
function count($table,$field="*", $where="") { 
$sql = (empty($where) ? "SELECT COUNT($field) FROM $table" : "SELECT COUNT($field) FROM $table WHERE $where"); 
$result = $this->get_one($sql); 
if (!is_array($result)) { 
return false; 
} 
return $result[0]; 
} 

/** 
* 方法: insert($table,$dataArray) 
* 功能: 插入一条记录到表里 
* 参数: 
* $table 需要插入的表名 
* $dataArray 需要插入字段和值的数组，键为字段名，值为字段值，例如：array("user_name"=>"张三", "user_age"=>"20岁"); 
* 例如   比如插入用户张三，年龄为20, insert("users", array("user_name"=>"张三", "user_age"=>"20岁")) 
* 
* 返回: 插入记录成功返回True，失败返回False 
*/ 
function insert($table,$dataArray) { 
if (!is_array($dataArray) || count($dataArray)<=0) { 
$this->error("Invalid parameter"); 
} 
while(list($key,$val) = each($dataArray)) { 
$field .= "$key,"; 
$value .= "'".addslashes(urldecode($val))."',"; 
} 
$field = substr($field, 0, -1); 
$value = substr($value, 0, -1); 
$sql = "INSERT INTO $table ($field) VALUES ($value)"; 
if (!$this->query($sql)) { 
return false; 
} 
return true; 
} 

/** 
* 方法: update($talbe, $dataArray, $where) 
* 功能: 更新一条记录 
* 参数: 
* $table 需要更新的表名 
* $dataArray 需要更新字段和值的数组，键为字段名，值为字段值，例如：array("user_name"=>"张三", "user_age"=>"20岁"); 
* $where 条件语句 
* 例如   比如更新姓名为张三的用户为李四，年龄为21 
*    update("users", array("user_name"=>"张三", "user_age"=>"20岁"), "user_name='张三'") 
* 
* 返回: 更新成功返回True，失败返回False 
*/ 
function update($table, $dataArray, $where) { 
if (!is_array($dataArray) || count($dataArray)<=0) { 
$this->error("Invalid parameter"); 
} 
while(list($key,$val) = each($dataArray)) { 
$value .= "$key = '$val',"; 
} 
$value = substr($value, 0, -1); 
$sql = "UPDATE $table SET $value WHERE $where"; 
if (!$this->query($sql)) { 
return false; 
} 
return true; 
} 

/** 
* 方法: delete($table, $where) 
* 功能: 删除一条记录 
* 参数: 
* $table 需要删除记录的表名 
* $where 需要删除记录的条件语句 
* 例如   比如要删除用户名为张三的用户，delete("users", "user_name='张三'") 
* 
* 返回: 更新成功返回True，失败返回False 
*/ 
function delete($table, $where) { 
if (empty($where)) { 
$this->error("Invalid parameter"); 
} 
$sql = "DELETE FROM $table WHERE $where"; 
if (!$this->query($sql)) { 
return false; 
} 
return true; 
} 


/** 
* 方法：get_insert_id() 
* 功能：获取最后插入的ID 
* 参数: 无参数 
* 返回：关闭成功返回ID，失败返回0 
*/ 
function get_insert_id() { 
return mysql_insert_id($this->Link_ID); 
} 

function version() { 
return mysql_get_server_info($this->Link_ID); 
} 

function close() { 
mysql_close(); 
} 

/* private: error handling */ 
function error($msg = '') { 
$this->Error = @mysql_error($this->Link_ID); 
$this->Errno = @mysql_errno($this->Link_ID); 

if ($this->Halt_On_Error == "yes") { 
die($this->haltmsg($msg)); 
} elseif ($this->Halt_On_Error == "no") { 
die("Session halted"); 
} elseif ($this->Halt_On_Error == "report") { 
$this->haltmsg($msg); 
} 

} 

private function haltmsg($msg) { 
$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>无标题文档</title> 
<style type="text/css"> 
<!-- 
body,td,th { 
font-family: Verdana, Arial, Helvetica, sans-serif; 
font-size: 12px; 
color: #000000; 
} 
body { 
background-color: #FFFFFF; 
} 
--> 
</style></head> 
<body>'; 
$message .= '<b>出现错误:</b> ' . htmlspecialchars($msg) . ' 
'; 
$message .= '<b>Mysql error description</b>: ' . $this->Error . ' 
'; 
$message .= '<b>Mysql error number</b>: ' . $this->Errno . ' 
'; 
$message .= '<b>Date</b>: ' . gmdate('Y-m-d H:i:s',time()+28800) . ' 
'; 
$message .= '<b>Script</b>: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . ' 
'; 
$message .= '<p /></body></html>'; 

echo $message; 
} 

} 

?>