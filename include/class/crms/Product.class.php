<?php
if(!defined('ACCESS')) {exit('Access denied.');}

class Product extends Base{
	// 表名
	private static $table_name = 'product';
	//前缀
	private static $table_prefixs = 'crm_';
	// 查询字段
	private static $columns = 'id,product_name,product_spec,product_code,unit,`usage`,brand,place_origin,product_price,superiority,product_effect,product_symptom,product_side_effect,product_use_time,help_factor,inhibiting_factor,food_sources,product_type,online,added_time,shelf_time';

	// 批量导入字段
	private static $fields = '`product_name`,`product_code`,`product_spec`,`unit`,`usage`,`brand`,`place_origin`,`product_price`,`superiority`,`product_effect`,`product_symptom`,`product_side_effect`,`product_use_time`,`help_factor`,`inhibiting_factor`,`food_sources`,`product_type`,`online`,`added_time`';
	

	public static function getTableName(){
		return self::$table_prefixs.self::$table_name;
	}
	
	public static function getProducts($key='', $start ='' ,$page_size='' ){
		$where = ' where 1=1 ';
		$LIMIT = '';
		if(! $key==''){
			$where .= " and LOCATE('".$key."',CONCAT(`product_name`,`product_code`,`usage`,`product_effect`,`product_symptom`,`help_factor`))>0 ";
		}
		if($page_size){
			$LIMIT = " LIMIT ".$start.",".$page_size;
		}
		$db=self::__instance();
		$list = $db->query ( " select ".self::$columns." from ".self::getTableName().$where.$LIMIT )->fetchAll();
		
		if ($list) {
			return $list;
		}
		return array ();
	}
	//作为下拉列表
	public static function getProductForSelect($product_type=''){
		$where = ' where 1=1 ';
		if(! $product_type==''){
			$where .= " and product_type='".$product_type."' ";
		}
		$sql = " select id,product_name,product_spec,product_code,unit,`usage`,brand,place_origin,product_price 
				 from ".self::getTableName().$where.
			   " order by product_name" ;
		$db=self::__instance();
		$list = $db->query ( $sql ) -> fetchAll();
		if ($list) {
			return $list;
		}
		return array ();
	}

	public static function getProductById($product_id) {
		if (! $product_id || ! is_numeric ( $product_id )) {
			return false;
		}
		$db=self::__instance();
		$condition['id'] = $product_id;
		$list = $db->select ( self::getTableName(), self::$columns, $condition );
		if ($list) {
			return $list [0];
		}
		return array ();
	}
	public static function updateProduct($product_id,$product_data) {
		
		if (! $product_data || ! is_array ( $product_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("id"=>$product_id);
		
		$id = $db->update ( self::getTableName(), $product_data, $condition );
		return $id;
	}
	
	public static function addProduct($product_data) {
		if (! $product_data || ! is_array ( $product_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $product_data );
		return $id;
	}
	
	public static function delProduct($product_id) {
		if (! $product_id || ! is_numeric ( $product_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("id"=>$product_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	}
	
	public static function count($key = '') {
		$where = " where 1=1 ";
		if($key!=''){
			$where .= " and LOCATE('".$key."',CONCAT(`product_name`,`product_code`,`usage`,`product_effect`,`product_symptom`,`help_factor`))>0 ";
		}
		$db=self::__instance();
		$num = 0+($db->query( "select count(*) from ".self::getTableName().$where )->fetchColumn());
		return $num;
	}

	/* ******************************************************
	 *
	 + 批量添加产品,一般用于外部文件导入(Excel)
	 *
	 + 参数:
	 + 		$values 需要插入的(sql) values 部分
	 *
	 * ******************************************************/
	public static function batchAddProducts($values) {
		if (! $values ) {
			return false;
		}
		$sql = "INSERT IGNORE INTO ".self::getTableName()."(".self::$fields.") values ".$values;
		$db=self::__instance();	
		$count = $db->exec ( $sql );
		return $count;
	}

}