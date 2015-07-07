<?php
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', 'On');
error_reporting(E_ALL);

require __DIR__ . '/lib/version.php';
define('G_VERSION_TYPE', 'beta');

$sCloudBaseDir = '/data1/www/dev_cloud';

define('IPO_ENV', getenv("IPO_ENV"));
define('IPO_BASE_DOMAIN', "test-crm.pinganhaofang.com");

$sCloudName = 'liujt';
$sCloudPath = $sCloudBaseDir . '/' . $sCloudName;
define('ENV_CLOUDNAME', $sCloudName);

if(is_dir($sCloudPath)){
	define('ENV_NAME', '.' . $sCloudName . '.' . IPO_ENV);
	$sChannel = 'crm';


    if (file_exists($sCloudPath . '/' . $sChannel)) {
        $sCloudPath .= '/' . $sChannel;
    }

	define('ROOT', $sCloudPath);
	define('VERSION', '');
	define('CFG_PATH', __DIR__ . '/config_' . IPO_ENV);
	
	if(file_exists('./index/' . $sChannel . '.php')){
		if(!defined('MEMCACHE_COMPRESSED')){
			define('MEMCACHE_COMPRESSED', 2);
		}
		include './index/' . $sChannel . '.php';
	}else{
		header('Location:http://' . IPO_BASE_DOMAIN, true, 302);
		exit();
	}
}else{
	header('Location:http://' . IPO_BASE_DOMAIN, true, 302);
	exit();
}

# end of this file
