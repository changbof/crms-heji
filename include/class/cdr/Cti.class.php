<?php
if(!defined('ACCESS')) {exit('Access denied.');}

class Cti extends CtiBase {

	private static $table_name = ' asteriskcdrdb.cdr ';
	private static $columns = " calldate, clid, src, dst, dcontext, channel, dstchannel, lastapp, lastdata, duration, billsec, disposition, amaflags, accountcode, uniqueid, userfield ";

	//话务查询
	public static function getCdr($sdate,$edate){
		if(!$sdate || !$edate ){
			return false;
		}
		$db=self::__instance(CTI_DB_ID);
		$sql="select disposition as disposition,count(*) num 
			  from asteriskcdrdb.cdr 
			  where calldate between '".$sdate." 00:00:00' and '".$edate." 23:59:59'
			  group by disposition 
			  union all
			  select 'TOTAL' as disposition,count(*) num 
			  from asteriskcdrdb.cdr
			  where calldate between '".$sdate." 00:00:00' and '".$edate." 23:59:59' ";
		$list = $db -> query($sql)-> fetchAll(PDO::FETCH_ASSOC);
		if($list){
			return $list;
		}else{
			return array();
		}
	}

	//录音查询统计
	public static function countRecords($sdate='',$edate='',$dcontext='',$keyword='',$duration=''){
		$where = " where (dcontext = 'from-did-direct' or dcontext = 'from-internal' or dcontext = 'ext-queues') and userfield <>''  ";
        if($duration!=''){
            $where .= " and duration>".$duration ;
        }
		if(!$sdate==''){
			$where .= " and calldate>='".$sdate."'";
		}
		if(!$edate==''){
			$where .= " and calldate<='".$edate."'";
		}
		if(!$dcontext==''){
			if($dcontext=='from-internal'){
				$where .= " and LENGTH(src)=4 ";
			}else{
				$where .= " and LENGTH(src)>8 ";
			}
		}
		if(!$keyword==''){
			$where .= " and (src like '%" . $keyword . "%' or dst like '%" . $keyword . "%') ";
		}
		$sql = " select count(*) from asteriskcdrdb.cdr ".$where ;
		$db=self::__instance(CTI_DB_ID);
		$num = 0 + ($db -> query($sql)-> fetchColumn());
		return $num;
	}

	//录音查询统计
	public static function searchRecords($sdate='',$edate='',$dcontext='',$keyword='',$duration='',$start ='' ,$page_size=''){
		$where = " where (dcontext = 'from-did-direct' or dcontext = 'from-internal' or dcontext = 'ext-queues') and userfield <>''  ";
        if($duration!=''){
            $where .= " and duration>".$duration ;
        }
		if(!$sdate==''){
			$where .= " and calldate>='".$sdate."'";
		}
		if(!$edate==''){
			$where .= " and calldate<='".$edate."'";
		}
		if(!$dcontext==''){
			if($dcontext=='from-internal'){
				$where .= " and LENGTH(src)=4 ";
			}else{
				$where .= " and LENGTH(src)>8 ";
			}
		}
		if(!$keyword==''){
			$where .= " and (src like '%" . $keyword . "%' or dst like '%" . $keyword . "%') ";
		}
		$limit ="";
		if($page_size){
			$limit =" limit $start,$page_size ";
		}
		$sql = " select calldate, src, dst, dcontext, dstchannel, sec_to_time(duration) as duration, uniqueid, userfield 
						 from asteriskcdrdb.cdr ".$where. " order by calldate desc $limit";
		$db=self::__instance(CTI_DB_ID);
		$list = $db -> query($sql)-> fetchAll(PDO::FETCH_ASSOC);
		if(!empty($list)){
			foreach ( $list as &$record ) {
				$record['audio'] = ($record['dcontext']=='from-internal' || $record['dcontext']=='from-did-direct')
						?substr($record['userfield'],6,strlen(trim($record['userfield'])))
						:substr($record['userfield'],34,strlen(trim($record['userfield'])));
			}
			
			return $list;
		}else{
			return array();
		}
	}

