<?php
if(!defined('ACCESS')) {exit('Access denied.');}

class Customer extends Base{
	// 表名
	private static $table_name = 'customer';

	private static $table_name_cometel = 'cometel';

	//前缀
	private static $table_prefixs = 'crm_';
	// 查询字段
	private static $columns = 'id,name,sex,birthday,address,mobile,telphone,link_man,link_relation,link_phone,income,source,referrals,personality_type,personality_traits,remark,create_date,status,return_date,last_vested,type,last_sale_date,vested,assign_date,transactions,expiration_date,diet_preference,diet_taste,diet_foods,diet_hobby,diet_snacks,health_height,health_body_weight,health_profession,health_labor_intensity,health_blood_pressure,health_blood_pressure_height,health_gi_preprandial,health_gi_postprandial,health_diagnosis,health_diagnosis_time,health_diagnosis_other,health_symptom,health_has_biochemical_indicators,health_anomaly_indicators,health_had_medication,update_date,updater';
	
	private static $fields = "`name`,`sex`,`birthday`,`address`,`mobile`,`telphone`,`link_man`,`link_relation`,`link_phone`,`income`,`referrals`,`personality_type`,`personality_traits`,`remark`,`diet_preference`,`diet_taste`,`diet_foods`,`diet_hobby`,`diet_snacks`,`health_height`,`health_body_weight`,`health_profession`,`health_labor_intensity`,`health_blood_pressure`,`health_blood_pressure_height`,`health_gi_preprandial`,`health_gi_postprandial`,`health_diagnosis`,`health_diagnosis_time`,`health_diagnosis_other`,`health_symptom`,`health_has_biochemical_indicators`,`health_anomaly_indicators`,`health_had_medication`,`createby`,`source`,`create_date`,`update_date`,`updater`,`status`,`type`";

	//状态定义:公海  已分配 回归
	const OPEN = "open";
	const LOCKED = "assigned";
	const REOPEN = "reopen";
	const DELETED = "deleted";

	public static function getTableName(){
		return self::$table_prefixs.self::$table_name;
	}

	public static function getTableNameForComeTel(){
		return self::$table_prefixs.self::$table_name_cometel;
	}

	public static function getCustomerByStatus($status, $start ='' ,$page_size='' ){
		$db=self::__instance();
		if (!$status) {
			$condition = array(
				"ORDER" 	=> "create_date DESC"
			);
			if($page_size){
				$condition = array(
					"ORDER"		=> "create_date DESC",
					"LIMIT"		=> array($start,$page_size)
				);
			}
		}else{
			$condition = array(
				"status" 	=> $status,
				"ORDER" 	=> "create_date DESC"
			);
			if($page_size){
				$condition = array(
					"status"	=> $status,
					"ORDER"		=> "create_date DESC",
					"LIMIT"		=> array($start,$page_size)
				);
			}
		}
		$list = $db->select ( self::getTableName(), self::$columns, $condition );
		
		if ($list) {
			return $list;
		}
		return array ();
	}

	public static function getCustomerOfOpen( $start ='' ,$page_size='' ) {
		return self::getCustomerByStatus(self::OPEN, $start ='' ,$page_size='' );
	}
	
	public static function getCustomerOfLocked( $start ='' ,$page_size='' ) {
		return self::getCustomerByStatus(self::LOCKED, $start ='' ,$page_size='' );
	}

	public static function getCustomerOfReturn( $start ='' ,$page_size='' ) {
		return self::getCustomerByStatus(self::REOPEN, $start ='' ,$page_size='' );
	}

	public static function getAllCustomer( $start ='' ,$page_size='' ) {
		return self::getCustomerByStatus('', $start ='' ,$page_size='' );
	}

	public static function getCustomerByPhone( $phone ) {
		if(!$phone){
			return false;
		}
		$db=self::__instance();
		$condition = array(
			"mobile" 	=> $phone,
			"ORDER" 	=> "id",
			"LIMIT" 	=> array(0, 1),
		);
		$list = $db -> select ( self::getTableName(), self::$columns, $condition );
		if ($list) {
			return $list[0];
		}
		return array ();
	}

