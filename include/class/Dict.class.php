<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class Dict extends Base{
	// 表名
	private static $table_name_dict = 'dict';
	private static $table_name_dictItem = 'dict_item';
	// 查询字段
	private static $columns_dict = 'id,name,owner,remark,status';
	private static $columns_dictItem = 'id,dict_id,item_id,item_name,item_sort,item_status,remark';

	public static function getTableNameForDict(){
		return parent::$table_prefix.self::$table_name_dict;
	}
	public static function getTableNameForDictItem(){
		return parent::$table_prefix.self::$table_name_dictItem;
	}

	//===functions for dict=================================================

	/*********************************
	 *
	 * 公共字典下拉选项
	 *
	 * keyName 取值说明: 
	 *
	 *  性别		=> sex
	 *	客户来源	=> source
	 *	性格类型	=> personalitytype
	 *	性格特点	=> personalitytraits
	 *	饮食偏好	=> dietpreference
	 *	正餐情况	=> dietfoods
	 *	嗜好		=> diethobby
	 *	非主食情况	=> dietsnacks
	 *	口味		=> diettaste
	 *	收入情况	=> income
	 *    
	 ********************************/
	public static function getDictForOptionsByKeyName($keyName){
		if(!$keyName){
			return false;
		}
		$sql =" SELECT item_id,item_name FROM osa_dict_item a
				INNER JOIN osa_system b ON a.dict_id=b.key_value
				WHERE b.key_name='$keyName' and a.item_status='enable'
				ORDER BY a.item_sort " ;
		$db=self::__instance();
		$item_list = $db->query($sql)->fetchAll();
		if(!empty($item_list)){
			foreach ( $item_list as $dict ) {
				$dict_options_array [$dict ['item_id']] = $dict ['item_name'];
			}
			return $dict_options_array;
		}
		return array();
		
	}

	/*********************************
	 *
	 * 取得所有字典项数据,分页显示
	 *
	 ********************************/
	public static function getAllDicts($owner='', $start ='' ,$page_size='' ) {

		$condition = array(
			"ORDER" => "owner,id DESC"
		);
		if($page_size){
			$condition = array(
				"ORDER" => "owner,id",
				"LIMIT" => array($start, $page_size)
			);
		}
		if($owner){
			$condition['owner'] = $owner;
		}

		$db=self::__instance();
		$list=$db->select(self::getTableNameForDict(), self::$columns_dict, $condition);
		
		if ($list) {
			return $list;
		}
		return array ();
	}

	public static function getDictForOptions(){
		$dict_list = self::getAllDicts();
		foreach ( $dict_list as $dict ) {
			$dict_options_array [$dict ['id']] = $dict ['name'];
		}
		return $dict_options_array;
	}

	public static function count($owner=''){
		$condition = array();
		if($owner){
			$condition['owner'] = $owner;
		}
		$db=self::__instance();
		$num=$db->count(self::getTableNameForDict(), $condition);
		return $num;
	}

	/*********************************
	 *
	 * CURD for Dict
	 *
	 ********************************/

	/*
	 * 根据id取得字典项
	 */
	public static function getDictById($dictId){
		if(! $dictId || ! is_numeric ( $dictId )) {
			return false;
		}
		$condition=array("id"=>$dictId);
		$db=self::__instance();
		$list = $db->select ( self::getTableNameForDict(), self::$columns_dict, $condition );
		if ($list) {
			return $list [0];
		}
		return array ();
	}

	public static function addDict($dictData) {
		if (! $dictData || ! is_array ( $dictData )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableNameForDict(), $dictData );
		return $id;
	}

	public static function updateDict($dictId,$dictData) {
		
		if (! $dictData || ! is_array ( $dictData )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("id"=>$dictId);
		
		$id = $db->update ( self::getTableNameForDict(), $dictData, $condition );
		return $id;
	}
	public static function delDict($dictId) {
		if (! $dictId || ! is_numeric ( $dictId )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("id"=>$dictId);
		$result = $db->delete ( self::getTableNameForDict(), $condition );
		return $result;
	}	

	//===functions for dictitem=====================================================================

	/*********************************
	 *
	 * 取得指定字典项下的子项
	 *
	 * dictId取值说明: 
	 *
	 *    '1' = 性别
	 *    '2' = 地区
	 *    '3' = 客户分类
	 *    '4' = 口味偏向
	 *    '5' = 订单状态
	 *    '6' = 客户状态
	 *
	 ********************************/
	public static function getItemsByDictId($dictId) {
		if (! $dictId || ! is_numeric ( $dictId )) {
			return false;
		}
		$condition = array("dict_id" => $dictId,"ORDER" => "item_sort");
		$db=self::__instance();
		$list = $db->select ( self::getTableNameForDictItem(), self::$columns_dictItem, $condition );
		
		if ($list) {
			return $list;
		}
		return array ();
	}
	public static function getDictItemsById($itemId) {
		if (! $itemId || ! is_numeric ( $itemId )) {
			return false;
		}
		$condition = array("id" => $itemId);
		$db=self::__instance();
		$list = $db->select ( self::getTableNameForDictItem(), self::$columns_dictItem, $condition );
		
		if ($list) {
			return $list[0];
		}
		return array ();
	}
	/*********************************
	 *
	 * CURD for Dict
	 *
	 ********************************/

	public static function addDictItem($dictItemData) {
		if (! $dictItemData || ! is_array ( $dictItemData )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableNameForDictItem(), $dictItemData );
		return $id;
	}
	public static function updateDictItem($itemId,$dictItemData) {
		if (! $dictItemData || ! is_array ( $dictItemData )) {
			return false;
		}
		$db=self::__instance();
		if(!is_array($itemId)){
			$itemId=explode(',',$itemId);
		}
		$condition=array("item_id"=>$itemId);
		
		$id = $db->update ( self::getTableNameForDictItem(), $dictItemData, $condition );
		return $id;
	}
	public static function updateDictItemById($id,$dictItemData) {
		if (! $dictItemData || ! is_array ( $dictItemData )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("id"=>$id);
		
		$id = $db->update ( self::getTableNameForDictItem(), $dictItemData, $condition );
		return $id;
	}
	public static function delDictItem($dictItemIds) {
		if (! $dictItemIds ) {
			return false;
		}
		if(!is_array($dictItemIds)){
			$dictItemIds=explode(',',$dictItemIds);
		}
		$db=self::__instance();
		$condition = array("id"=>$dictItemIds);
		$result = $db->delete ( self::getTableNameForDictItem(), $condition );
		return $result;
	}

}