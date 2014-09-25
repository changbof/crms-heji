<?php
if (!defined('ACCESS')) {
    exit('Access denied.');
}

class Orders extends Base
{
    //前缀
    private static $table_prefixs = 'crm_';
    // 表名
    private static $table_name = 'orders';
    private static $table_name_item = 'orders_item';

    private static $view_name = 'v_orders';
    // 查询字段
    private static $columns = " id,orders_no,customer_id,product_id,orders_title,orders_price,orders_num,discount,payment_sum,gift,nutrientscase,`status`,vested,orders_date,dispense_date,determine_date,verify_note,verify_date,shipped_date,reach_date,cancel_note,cancel_date,refused_note,refused_date,receive_date,finish_date,finished,orders_address,shipped_express,express_no,orders_tel,update_time ";

    private static $columns_ordersitem = " item_id,orders_id,product_id,product_name,product_price,item_num,item_sum,product_spec,discount,payment_sum,remark ";

    private static $columns_vorders = "id,orders_title,orders_no,orders_price,orders_num,discount,payment_sum,gift,orders_date,`status`,customer_id,name,address,mobile,telphone,health_diagnosis,vested,nutrientscase,user_name,real_name,link_man,link_phone,finished,dispense_date,determine_date,verify_date,shipped_date,shipped_express,express_no,reach_date,cancel_note,cancel_date,refused_note,refused_date,receive_date,finish_date,verify_note,orders_address,shipped_express,orders_tel,product_id,update_time";

    public static function getTableName()
    {
        return self::$table_prefixs . self::$table_name;
    }

    public static function getViewName()
    {
        return self::$table_prefixs . self::$view_name;
    }

    public static function getTableNameForItem()
    {
        return self::$table_prefixs . self::$table_name_item;
    }

    public static function getOrders($sdate = '', $edate = '', $status = '', $orders_id = '', $customer_id = '', $vested = '', $start = '', $page_size = '')
    {
        $where = ' WHERE 1=1 ';
        $limit = '';
        if ($sdate != '') {
            $where .= " and orders_date>='" . $sdate . "'";
        }
        if ($edate != '') {
            $where .= " and orders_date<='" . $edate . "'";
        }
        if ($orders_id != '') {
            $where .= " and id=" . $orders_id;
        }
        if ($customer_id != '') {
            $where .= " and customer_id=" . $customer_id;
        }
        if ($vested != '') {
            $where .= " and vested=" . $vested;
        }
        if ($status != '') {
            $where .= " and status='" . $status . "'";
        }
        if ($page_size) {
            $limit = " LIMIT " . $start . "," . $page_size;
        }
        $sql = " SELECT " . self::$columns_vorders . " FROM " . self::getViewName() . $where .
            " ORDER BY update_time DESC " . $limit;
        $db = self::__instance();
        //print_r($sql);
        $list = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        if ($list) {
            return $list;
        }
        return array();
    }

    public static function getAllOrders($sdate = '', $edate = '', $status = '', $orders_id = '', $customer_id = '', $vested = '', $start = '', $page_size = '')
    {
        $where = ' WHERE 1=1 ';
        $limit = '';
        if (!$sdate == '') {
            $where .= " and orders_date>='" . $sdate . "'";
        }
        if (!$edate == '') {
            $where .= " and orders_date<='" . $edate . "'";
        }
        if (!$orders_id == '') {
            $where .= " and orders_id=" . $orders_id;
        }
        if (!$customer_id == '') {
            $where .= " and customer_id=" . $customer_id;
        }
        if (!$vested == '') {
            $where .= " and vested=" . $vested;
        }
        if (!$status == '') {
            $where .= " and status='" . $status . "'";
        }
        if ($page_size) {
            $limit = " LIMIT " . $start . "," . $page_size;
        }
        $sql = " SELECT * FROM " . self::getViewName() . $where .
            " ORDER BY orders_date DESC " . $limit;
        $db = self::__instance();
        $list = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        if ($list) {
            return $list;
        }
        return array();
    }

    //搜索订单
    public static function countSearch($sdate = '', $edate = '', $status = '', $orders_id = '', $customer_id = '', $vested = '')
    {
        $where = ' where 1=1 ';
        if (!$sdate == '') {
            $where .= " and orders_date>='" . $sdate . "'";
        }
        if (!$edate == '') {
            $where .= " and orders_date<='" . $edate . "'";
        }
        if (!$orders_id == '') {
            $where .= " and orders_id=" . $orders_id;
        }
        if (!$customer_id == '') {
            $where .= " and customer_id=" . $customer_id;
        }
        if (!$vested == '') {
            $where .= " and vested=" . $vested;
        }
        if (!$status == '') {
            $where .= " and status='" . $status . "'";
        }
        $db = self::__instance();
        $num = 0 + ($db->query(" select count(*) from " . self::getTableName() . $where)->fetchColumn());
        return $num;
    }

