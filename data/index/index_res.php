<?php
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', 'Off');

$sBasdDir = '/data1/www';
$sReleaseDir = $sBasdDir . '/release';

$aTmp = explode('/', $_SERVER['REQUEST_URI']);
$sVersion = $aTmp[1];

$sReleasePath = $sReleaseDir . '/' . $sVersion;
if(is_dir($sReleasePath)){}else{
	$sVerInfoPath = $sBasdDir . '/other/ga.ini';
	if(file_exists($sVerInfoPath)){
		$sVersion = trim(file_get_contents($sVerInfoPath));
		$sReleasePath = $sReleaseDir . '/' . $sVersion;
	}
}

if(is_dir($sReleasePath)){
	define('ENV_NAME', '');
	define('ROOT', $sReleasePath);
	define('VERSION', $sVersion);
	define('CFG_PATH', $sBasdDir . '/config');
	$aTmp = explode('.', $_SERVER['HTTP_HOST']);
	$sChannel = $aTmp[0];
	if(file_exists('./index/' . $sChannel . '.php')){
		include './index/' . $sChannel . '.php';
	}else{
		header('Location:http://www.pinganfang.com', true, 302);
		exit();
	}
}else{
	echo 'No Version Files.';
}