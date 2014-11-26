<?php
if(!defined('ACCESS')) {exit('Access denied.');}

class Sale extends Base{
	// 表名
	private static $table_name = 'sale_log';
	//前缀
	private static $table_prefixs = 'crm_';
	// 查询字段
	private static $columns = 'id,customer_id,sale_date,sale_product,sale_content,sale_analysis,sale_effect,orders_id,vested,remark';
	

	public static function getTableName(){
		return self::$table_prefixs.self::$table_name;
	}
	
	public static function getSaleLogs($vested, $customer_id,$sdate='', $edate='', $start ='', $page_size=''){
		$where = " where 1=1 ";
		$LIMIT = "";
		if(! $customer_id==''){
			$where .= " and customer_id=".$customer_id ;
		}
		if (! $vested=='') {
			$where .= " and vested=".$vested ;
		}
        if($sdate !=''){
            $where .= " and sale_date >='".$sdate." 00:00:00'";
        }
        if($edate !=''){
            $where .= " and sale_date <='".$edate." 23:59:59'";
        }
		if($page_size){
			$LIMIT = " LIMIT ".$start.",".$page_size;
		}
		$sql = " select ".self::$columns." from ".self::getTableName().$where." ORDER BY sale_date DESC ".$LIMIT ;
		$db=self::__instance();
		$list = $db->query ( $sql )->fetchAll(PDO::FETCH_ASSOC);
		if ($list) {
			return $list;
		}
		return array ();
	}
	//获取沟通日志
	public static function getSaleLogById($sale_id){
		if(!$sale_id || !is_numeric($sale_id)){
			return false;
		}
		$db=self::__instance();
		$list = $db->select( self::getTableName(), self::$columns, array("id"=>$sale_id) );
		if($list){
			return $list[0];
		}else{
			return array();
		}
	}
	public static function updateSaleLog($sale_id,$sale_data) {
		if (! $sale_data || ! is_array ( $sale_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("id"=>$sale_id);
		$id = $db->update ( self::getTableName(), $sale_data, $condition );
		return $id;
	}
	
	
	public static function addSaleLog($sale_data) {
		if (! $sale_data || ! is_array ( $sale_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $sale_data );
		return $id;
	}
	
	public static function delSaleLog($sale_id) {
		if (! $sale_id || ! is_numeric ( $sale_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("id"=>$sale_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	}
	//删某客户的所有沟通记录
	public static function delSaleLogForCustomer($customer_id) {
		if (! $customer_id || ! is_numeric ( $customer_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("customer_id"=>$customer_id);
		$result = $db->delete ( self::getTableName(), $condition );
		return $result;
	}

	public static function count($condition = '') {
		$db=self::__instance();
		$num = $db->count ( self::getTableName(), $condition );
		return $num;
	}
	
	public static function countSearch($customer_id, $vested) {
		$where = ' where 1=1 ';
		if(! $customer_id==''){
			$where .= " and customer_id=".$customer_id ;
		}
		if (! $vested) {
			$where .= " and vested=".$vested ;
		}
		$db=self::__instance();
		$num = 0+($db->query( " select count(*) from ".self::getTableName().$where )->fetchColumn());
		return $num;
	}

    //批量更新沟通日志责任人
    public static function batchUpdateSale($customer_ids,$sale_data,$vested='') {
        if (! $sale_data || ! is_array ( $sale_data )) {
            return false;
        }
        if(!is_array($customer_ids)){
            $customer_ids=explode(',',$customer_ids);
        }
        $condition = array("customer_id"=>$customer_ids);
        if($vested!=''){
            $condition["vested"]=$vested;
        }
        $db=self::__instance();
        $id = $db->update ( self::getTableName(), $sale_data, $condition );
        return $id;
    }
}