    //查看是否存在相同内容的订单：指未组方的新订单
    public static function hasOrders($orders_title, $product_id)
    {
        if ($orders_title == "" && $product_id == "") {
            return false;
        }
        $where = ' where 1=1 ';
        if (!$orders_title == '') {
            $where .= " and orders_title='" . $orders_title . "'";
        }
        if (!$product_id == '') {
            $where .= " and product_id=" . $product_id;
        }

        $db = self::__instance();
        $num = 0 + ($db->query(" select count(*) from " . self::getTableName() . $where)->fetchColumn());
        return $num > 0;
    }

    //查看产品是否已存在某订单中
    public static function hasProductInOrders($orders_id, $product_id)
    {
        if (!$orders_id || !is_numeric($orders_id) ||
            !$product_id || !is_numeric($product_id)
        ) {
            return false;
        }
        $condition = array(
            "AND" => array(
                'orders_id' => $orders_id,
                'product_id' => $product_id,
            )
        );
        $db = self::__instance();
        $num = $db->count(self::getTableNameForItem(), $condition);
        return $num > 0;
    }

    //获取订单
    public static function getOrdersById($orders_id)
    {
        if (!$orders_id || !is_numeric($orders_id)) {
            return false;
        }
        $db = self::__instance();
        $list = $db->select(self::getTableName(), self::$columns, array("id" => $orders_id));
//        print_r($db->last_query());
        if ($list) {
            return $list[0];
        } else {
            return array();
        }
    }

    //更新订单
    public static function updateOrders($orders_id, $orders_data)
    {
        if (!$orders_data || !is_array($orders_data)) {
            return false;
        }
        $condition = array("id" => $orders_id);
        $db = self::__instance();
        $id = $db->update(self::getTableName(), $orders_data, $condition);
        return $id;
    }

    //批量更新订单责任人
    public static function batchUpdateOrders($customer_ids, $orders_data)
    {
        if (!$orders_data || !is_array($orders_data)) {
            return false;
        }
        if (!is_array($customer_ids)) {
            $customer_ids = explode(',', $customer_ids);
        }
        $condition = array("customer_id" => $customer_ids);
        $db = self::__instance();
        $id = $db->update(self::getTableName(), $orders_data, $condition);
        return $id;
    }

    //添加新订单头信息
    public static function addOrders($orders_data)
    {
        if (!$orders_data || !is_array($orders_data)) {
            return false;
        }
        $db = self::__instance();
        $id = $db->insert(self::getTableName(), $orders_data);
        return $id;
    }

    //添加订单明细产品
    public static function addOrdersItem($ordersitem_data)
    {
        if (!$ordersitem_data || !is_array($ordersitem_data)) {
            return false;
        }
        $db = self::__instance();
        $id = $db->insert(self::getTableNameForItem(), $ordersitem_data);
        return $id;
    }

    //更新订单明细中的某一产品
    public static function updateOrdersItem($item_id, $ordersitem_data)
    {
        if (!$ordersitem_data || !is_array($ordersitem_data)) {
            return false;
        }
        $condition = array("item_id" => $item_id);
        $db = self::__instance();
        $id = $db->update(self::getTableNameForItem(), $ordersitem_data, $condition);
        return $id;
    }

    //删除订单明细
    public static function delOrdersItemById($item_id)
    {
        if (!$item_id || !is_numeric($item_id)) {
            return false;
        }
        $db = self::__instance();
        $condition = array("item_id" => $item_id);
        $result = $db->delete(self::getTableNameForItem(), $condition);
        return $result;
    }

    //删除订单
    public static function delOrdersById($orders_id)
    {
        if (!$orders_id || !is_numeric($orders_id)) {
            return false;
        }
        $orders_data = array(
            "status" => "deleted",
            "update_time" => date('Y-m-d H:i:s')
        );
        return self::updateOrders($orders_id, $orders_data);
    }

    //获取订单item
    public static function getItemsById($item_id)
    {
        if (!$item_id || !is_numeric($item_id)) {
            return false;
        }
        $db = self::__instance();
        $list = $db->select(self::getTableNameForItem(), self::$columns_ordersitem, array("item_id" => $item_id));
        if ($list) {
            return $list[0];
        } else {
            return array();
        }
    }

    //获取订单item
    public static function getOrdersItemsById($orders_id)
    {
        if (!$orders_id || !is_numeric($orders_id)) {
            return false;
        }
        $sql = 'select i.id,i.orders_id,i.product_id,i.product_name,i.orders_num,i.product_price,
					i.orders_sum,i.discount,i.payment_sum,i.status,i.remark,
					o.customer_id,o.orders_date,o.vested,verify_date,gift 
				from ' . self::getTableNameForItem() . ' i
				INNER JOIN ' . self::getTableName() . ' o
				on i.orders_id=o.id 
				where o.id=' . $orders_id;
        $db = self::__instance();
        $list = $db->query($sql)->fetchAll();
        if ($list) {
            return $list[0];
        } else {
            return array();
        }
    }

