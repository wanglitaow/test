<?php
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require __DIR__ . '/lib/version.php';
define('G_VERSION_TYPE', 'beta');

$sCloudBaseDir = '/data1/www/dev_cloud';
$sCloudName = 'bis';
$sChannel = 'bis';

$ipo_dev = getenv("IPO_ENV") != 'qa' ? 'dev' : 'test';
define('IPO_ENV', $ipo_dev);
define('BIS_BASE_DOMAIN', IPO_ENV . "-bis.pinganhaofang.com");
define('ENV_NAME','.bis.'.getenv("IPO_ENV"));

$sCloudPath = $sCloudBaseDir . '/' . $sCloudName;
define('ENV_CLOUDNAME', $sCloudName);
if(is_dir($sCloudPath)){
    
    if (file_exists($sCloudPath . '/' . $sChannel)) {
        $sCloudPath .= '/' . $sChannel;
    }

	define('ROOT', $sCloudPath);
	define('VERSION', '');
	define('CFG_PATH', __DIR__ . '/config_' . getenv("IPO_ENV"));
	
	if(file_exists('./index/' . $sChannel . '.php')){
		if(!defined('MEMCACHE_COMPRESSED')){
			define('MEMCACHE_COMPRESSED', 2);
		}
		include './index/' . $sChannel . '.php';
	}else{
		header('Location:http://' . BIS_BASE_DOMAIN, true, 302);
		exit();
	}
}else{
	header('Location:http://' . BIS_BASE_DOMAIN, true, 302);
	exit();
}
