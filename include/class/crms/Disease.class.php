<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Disease extends Base {
	// 表名
	private static $table_name = 'disease';
	private static $table_prefixs = 'crm_';
	// 查询字段
	private static $columns = 'id,disease_name,disease_pathology,disease_prognostic,disease_symptom,disease_complication,disease_drug,disease_therapy,disease_check,rec_hospital,nutrients_effect,precautions,owner_id';
	// 查询字段
	private static $fields = '`disease_name`,`disease_pathology`,`disease_prognostic`,`disease_symptom`,`disease_complication`,`disease_drug`,`disease_therapy`,`disease_check`,`rec_hospital`,`nutrients_effect`,`precautions`,`owner_id`';
	
	public static function getTableName(){
		return self::$table_prefixs.self::$table_name;
	}
	
	//列表 
	public static function getDiseases($key='',$start ='',$page_size='') {
		$db=self::__instance();
		$limit ="";
		$where = " where 1=1 ";
		if($key!=''){
			$where .= " and LOCATE('".$key."',CONCAT(`disease_name`,`disease_symptom`,`nutrients_effect`))>0 ";
		}
		if($page_size){
			$limit =" limit $start,$page_size ";
		}
		$sql="select id, disease_name,
						CONCAT(left(disease_symptom,30),'...') as disease_symptom,
						CONCAT(left(disease_drug,20),'...') as disease_drug,
						CONCAT(left(nutrients_effect,25),'...') as nutrients_effect,
						CONCAT(left(precautions,30),'...') as precautions,
				coalesce(u.user_name,'已删除') as owner_name 
			  from ".self::getTableName()." q 
			  left join ".User::getTableName()." u on q.owner_id = u.user_id ".$where." 
			  order by q.id desc $limit ";
		$list = $db->query($sql)->fetchAll();
		if ($list) {
			return $list;
		}
		return array ();		
	}

	public static function getDiseaseById($disease_id) {
		if (! $disease_id || ! is_numeric ( $disease_id )) {
			return false;
		}
		$db=self::__instance();
		$condition['id'] = $disease_id;
		$list = $db->select ( self::getTableName(), self::$columns, $condition );
		if ($list) {
			return $list [0];
		}
		return array ();
	}

	public static function getRandomDisease() {
		$db=self::__instance();
		$sql="select min(id), max(id) from ".self::getTableName();
		$list = $db->query($sql)->fetch();
		if ($list) {
			$disease_id=rand($list[0],$list[1]);
			$condition['id[>=]'] = $disease_id;
			$list = $db->select ( self::getTableName(), self::$columns, $condition );
			if ($list) {
				return $list [0];
			}
		}
		return array ();
	}
	
	//作为下拉列表
	public static function getDiseaseForOptions(){
		$disease_list = self::getDiseases ();
		
		foreach ( $disease_list as $disease ) {
			$disease_options_array [$disease ['id']] = $disease ['disease_name'];
		}
		
		return $disease_options_array;
	}
	//取合计数量
	public static function count($key = '') {
		$where = " where 1=1 ";
		if($key!=''){
			$where .= " and LOCATE('".$key."',CONCAT(`disease_name`,`disease_symptom`,`nutrients_effect`))>0 ";
		}
		$db=self::__instance();
		$num = 0+($db->query( "select count(*) from ".self::getTableName().$where )->fetchColumn());
		return $num;
	}

	/*******************************
	 *
	 * CURD
	 *
	 ******************************/

	public static function addDisease($disease_data) {
		if (! $disease_data || ! is_array ( $disease_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $disease_data );
		return $id;
	}

	public static function updateDisease($disease_id,$disease_data) {
		if (! $disease_data || ! is_array ( $disease_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("id"=>$disease_id);
		$id = $db->update ( self::getTableName(), $disease_data,$condition );
		
		return $id;
	}
	
	public static function delDisease($disease_id) {
		if (! $disease_id || ! is_numeric ( $disease_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("id" => $disease_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	} 

	/* ******************************************************
	 *
	 + 批量添加疾病知识库,一般用于外部文件导入(Excel)
	 *
	 + 参数:
	 + 		$values 需要插入的(sql) values 部分
	 *
	 * ******************************************************/
	public static function batchAddDiseases($values) {
		if (! $values ) {
			return false;
		}
		$sql = "INSERT IGNORE INTO ".self::getTableName()."(".self::$fields.") values ".$values;
		$db=self::__instance();	
		$count = $db->exec ( $sql );
		return $count;
	}

}
