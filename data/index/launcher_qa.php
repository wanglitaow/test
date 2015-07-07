<?php
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define('IPO_ENV', 'qa');
require __DIR__ . '/lib/version.php';

$sCloudBaseDir = '/data1/www/dev_cloud';

if($_SERVER['argc'] > 2){
	$aArg = array();
	for($i = 2; $i < $_SERVER['argc']; ++$i){
		if(isset($_SERVER['argv'][$i]) and isset($_SERVER['argv'][$i + 1])){
			if('-' == substr($_SERVER['argv'][$i], 0, 1)){
				$aArg[strtoupper(substr($_SERVER['argv'][$i], 1))] = $_SERVER['argv'][++$i];
			}
		}
	}
}
$sCloudName = $aArg['CLOUDNAME'];
$sCloudPath = $sCloudBaseDir . '/' . $sCloudName;
$sChannel = $aArg['CHANNEL'];

if (file_exists($sCloudPath . '/' . $sChannel)) {
    $sCloudPath .= '/' . $sChannel;
}

if(is_dir($sCloudPath)){
    define('ENV_NAME', '.' . $sCloudName . '.qa');
    define('ROOT', $sCloudPath);
    define('VERSION', '');
    define('CFG_PATH', __DIR__ . '/config_' . IPO_ENV);
    define('CHANNEL', $sChannel);
    define('CLOUDNAME', $sCloudName);
    define('G_VERSION_TYPE', 'beta');

    include '/data1/www/index/launcher/' . $sChannel . '.php';
}else{
	echo 'No Channel File.';
}