	public static function getCustomerById( $customer_id ) {
		if(!$customer_id){
			return false;
		}
		$db=self::__instance();
		$condition = array(
			"id" => $customer_id
		);
		$list = $db -> select ( self::getTableName(), self::$columns, $condition );
		if ($list) {
			return $list[0];
		}
		return array ();
	}

	/* ******************************************************
	 *
	 + 随机平均分配客户到坐席(销售代表)
	 + 
	 *
	 * ******************************************************/

	public static function randAssign(){
		//1.查出所有未分配的客户id，存在$customers数组中
		$db=self::__instance();
		$customers = $db -> select ( self::getTableName(), "id", array("status"=>array("open","reopen")) );
		if(empty($customers)){
			return false;
		}
		$size = count($customers);
		//2.打乱$customers数组,随机排序
		shuffle($customers);
		//$customers = Common::rand_array($customers);
		
		//3.循环分配，每次只给拥有最少客户的员工分配,
		//  从而实现平均分配:
		try{
			foreach($customers as $customer){ 
				//3.1 找出拥有最少客户的员工()
				$sql = " SELECT u.user_id, COUNT(*) AS cnt
						 FROM osa_user u
						 LEFT JOIN crm_customer c ON u.user_id = c.vested
						 where u.user_group=4
						 GROUP BY u.user_id
						 ORDER BY cnt ASC
						 LIMIT 0, 1 ";
				$list = $db->query($sql)->fetchAll();
				if($list) {
					//3.2 更新客户表中归属人
					$userid = $list[0]['user_id'];
                    $nowtime = date("Y-m-d H:i:s");
					$id = $db->update ( self::getTableName(), 
										array(
											"vested"        =>$userid,
											"assign_date"   =>$nowtime,
                                            "status"        =>"assigned",
                                            'type'          => '-1',
                                            'expiration_date'=>date('Y-m-d',strtotime("+4 day")),
                                            "update_date"   =>$nowtime,
											"updater"       =>1,
										), 
										array("id"=>$customer['id']) 
									);
				}
			}
			return $size;
		}catch (Exception $e){
			return 0;
		}
	}
	
	/**
	 * 过滤掉不可分配(已分配,已删除)的客户,返回可分配的客户ids
	 * @param $customer_ids
	 * @return int
	 */
	public static function filterAssigned($customer_ids){
	if(is_array($customer_ids)){
					$customer_ids=implode(',',$customer_ids);
			}
			$db=self::__instance();
			//$ids = $db->get(self::getTableName(), 'GROUP_CONCAT(id)', array("id"=>$customer_ids,"vested"=>null));
			$ids = $db->query("select GROUP_CONCAT(id) as ids from ".self::getTableName()."
			                   where id in( ".$customer_ids.") and `status` not in('assigned','cancel') and vested is null"
                             )->fetchColumn();
			return $ids?$ids:0;
	}	
	/* ******************************************************
	 *
	 + 批量分配客户给坐席(多个客户指定给一个用户)
	 + customer_ids 可以为无key数组，也可以为1,2,3形势的字符串
	 + customer_data=array("vested"=>$user_id)
	 *
	 * ******************************************************/
	public static function batchAssignCustomers($customer_ids,$customer_data) {

		if (! $customer_data || ! is_array ( $customer_data )) {
			return false;
		}
		//$customer_ids = self::filterAssigned($customer_ids);
		if(!is_array($customer_ids)){
			$customer_ids=explode(',',$customer_ids);
		}

		$condition=array("id"=>$customer_ids);
		$db=self::__instance();		
		$id = $db->update ( self::getTableName(), $customer_data, $condition );
		return $id;
	}