	/** 
	 * 电话记录查询:合计
	 *   $type: missed-未接 [other]-已接通 
	 *   $ext: 分机号 
	 * 
	 */
	public static function countMissList($sdate='',$edate='',$direction='',$keyword='',$type='',$duration=''){
		$where = " where 1=1 ";
		if(!$sdate==''){
			$where .= " and calldate>='".$sdate."'";
		}
		if(!$edate==''){
			$where .= " and calldate<='".$edate."'";
		}
		if($direction){
			if(!$keyword==''){
				$where .= " and $direction like '%" . $keyword . "%' ";
			}
		}
		if($type!=''){
			if($type=='missed'){
				$where .= " and lastapp in ('Dial','Hangup','Voicemail') and userfield ='' ";
			}else{
				$where .= " and userfield <>'' and duration>90 ";
			}
		}
		if(!$edate==''){
			$where .= " and calldate<='".$edate."'";
		}
        if($duration!=''){
            $where .= " and duration>90 ";
        }
		$sql = " select count(*) from asteriskcdrdb.cdr ".$where ;
		$db=self::__instance(CTI_DB_ID);
		$num = 0 + ($db -> query($sql)-> fetchColumn());
		return $num;
	}

	//电话记录统计
	public static function searchMissList($sdate='',$edate='',$direction='',$keyword='',$type='',$duration='',$start ='',$page_size=''){
		$where = " where 1=1 ";
		if(!$sdate==''){
			$where .= " and calldate>='".$sdate."'";
		}
		if(!$edate==''){
			$where .= " and calldate<='".$edate."'";
		}
		if($direction){
			if(!$keyword==''){
				$where .= " and $direction like '%" . $keyword . "%' ";
			}
		}
		if($type!=''){
			if($type=='missed'){
				$where .= " and lastapp in ('Dial','Hangup','Voicemail') and userfield='' ";
			}else{
				$where .= " and userfield <>'' and duration>90  ";
			}
		}
        if($duration!=''){
            $where .= " and duration>90 ";
        }
		$limit ="";
		if($page_size!=''){
			$limit =" limit $start,$page_size ";
		}
		$sql = " select calldate, src, dst, dcontext, dstchannel, sec_to_time(duration) as duration, uniqueid, userfield from asteriskcdrdb.cdr cdr
		         left join osadmin_crms.crm_customer cus on cdr.src=cus.mobile or cdr.src=cus.telphone
		       ".$where. " order by calldate desc $limit";
        print_r($sql);
		$db=self::__instance(CTI_DB_ID);
		$list = $db -> query($sql)-> fetchAll();
		if($list){
			return $list;
		}else{
			return array();
		}
	}

	//销售代表当天电话时长统计
	//ext: 座席分机号
    //cno: 客户号码
	public static function sumDuration($sdate='',$edate='',$ext='',$cno='',$duration=''){
		$where = " where userfield<>'' ";
        if($duration!=''){
            $where .= " and duration>".$duration ;
        }else{
            $where .= " and duration>90 " ;
        }
        if(!$sdate==''){
			$where .= " and calldate >= '".$sdate."' ";
		}
		if(!$edate==''){
			$where .= " and calldate < '".$edate."' ";
		}
        if($ext!=''){
            $where .= " and (src='".$ext."' or dst='".$ext."' or SUBSTRING(channel,5,4)='".$ext."')";
        }
        if($cno!=''){
            $where .= " and (src='".$cno."' or dst='".$cno."')";
        }
		$sql = "select SEC_TO_TIME(ifnull(sum(duration),0)) as duration from asteriskcdrdb.cdr ".$where ;

		$db=self::__instance(CTI_DB_ID);
		$num = $db -> query($sql)-> fetchColumn();
		return $num;
	}
}
