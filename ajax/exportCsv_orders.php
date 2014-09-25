<?php
// 输出Excel文件头，可把user.csv换成你要的文件名
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="和济·已审核订单_至'.date('Y-m-d').'.csv"');
header('Cache-Control: max-age=0');

require ('../include/init.inc.php');
$sdate = $edate = $edate2 = $vested = $status = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

$status="audited";
if($edate!=''){
    $edate2 = date('Y-m-d',strtotime("$edate +1 day"));
}

$orders = Orders::exportOrdersHaveBeenAudited($sdate,$edate2,$vested,$status);

// 从数据库中获取数据，为了节省内存，不要把数据一次性读到内存，从句柄中一行一行读即可
// 打开PHP文件句柄，php://output 表示直接输出到浏览器
$fp = fopen('php://output', 'a');
 
// 输出Excel列名信息
$head = array(
      "营养顾问","电话","产品1","数量","产品2","数量","产品3","数量","产品4","数量","产品5","数量",
      "金额","客户姓名","地址","联系电话","核单时间","备注"
);

foreach ($head as $i => $v) {
    // CSV的Excel支持GBK编码，一定要转换，否则乱码
    $head[$i] = iconv('utf-8', 'gbk', $v);
}

// 将数据通过fputcsv写到文件句柄
fputcsv($fp, $head);
 
// 计数器
$cnt = 0;
// 每隔$limit行，刷新一下输出buffer，不要太大，也不要太小
$limit = 100000;
 
// 逐行取出数据，不浪费内存
$count = count($orders);
for($t=0;$t<$count;$t++) {
 
    $cnt ++;
    if ($limit == $cnt) { //刷新一下输出buffer，防止由于数据过多造成问题
        ob_flush();
        flush();
        $cnt = 0;
    }
    //取出一行
    $row = $orders[$t];
    //print_r($row);
    $p = array();
    foreach ($row as $i => $v) {
        $v = iconv('utf-8', 'gbk', $v);
        $row[$i] = $v;
        if($i=='orders'){
            $p = explode(',',$v);
        }
    }
    if(!empty($p)){
        array_splice($row,2,1,$p);
    }
    fputcsv($fp, $row);
}