	/* ******************************************************
	 *
	 + 批量添加用户,一般用于外部文件导入(Excel)
	 *
	 + 参数:
	 + 		$values 需要插入的(sql) values 部分
	 *
	 * ******************************************************/
	public static function batchAddCustomers($values) {
		if (! $values ) {
			return false;
		}
		$sql = "INSERT IGNORE INTO ".self::getTableName()."(".self::$fields.") values ".$values;
		$db=self::__instance();	
		$count = $db->exec ( $sql );
		return $count;
	}

	/* ******************************************************
	 *
	 + 将养护期外的客户强制收回"公海"
	 *
	 + 参数:
	 + 		$updater 更新人
	 *
	 * ******************************************************/
	public static function backOpenSea($updater=''){
			$date = strtotime(date('Y-m-d'));
			$datetime = date('Y-m-d H:i:s');
			$where =" where UNIX_TIMESTAMP(expiration_date) < ".$date;
			$sql = "update ".self::getTableName()."
							set status ='".self::REOPEN."',
							        last_vested = vested ,
									return_date = '".$datetime."',
									update_date = '".$datetime."',
									updater = ".$updater.",
									createby = 'inner',
									vested = null,
									expiration_date = null ,
									assign_date = null " .$where ;

      $db=self::__instance();
			$id = $db->query ( $sql )->fetch();
			return $id;
	}