    //获取订单中产品详细营养素
    public static function getItemsForOrdersId($orders_id)
    {
        if (!$orders_id || !is_numeric($orders_id)) {
            return false;
        }
        $db = self::__instance();
        $list = $db->select(self::getTableNameForItem(), self::$columns_ordersitem, array("orders_id" => $orders_id));
        if ($list) {
            return $list;
        } else {
            return array();
        }
    }

    //系统提示订单
    //zl add at 0722
    public static function getzdOrders($orderstr)
    {
        $sql = "select * from crm_orders where status in(" . $orderstr . ")";
        $db = self::__instance();
        $list = $db->query($sql);
        if ($list) {
            return $list;
        }
        return array();
    }

    //统计
    public static function statOrders($sdate, $edate, $vested = '', $type = '0')
    {
        if ($sdate == '' || $edate == '') {
            return false;
        }
        if ($type != '0') {
            $field = 'fun_getCustomerNameById(customer_id)';
            $column = 'customer_id';
        } else {
            $field = 'fun_getUserNameById(vested)';
            $column = 'vested';
        }
        $where = " where orders_date BETWEEN '" . $sdate . "' and '" . $edate . "'";

        if ($vested != '') {
            $where .= " and vested=" . $vested;
        }

        $sql = "select ifnull(" . $field . ",'小计') as c0,count(*) as ords_num,
					sum(payment_sum) as ords_sum,
					sum(case when `status` in('new','renew','dispense','determine','verifying') 
						then 1 else 0 end) as ords_num_wsh,
					sum(case when `status` in('new','renew','dispense','determine','verifying') 
						then payment_sum end) as ords_sum_wsh,
					sum(case when `status` ='shipped' then 1 else 0 end) as ords_num_dqs,
					sum(case when `status` ='shipped' then payment_sum end) as ords_sum_dqs,
                    sum(case when `status` ='reach' then 1 else 0 end) as ords_num_dd,
                    sum(case when `status` ='reach' then payment_sum end) as ords_sum_dd,
					sum(case when `status` ='received' then 1 else 0 end) as ords_num_yqs,
					sum(case when `status` ='received' then payment_sum end) as ords_sum_yqs,
					sum(case when `status` ='refused' then 1 else 0 end) as ords_num_tq,
					sum(case when `status` ='refused' then payment_sum end) as ords_sum_tq,
					sum(case when `status` ='cancel' then 1 else 0 end) as ords_num_qx,
					sum(case when `status` ='cancel' then payment_sum end) as ords_sum_qx
				from crm_orders " . $where . " group by " . $column . " with rollup ";

        $db = self::__instance();
        $list = $db->query($sql)->fetchAll();
        if ($list) {
            return $list;
        } else {
            return array();
        }
    }

    //导出已审核的订单（审核通过的订单）
    public static function exportOrdersHaveBeenAudited($sdate, $edate, $vested = '', $status = 'audited')
    {
        $where = " where 1=1 ";
        if ($sdate != '') {
            $where .= " and verify_date >='" . $sdate . "'";
        }
        if ($edate != '') {
            $where .= " and verify_date <='" . $edate . "'";
        }
        if ($vested != '') {
            $where .= " and vested=" . $vested;
        }

        $sql = "select fun_getUserNameById(vested) as vestedName,''as tel,
                  group_concat(product_name,',',item_num) as orders,
                  o.payment_sum,
                  fun_getCustomerNameById(customer_id) as name,
                  orders_address,o.orders_tel,o.verify_date,o.gift
                from (
                    select orders_id,product_name,sum(item_num) as item_num
                    from crm_orders_item i
                    join crm_orders o on o.status='audited' and o.id=i.orders_id
                    " . $where . "
                    group by orders_id,product_name
                ) t
                left join crm_orders o on o.id=t.orders_id
                group by orders_id ";

        $db = self::__instance();
        $list = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($list)) {
            foreach ($list as &$item) {
                $temp = $item['orders'];
                $n = substr_count($temp, ",");
                if ($n < 9) {
                    for ($i = 0; $i < (9 - $n); $i++) {
                        $temp .= ",";
                    }
                } else if ($n > 9) {
                    $idx = Common::str_n_pos($temp, ",", 10);
                    $temp = mb_substr($temp, 0, $idx);
                }
                $item['orders'] = $temp;
            }
            return $list;
        } else {
            return array();
        }
    }
}
