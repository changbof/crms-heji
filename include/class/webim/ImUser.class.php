<?php
if(!defined('ACCESS')) {exit('Access denied.');}

class ImUser extends Base{
	//前缀
	private static $table_prefixs = 'im_';
	// 表名
	private static $table_name = 'user';
	// 查询字段
	private static $columns = 'id,username,userpass,userid,useremail,userface,usersign,userstatus,lastonlinetime,usergender,userpower,syscode';

	public static function getTableName(){
		return self::$table_prefixs.self::$table_name;
	}
	
	public static function updateUserByUserName($user_name,$user_data) {
		
		if (! $user_data || ! is_array ( $user_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("userid"=>$user_name);		
		$id = $db->update ( self::getTableName(), $user_data, $condition );

		return $id;
	}
	
	public static function addUser($user_data) {
		if (! $user_data || ! is_array ( $user_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $user_data );
		return $id;
	}
	
	public static function delUser($user_id) {
		if (! $user_id || ! is_numeric ( $user_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("userid"=>$user_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	}

}