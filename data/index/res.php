<?php
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', 'Off');

$sBasdDir = '/data1/www';
$sReleaseDir = $sBasdDir . '/release';

$aTmp = explode('.', $_SERVER['HTTP_HOST']);
$sChannel = substr($aTmp[0], 3);

$aTmp = explode('/', $_SERVER['REQUEST_URI']);
$sVersion = $aTmp[1];

if(empty($sVersion)){
	header('Location:http://www.pinganfang.com', true, 302);
	die();
}

$sReleasePath = $sReleaseDir . '/' . $sChannel . '/' . $sVersion;

if(is_dir($sReleasePath)){
	define('ENV_NAME', '');
	define('ROOT', $sReleasePath);
	define('VERSION', $sVersion);
	define('CFG_PATH', $sBasdDir . '/index/config');
	
	if(file_exists('./res/' . $sChannel . '.php')){
		include './res/' . $sChannel . '.php';
	}else{
		header('Location:http://www.pinganfang.com', true, 302);
		exit();
	}
}else{
	echo 'No Version Files.';
}
