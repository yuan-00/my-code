<?php

define('PATH_URL', 'http://localhost/');
define('PUBLIC_PATH', PATH_URL.'Community/public/');
define('CSS_URL', PATH_URL.'Community/public/css/');
define('ADMIN_PUBLIC', PATH_URL.'Community/Home/View/public/');
define('HOME_URL', PATH_URL.'Community/index.php/Home/');
define('JS_URL', PATH_URL.'Community/public/js/');
define('IMG_URL', PATH_URL.'Community/public/img/');
//验证码
$config =    array(
    'fontSize'    =>    30,    // 验证码字体大小
    'length'      =>    3,     // 验证码位数
    'useNoise'    =>    false, // 关闭验证码杂点
);
$mssql =array(
    'db_type'  => 'mssql',
    'db_user'  => 'sa',
    'db_pwd'   => '123456',
    'db_host'  => 'localhost',
    'db_port'  => '1433',
    'db_name'  => 'mssql',
    'db_charset' => 'utf8',
);
return array(
	//'配置项'=>'配置值'
	    // 添加数据库配置信息
    'URL_MODEL' => 0,
    
    'VAR_MODULE'            =>  'm',     // 默认模块获取变量
    'VAR_CONTROLLER'        =>  'c',    // 默认控制器获取变量
    'VAR_ACTION'            =>  'a',    // 默认操作获取变量
    	

    'db_type'  => 'mysql',
    'db_user'  => 'root',
    'db_pwd'   => '123456',
    'db_host'  => 'localhost',
    'db_port'  => '3306',
    'db_name'  => 'think_blog',
    'db_charset' => 'utf8',
	'DB_PREFIX' => 'think_', // 数据库表前缀

);