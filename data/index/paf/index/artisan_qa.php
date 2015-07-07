<?php

/**
 * 测试环境artisan命令行工具
 */

error_reporting(E_ALL);

//定义一些域名和路径变量
$cloudPath      = '/data1/www/laravel_v4/cloud';
$configPath     = '/data1/www/index/paf/config';
$vendorPath     = '/data1/www/paf-vendor/laravel';
$jsonPath       = '/data1/www/laravel_v4/json';
$storagePath    = '/data1/www/other/tmp';
$logPath        = '/data1/logs/cmd';

//初始化cloud和domain
$cloud = '';
$domain = '';
if(isset($_SERVER['argv'][1])){
    $cloud = $_SERVER['argv'][1];
    unset($_SERVER['argv'][1]);
}
if(isset($_SERVER['argv'][2])){
    $domain = $_SERVER['argv'][2];
    unset($_SERVER['argv'][2]);
}

if($cloud == ''){
    exit("Please assign the cloud name\r\n");
}
if($domain == ''){
    exit("Please assign the domain name\r\n");
}

//获取vendor的版本和地址
$vendorFile = $jsonPath.'/vendorversion/'.$domain.'.json';
if(!file_exists($vendorFile)){
    exit("Vendor json file:".$vendorFile." not exits\r\n");
}
$vendorData = json_decode(file_get_contents($vendorFile),'true');
$vendorVersion = $vendorData['version'];

//定义一系列系统常量
define('PAF_ENV_NAME',          'qa');                                              //环境名
define('PAF_CLOUD',             $cloud);                                            //cloud名
define('PAF_SYS_PATH',          $vendorPath.'/v'.$vendorVersion);                   //vendor路径
define('PAF_APP_PATH',          $cloudPath.'/'.$cloud.'/'.$domain.'/app');          //APP路径
define('PAF_STORAGE_PATH',      $storagePath.'/'.$domain.'/'.$cloud);               //STORAGE路径
define('PAF_ENV_CONFIG_PATH',   $configPath.'/'.PAF_ENV_NAME.'/'.$domain);          //环境变量配置路径
define('PAF_LOG_PATH',          $logPath.'/'.$domain.'/'.$cloud);                   //日志路径

if(!is_dir($cloudPath.'/'.$cloud)){
    exit("CloudPath:".$cloudPath.'/'.$cloud." not exits\r\n");
}
if(!is_dir($cloudPath.'/'.$cloud.'/'.$domain)){
    exit("AppPath:".$cloudPath.'/'.$cloud.'/'.$domain." not exits\r\n");
}

//创建storage path和log path
$paths = [
    PAF_LOG_PATH,
    PAF_STORAGE_PATH.'/cache',
    PAF_STORAGE_PATH.'/meta',
    PAF_STORAGE_PATH.'/sessions',
    PAF_STORAGE_PATH.'/views',
    PAF_STORAGE_PATH.'/logs'
];
foreach($paths as $path){
    if(!is_dir($path)) mkdir($path,0777,true);
}

//加载系统autoload和app内部的入口文件
require PAF_SYS_PATH . "/vendor/autoload.php";
require PAF_APP_PATH . "/../artisan.php";