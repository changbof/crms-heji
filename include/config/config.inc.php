<?php
define ('ACCESS',1); 
error_reporting(E_ALL ^ E_NOTICE);
//autoload 使用常量
define ( 'ADMIN_BASE', dirname ( __FILE__ ) . '/../../include' );
define ( 'ADMIN_BASE_LIB', ADMIN_BASE . '/lib/' );
define ( 'ADMIN_BASE_CLASS', ADMIN_BASE . '/class/' );

//Smarty模板使用常量
define ( 'TEMPLATE_DIR', ADMIN_BASE . '/template/' );
define ( 'TEMPLATE_COMPILED', ADMIN_BASE . '/compiled/' );
define ( 'TEMPLATE_PLUGINS', ADMIN_BASE_LIB . 'Smarty/plugins/' );
define ( 'TEMPLATE_SYSPLUGINS', ADMIN_BASE_LIB . 'Smarty/sysplugins/' );
define ( 'TEMPLATE_CONFIGS', ADMIN_BASE . '/config/' );
define ( 'TEMPLATE_CACHE', ADMIN_BASE . '/cache/' );

//OSAdmin常量
define ( 'ADMIN_URL' ,'http://127.0.0.1/crms');
define ( 'ADMIN_TITLE' ,'客户管理系统');
define ( 'COMPANY_NAME' ,'和济 · 营养干预');

//webim设置
define ( 'WEBIM_URL' ,'http://127.0.0.1/crms');
//注意：请配置webim数据源
//配置文件：/data/db.php

//呼叫中心服务器
define ( 'CALLCENTER_IP' ,'192.168.1.189');

//OSAdmin数据库设置
define ( 'OSA_DB_ID' ,'osadmin');
define ( 'OSA_DB_TYPE','mysql');
define ( 'OSA_DB_URL','127.0.0.1');
define ( 'OSA_DB_PORT','3306');
define ( 'OSA_DB_NAME' ,'osadmin_crms');
define ( 'OSA_USER_NAME','root');
define ( 'OSA_PASSWORD','root');

//样例数据库设置
define ( 'SAMPLE_DB_ID' ,'sample');
define ( 'SAMPLE_DB_TYPE','mysql');
define ( 'SAMPLE_DB_URL','127.0.0.1');
define ( 'SAMPLE_DB_PORT','3306');
define ( 'SAMPLE_DB_NAME' ,'osadmin_crms');
define ( 'SAMPLE_USER_NAME','root');
define ( 'SAMPLE_PASSWORD','root');

//COOKIE加密密钥
define( 'OSA_ENCRYPT_KEY','whatafuckingday!wokao');

//prefix不要更改，除非修改osadmin.sql文件中的所有表名
define ( 'OSA_TABLE_PREFIX' ,'osa_');

//页面设置
define ( 'DEBUG' ,false);
define ( 'PAGE_SIZE', 10 );

//速递参数
//eg: http://api.ickd.cn/?id=102828&secret=01024a4de795a1de1de2499abddab537&com=auto&nu=1137652358903&type=json&encode=utf8&ord=desc
define('EXP_URL','http://api.ickd.cn/');
define('EXP_ID','102828');
define('EXP_SECRET','01024a4de795a1de1de2499abddab537');
define('EXP_TYPE','json');
define('EXP_ORD','desc');
define('EXP_ENCODE','utf8');

//数据库配置
$DATABASE_LIST[OSA_DB_ID] =array ("database_type"=>OSA_DB_TYPE,"server"=>OSA_DB_URL,"port"=>OSA_DB_PORT,"username"=> OSA_USER_NAME, "password"=>OSA_PASSWORD, "database_name"=>OSA_DB_NAME );
$DATABASE_LIST[SAMPLE_DB_ID] = array ("database_type"=>SAMPLE_DB_TYPE,"server"=>SAMPLE_DB_URL,"port"=>SAMPLE_DB_PORT,"username"=> SAMPLE_USER_NAME, "password"=>SAMPLE_PASSWORD, "database_name"=>SAMPLE_DB_NAME );


$OSADMIN_COMMAND_FOR_LOG=array(	
	'SUCCESS'	=> '成功',
	'ERROR'		=> '失败',
	'ADD'		=> '增加',
	'DELETE'	=> '删除',
	'MODIFY'	=> '修改',
	'LOGIN'		=> '登录',
	'LOGOUT'	=> '退出',
	'PAUSE'		=> '封停',
	'PLAY'		=> '解封',
	'REVOKE'	=> '撤销',
	'IMPORT'	=> '导入',
	'EXPORT'	=> '导出',
	'ASSIGN'	=> '分配',
	);

$OSADMIN_CLASS_FOR_LOG=array(
	'ALL' 			=> '全部',
	'User'			=> '用户',
	'UserGroup'		=> '账号组',
	'Module'		=> '菜单模块',
	'MenuUrl'		=> '功能',
	'GroupRole'		=> '权限',
	'QuickNote'		=> 'QuickNote',
	'Dict'			=> '字典',
	'Knowledge'		=> '知识库',
	'Customer'		=> '客户管理',
	'Disease'		=> '疾病知识库',
	'Product'		=> '产品',
	'Orders'		=> '订单',
	'Sale'			=> '电话沟通',
	'ComeTel'		=> '客户来电',

	);

//---------------------------------------------------

//增加业务表前缀变量
define ( 'BUZ_TABLE_PREFIX' ,'buz_');

//---------------------------------------------------
//呼叫中心数据库设置
define ( 'CTI_DB_ID' ,'cticdr');
define ( 'CTI_DB_TYPE','mysql');
define ( 'CTI_DB_URL','localhost');
define ( 'CTI_DB_PORT','3306');
define ( 'CTI_DB_NAME' ,'asteriskcdrdb');
define ( 'CTI_USER_NAME','root');
define ( 'CTI_PASSWORD','root');
$DATABASE_LIST[CTI_DB_ID] = array ("database_type"=>CTI_DB_TYPE,"server"=>CTI_DB_URL,"port"=>CTI_DB_PORT,"username"=> CTI_USER_NAME, "password"=>CTI_PASSWORD, "database_name"=>CTI_DB_NAME );


?>