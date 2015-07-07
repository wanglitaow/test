<?php
/**
 * PAF Laravel 测试环境入口文件
 * User: 洪明伟
 * Date: 2015/5/28
 * Time: 9:50
 */

error_reporting(E_ALL);

//定义一些域名和路径变量
$baseDomain     = 'qa.anhouse.com.cn';
$cloudPath      = '/data1/www/laravel_v4/cloud';
$configPath     = '/data1/www/index/paf/config';
$vendorPath     = '/data1/www/paf-vendor/laravel';
$jsonPath       = '/data1/www/laravel_v4/json';
$storagePath    = '/data1/www/other/tmp';
$logPath        = '/data1/logs/app';

//解析域名
$httpHost = $_SERVER['HTTP_HOST'];
$hostParams = explode('.',$httpHost);
if(count($hostParams) == 6){ //6段式URL，普通web地址
    $appName = $hostParams[0];
    $cloudName = $hostParams[1];
} elseif (count($hostParams) == 7){ //7段式URL，含m的域名
    $appName = $hostParams[0];
    $cloudName = $hostParams[2];
} else {
    exit('不合法的域名');
}

//获取vendor的版本和地址
$vendorFile = $jsonPath.'/vendorversion/'.$appName.'.json';
if(!file_exists($vendorFile)){
    exit('Vendor json file:'.$vendorFile.' not exits');
}
$vendorData = json_decode(file_get_contents($vendorFile),'true');
$vendorVersion = $vendorData['version'];

//定义一系列系统常量
define('PAF_ENV_NAME',          'qa');                                              //环境名
define('PAF_CLOUD',             $cloudName);                                        //cloud名
define('PAF_SYS_PATH',          $vendorPath.'/v'.$vendorVersion);                   //vendor路径
define('PAF_APP_PATH',          $cloudPath.'/'.$cloudName.'/'.$appName.'/app');     //APP路径
define('PAF_STORAGE_PATH',      $storagePath.'/'.$appName.'/'.$cloudName);          //STORAGE路径
define('PAF_ENV_CONFIG_PATH',   $configPath.'/'.PAF_ENV_NAME.'/'.$appName);         //环境变量配置路径
define('PAF_LOG_PATH',          $logPath.'/'.$httpHost);                            //日志路径

if(!is_dir($cloudPath.'/'.$cloudName)){
    exit('CloudName:'.$cloudName.' not exits');
}
if(!is_dir($cloudPath.'/'.$cloudName.'/'.$appName)){
    exit('AppName:'.$appName.' not exits');
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
require PAF_APP_PATH . "/../public/index.php";