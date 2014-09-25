<?php
// 输出Excel文件头，可把user.csv换成你要的文件名
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="呼吸道症候群病例调查表'.date('Y-m-d').'.csv"');
header('Cache-Control: max-age=0');

require ('../include/init.inc.php');
$sdate = $edate = $type = $status = '';
extract ( $_REQUEST, EXTR_IF_EXISTS );

$sex_options = Dict::getDictForOptionsByKeyName('sex');
$income_options = Dict::getDictForOptionsByKeyName('income');
$source_options = Dict::getDictForOptionsByKeyName('source');
$personalitytype_options = Dict::getDictForOptionsByKeyName('personalitytype');
$personalitytraits_options = Dict::getDictForOptionsByKeyName('personalitytraits');
$dietpreference_options = Dict::getDictForOptionsByKeyName('dietpreference');
$dietfoods_options = Dict::getDictForOptionsByKeyName('dietfoods');
$diethobby_options = Dict::getDictForOptionsByKeyName('diethobby');
$dietsnacks_options = Dict::getDictForOptionsByKeyName('dietsnacks');
$diettaste_options = Dict::getDictForOptionsByKeyName('diettaste');
$link_relation_options = Dict::getDictForOptionsByKeyName('relation');
$labor_intensity_options = Dict::getDictForOptionsByKeyName('laborintensity');
$ordersstatus_options = Dict::getDictForOptionsByKeyName('ordersstatus');

$customers = Customer::exportCustomers($sdate,$edate,$type,$status);


// 从数据库中获取数据，为了节省内存，不要把数据一次性读到内存，从句柄中一行一行读即可
// 打开PHP文件句柄，php://output 表示直接输出到浏览器
$fp = fopen('php://output', 'a');
 
// 输出Excel列名信息
$head = array(
      "姓名","性别","出生日期","地址","手机号码","电话号码","联系人","关系","联系电话","收入情况","介绍人","性格类型","性格特点","其他备注","饮食偏好","口味","正餐情况","嗜好","非主食情况","身高(cm)","体重(kg)","职业","劳动强度","血压(舒张压,mmHg)","血压(收缩压,mmHg)","血糖.餐前(mmol\l)","血糖.餐后(mmol\l)","确诊疾病","诊断时间","其他疾病","症状","异常指标","有无化验单","曾用药"
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
$count = count($customers);
for($t=0;$t<$count;$t++) {
 
    $cnt ++;
    if ($limit == $cnt) { //刷新一下输出buffer，防止由于数据过多造成问题
        ob_flush();
        flush();
        $cnt = 0;
    }
    //取出一行
    $row = $customers[$t];
    foreach ($row as $i => $v) {
        if($i==1) $v = $sex_options[$v];
        $row[$i] = iconv('utf-8', 'gbk', $v);
    }
    fputcsv($fp, $row);
}
