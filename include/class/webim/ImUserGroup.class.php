<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class ImUserGroup extends Base {
	//前缀
	private static $table_prefixs = 'im_';
	// 表名
	private static $table_name = 'usergroup';
	// 查询字段
	private static $columns = 'id,groupname,userid';

	public static function getTableName(){
		return self::$table_prefixs.self::$table_name;
	}
	
	public static function addGroup($group_data) {
		if (! $group_data || ! is_array ( $group_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $group_data );
		return $id;
	}

	public static function getGroupById($group_id) {
		if (! $group_id || ! is_numeric ( $group_id )) {
			return false;
		}
		$db=self::__instance();
		$condition['group_id'] = $group_id;
		$list = $db->select ( self::getTableName(), self::$columns, $condition );
		if ($list) {
			return $list [0];
		}
		return array ();
	}
	
	public static function getGroupByName($group_name) {
		if ( $group_name == "" ) {
			return false;
		}
		$db=self::__instance();
		$condition['group_name'] = $group_name;
		$list = $db->select ( self::getTableName(), self::$columns, $condition );
		if ($list) {
			return $list [0];
		}
		return array ();
	}
	
	public static function updateGroupInfo($group_id,$group_data) {
		if (! $group_data || ! is_array ( $group_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("group_id"=>$group_id);
		$id = $db->update ( self::getTableName(), $group_data,$condition );
		
		return $id;
	}
	
	public static function delGroup($group_id) {
		if (! $group_id || ! is_numeric ( $group_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("group_id" => $group_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	}
	
	public static function getGroupForOptions() {
		$group_list = self::getAllGroup ();
		
		foreach ( $group_list as $group ) {
			$group_options_array [$group ['group_id']] = $group ['group_name'];
		}
		
		return $group_options_array;
	}
	
	public static function getGroupUsers($group_id) {
		$db=self::__instance();
		$sql="select ".self::$columns." ,u.user_id as user_id,u.user_name as user_name,u.real_name as real_name from ".self::getTableName()." g,".User::getTableName()." u where g.group_id = $group_id and g.group_id = u.user_group order by g.group_id,u.user_id";
		$list = $db->query($sql)->fetchAll();
		if ($list) {
			return $list;
		}
		return array ();
	}
}
