<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class QuickNote extends Base {
	// 表名
	private static $table_name = 'quick_note';
	// 查询字段
	private static $columns = 'note_id,note_content,owner_id,note_date,status';

	public static function getTableName(){
		return parent::$table_prefix.self::$table_name;
	}
	
	//列表 
	public static function getNotes($owner_id='',$status='',$start='',$page_size='') {
		$db=self::__instance();
		$limit ="";
		$where = " where 1=1 ";
		if($owner_id!=''){
			$where .= " and owner_id = ".$owner_id ;
		}
		if($status!=''){
			$where .= " and status = '".$status."'" ;
		}
		if($page_size){
			$limit =" limit $start,$page_size ";
		}
		$sql="select ".self::$columns." from ".self::getTableName().$where." order by note_id desc $limit";
		$list = $db->query($sql)->fetchAll();
		if (!empty($list)) {
			foreach($list as &$item){
				$item['note_date'] = Common::getDateTime($item['note_date']);;
			}
			return $list;
		}
		return array ();		
	}
	
	public static function addNote($note_data) {
		if (! $note_data || ! is_array ( $note_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $note_data );
		return $id;
	}
	//zl add at 7/22/2014
	public static function getOwnerNotes($owner_id)
	{
		if (! $owner_id || ! is_numeric ( $owner_id )) {
			return false;
		}
		$condition['owner_id'] = $owner_id;
		$db=self::__instance();
		$list = $db->select ( self::getTableName(), self::$columns, $condition );
		if($list){
			return $list;
		}
		return array();
	}

	public static function getNoteById($note_id) {
		if (! $note_id || ! is_numeric ( $note_id )) {
			return false;
		}
		$db=self::__instance();
		$condition['note_id'] = $note_id;
		$list = $db->select ( self::getTableName(), self::$columns, $condition );
		if ($list) {
			return $list [0];
		}
		return array ();
	}
	
	public static function getRandomNote() {
		$db=self::__instance();
		$sql="select min(note_id), max(note_id) from ".self::getTableName();
		$list = $db->query($sql)->fetch();
		if ($list) {
			$note_id=rand($list[0],$list[1]);
			$condition['note_id[>=]'] = $note_id;
			$condition['owner_id[=]'] = '0';  //只取系统公告
			$list = $db->select ( self::getTableName(), self::$columns, $condition );
			if ($list) {
				return $list [0];
			}
		}
		return array ();
	}
	
	public static function count($owner_id='',$status='') {
		$condition = array();
		if($owner_id!=''){
			$condition['owner_id'] = $owner_id;
		}
		if($status!=''){
			$condition['status'] = $status;
		}
		$db=self::__instance();
		$num = $db->count ( self::getTableName(), $condition );
		return $num;
	}
	
	public static function updateNote($note_id,$note_data) {
		if (! $note_data || ! is_array ( $note_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("note_id"=>$note_id);
		$id = $db->update ( self::getTableName(), $note_data,$condition );
		
		return $id;
	}
	
	public static function delNote($note_id) {
		if (! $note_id || ! is_numeric ( $note_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("note_id" => $note_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	} 
}
