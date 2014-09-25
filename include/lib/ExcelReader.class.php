<?php
if(!defined('ACCESS')) {exit('Access denied.');}

if( !defined( __DIR__ ) )
	define( __DIR__, dirname(__FILE__) );

require (__DIR__.'/Spreadsheet_Excel_Reader.class.php');
class ExcelReader {
	public static function readXLS($file,$row=1,$col=1){
		$data = new Spreadsheet_Excel_Reader();
		$data->setOutputEncoding('UTF-8'); //设置输出的编码为utf8
		$ret = $data->read($file); //要读取的excel文件地址
		if($ret == -1){
			$array = false;
		}else{
			//$data->sheets[0]['numRows']是excel的总行数
			//$i表示从excel的第$i行开始读取
			//$j表示从行的第$j列开始讲读取
			for ($i =$row ; $i <= $data->sheets[0]['numRows']; $i++) {
				for ($j = $col; $j <= $data->sheets[0]['numCols']; $j++) {
					$array[$i-$row][$j-$col] = addcslashes($data->sheets[0]['cells'][$i][$j],"'");
				}
			}
		}
		return $array;
	}

}
?>