<?php
if(!defined('ACCESS')) {exit('Access denied.');}
class CtiBase {
	protected static $db_container = array();
	public static function __instance($database=CTI_DB_ID){
		if( @self::$db_container[$database]  == null ){
			self::$db_container[$database] = new Medoo( $database );
			return self::$db_container[$database];
		}
		return self::$db_container[$database];
	}
}