	//修改客户信息
	public static function updateCustomer($customer_id,$customer_data) {
		
		if (! $customer_data || ! is_array ( $customer_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("id"=>$customer_id);
		
		$id = $db->update ( self::getTableName(), $customer_data, $condition );
		return $id;
	}
	//记录客户交易成功次数
	public static function updateTransactions($customer_id) {
		
		if (! $customer_id || ! is_numeric( $customer_id )) {
			return false;
		}
		$db=self::__instance();
		$customer_data=array("transactions[+]"=>1);
		$condition = array("id"=>$customer_id);
		$id = $db->update ( self::getTableName(), $customer_data, $condition );
		return $id;
	}

	public static function addCustomer($customer_data) {
		if (! $customer_data || ! is_array ( $customer_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableName(), $customer_data );
		return $id;
	}
	
	public static function delCustomer($customer_id,$delete=false) {
		if (! $customer_id || ! is_numeric ( $customer_id )) {
			return false;
		}
		$db=self::__instance();
		$condition = array("id"=>$customer_id);
		if($delete){
			$result = $db->delete ( self::getTableName(), $condition );
		}else{
				$result = $db->update ( self::getTableName(),array('status'=>self::DELETED,"vested"=>null,"update_date"=>date("Y-m-d H:i:s"),"updater"=>1), $condition );
		}
		return $result;
	}
	/**
	 * 批量删除客户信息
	 * @param $customer_ids
	 * @param bool $true true:delete false:update status to 'delete', default false
	 * @return mixed
	 */
  public static function batchDelCustomers($customer_ids,$delete=false) {
		if(!is_array($customer_ids)){
			$customer_ids=explode(',',$customer_ids);
		}
		$condition=array("id"=>$customer_ids);
		$db=self::__instance();
    if($delete){
			$result = $db->delete ( self::getTableName(), $condition );
		}else{
				$result = $db->update ( self::getTableName(),array('status'=>self::DELETED,"vested"=>null,"update_date"=>date("Y-m-d H:i:s"),"updater"=>1), $condition );
		}
		return $result;
	}

	
	public static function count($condition = '') {
		$db=self::__instance();
		$num = $db->count( self::getTableName(), $condition );
		return $num;
	}
	
	public static function countSearch($datetype,$sdate,$edate,$type='',$status='',$vested='',$name='') {
        if(!$sdate || !$edate){
            return false;
        }
		$where = " where ".$datetype." between '".$sdate." 00:00:00' and '".$edate." 23:59:59'";

		if($type!=""){
			$where .= " and type='".$type."'";
		}
		if($status!=""){
			$where .= " and status='".$status."'";
		}
		if($vested!=""){
			$where .= " and vested=".$vested;
		}
		if($name!=""){
			$where .= " and LOCATE('".$name."',CONCAT(`name`,`mobile`,`telphone`,`health_diagnosis`))>0";
		}
		$db=self::__instance();
		$num = 0+($db->query( "select count(*) from ".self::getTableName().$where )->fetchColumn());
		return $num;
	}

	public static function search($datetype,$sdate, $edate, $type='', $status='',$vested='',$name='', $start='' ,$page_size='' ) {
		if(!$sdate || !$edate){
			return false;
		}
		$LIMIT = '';
		$where = " where ".$datetype." between '".$sdate." 00:00:00' and '".$edate." 23:59:59'";

		if($type!=""){
			if($type=="-1"){
					$where .= " and (type is null or type='') ";
			}else{
				$where .= " and type='".$type."'";
			}
		}
		if($status!=""){
			$where .= " and status='".$status."'";
		}
		if($vested!=""){
			$where .= " and vested=".$vested;
		}
		if($name!=""){
			$where .= " and LOCATE('".$name."',CONCAT(`name`,`mobile`,`telphone`,`health_diagnosis`))>0 ";
		}

		if($page_size){
			$LIMIT = " LIMIT ".$start.",".$page_size;
		}
		$db=self::__instance();
		$list = $db -> query ( " select ".self::$columns." from ".self::getTableName().$where." order by type,".$datetype." DESC ".$LIMIT )->fetchAll();
		if(!empty($list)){
			foreach($list as &$item){
				$item['age']=Common::getAge($item['birthday']);
			}
		}
		if ($list) {
			return $list;
		}
		return array ();
	}

	public static function exportCustomers($sdate='', $edate='', $type='', $status=''){
		$where = " where 1=1 ";

		if($sdate!=""){
			$where .= " and create_date>='".$sdate."'";
		}
		if($edate!=""){
			$where .= " and create_date<='".$edate."'";
		}
		if($type!=""){
			$where .= " and type='".$type."'";
		}
		if($status!=""){
			$where .= " and status='".$status."'";
		}
		$db=self::__instance();
		$list = $db -> query( " select ".self::$fields." from ".self::getTableName().$where." order by create_date DESC " )->fetchAll();

		if(!empty($list)){
			foreach($list as &$item){
				$item['age']=Common::getAge($item['birthday']);
			}
		}
		if ($list) {
			return $list;
		}
		return array ();
	}
	//字典:客户状态
	public static function getStatusForOptions(){
		$status_options_array = array ();
		$status_list = Dict::getItemsByDictId ('6');
		
		foreach ( $status_list as $status ) {
			$status_options_array [$status['item_id']] = $status['item_name'];
		}
		
		return $status_options_array;		
	}

	//增加来电信息
	public static function addComeTel($cometel_data){
		if (! $cometel_data || ! is_array ( $cometel_data )) {
			return false;
		}
		$db=self::__instance();
		$id = $db->insert ( self::getTableNameForComeTel(), $cometel_data );
		return $id;
	}

	//增加来电信息
	public static function updateComeTel($cometel_id,$cometel_data){
		if (!$cometel_id=="" || ! $cometel_data || ! is_array ( $cometel_data )) {
			return false;
		}
		$db=self::__instance();
		$condition=array("cometel_id"=>$cometel_id);
		$id = $db->update ( self::getTableNameForComeTel(), $cometel_data, $condition );
		return $id;
	}

    //统计销售代表当前客户数 意向客户数
    public static function statCustomer($vested=''){
        if($vested!=''){
            $sql = "select vested,fun_getUserNameById(vested) name,
                        sum(case when type>6 then 1 else 0 end) yxkh,
                        count(1) allkh
                    from crm_customer
                    where vested=".$vested."
                    group by vested " ;
        }else{
            $sql = "select
                        sum(case when type>6 then 1 else 0 end) yxkh,
                        count(1) allkh
                    from crm_customer
                    where vested is not null or vested!=''" ;
        }
        $db=self::__instance();
        $list = $db->query($sql)->fetchAll();
        if($list){
            return $list[0];
        }else{
            return array();
        }
    }
}