<?php

/**
 * anhouse环境入口文件
 */

error_reporting(E_ALL);

//定义一些域名和路径变量
$releasePath    = '/data1/www/paf_release';
$configPath     = '/data1/www/index/paf/config';
$vendorPath     = '/data1/www/paf_release/paf-vendor/laravel';
$jsonPath       = '/data1/www/other/paf';
$storagePath    = '/data1/www/other/tmp';
$logPath        = '/data1/logs/app';

//解析域名
$httpHost = $_SERVER['HTTP_HOST'];
$hostParams = explode('.',$httpHost);
if(count($hostParams) == 3){ //3段式URL，普通web地址
    $appName = $hostParams[0];
} elseif (count($hostParams) == 4){ //4段式URL，有两种情况:带m的域名或者service-xxx内部域名
    $appName = $hostParams[0];
} elseif (count($hostParams) == 5){ //5段式URL，xxx.s.d.pa.com，需要在应用前加service-前缀
    $appName = 'service-'.$hostParams[0];
} else {
    header('Location:http://www.anhouse.cn');
    exit();
}

//获取vendor的版本和地址
$vendorFile = $jsonPath.'/vendorversion/'.$appName.'.json';
if(!file_exists($vendorFile)){
    header('Location:http://www.anhouse.cn');
    exit();
}
$vendorData = json_decode(file_get_contents($vendorFile),'true');
$vendorVersion = $vendorData['version'];

//获取app版本号
$versionFile = $jsonPath.'/appversion/'.$appName.'.json';
if(!file_exists($versionFile)){
    header('Location:http://www.anhouse.cn');
    exit();
}
$versionData = json_decode(file_get_contents($versionFile),'true');
$gaVersion = $versionData['ga'];

//定义一系列系统常量
define('PAF_ENV_NAME',          'anhouse');                                         //环境名
define('PAF_VERSION',           $gaVersion);                                        //cloud名
define('PAF_SYS_PATH',          $vendorPath.'/v'.$vendorVersion);                   //vendor路径
define('PAF_APP_PATH',          $releasePath.'/'.$appName.'/'.$gaVersion.'/app');   //APP路径
define('PAF_STORAGE_PATH',      $storagePath.'/'.$appName.'/'.$gaVersion);          //STORAGE路径
define('PAF_ENV_CONFIG_PATH',   $configPath.'/'.PAF_ENV_NAME.'/'.$appName);         //环境变量配置路径
define('PAF_LOG_PATH',          $logPath.'/'.$httpHost);                            //日志路径

if(!is_dir($releasePath.'/'.$appName.'/'.$gaVersion)){
    header('Location:http://www.anhouse.cn');
    exit();
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