<?php

/**
 * anhouse环境artisan命令行工具
 */

error_reporting(E_ALL);

//定义一些域名和路径变量
$releasePath    = '/data1/www/paf_release';
$configPath     = '/data1/www/index/paf/config';
$vendorPath     = '/data1/www/paf_release/paf-vendor/laravel';
$jsonPath       = '/data1/www/other/paf';
$storagePath    = '/data1/www/other/tmp';
$logPath        = '/data1/logs/cmd';

//初始化domain
$domain = '';
if(isset($_SERVER['argv'][1])){
    $domain = $_SERVER['argv'][1];
    unset($_SERVER['argv'][1]);
}
if($domain == ''){
    exit("Please assign the domain name\r\n");
}

//获取vendor的版本和地址
$vendorFile = $jsonPath.'/vendorversion/'.$domain.'.json';
if(!file_exists($vendorFile)){
    exit("Vendor version file:".$vendorFile." not exits\r\n");
}
$vendorData = json_decode(file_get_contents($vendorFile),'true');
$vendorVersion = $vendorData['version'];

//获取app版本号
$versionFile = $jsonPath.'/appversion/'.$domain.'.json';
if(!file_exists($versionFile)){
    exit("App version file:".$versionFile." not exits\r\n");
}
$versionData = json_decode(file_get_contents($versionFile),'true');
$gaVersion = $versionData['ga'];

//定义一系列系统常量
define('PAF_ENV_NAME',          'anhouse');                                         //环境名
define('PAF_VERSION',           $gaVersion);                                        //cloud名
define('PAF_SYS_PATH',          $vendorPath.'/v'.$vendorVersion);                   //vendor路径
define('PAF_APP_PATH',          $releasePath.'/'.$domain.'/'.$gaVersion.'/app');    //APP路径
define('PAF_STORAGE_PATH',      $storagePath.'/'.$domain.'/'.$gaVersion);           //STORAGE路径
define('PAF_ENV_CONFIG_PATH',   $configPath.'/'.PAF_ENV_NAME.'/'.$domain);          //环境变量配置路径
define('PAF_LOG_PATH',          $logPath.'/'.$domain);                              //日志路径

if(!is_dir($releasePath.'/'.$domain.'/'.$gaVersion)){
    exit("ReleasePath:".$releasePath.'/'.$domain.'/'.$gaVersion." not exits\r\n");
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