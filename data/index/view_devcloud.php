<?php
/**
 * Created by PhpStorm.
 * User: jxu
 * Date: 14-1-26
 * Time: 下午5:20
 */
$aDirs = scandir($sCloudBaseDir);
$aClouds = array();
foreach($aDirs as $sDir){
	if('.' == $sDir or '..' == $sDir){}else{
		if(is_dir($sCloudBaseDir . DIRECTORY_SEPARATOR . $sDir)){
			$aClouds[] = array( 
					'sCloudName' => $sDir,
					'sWWWDomain' => 'http://www.' . $sDir . '.'.IPO_BASE_DOMAIN,
					'sManageDomain' => 'http://manage.' . $sDir . '.'.IPO_BASE_DOMAIN 
			);
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Dev Branch List</title>
<meta http-equiv="Expires" content="-1" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<style type="text/css">
html,body {
	background-color: #fff;
	color: #000;
}

table,td {
	border-collapse: collapse;
}

html,body,div,span,iframe,table,tr,td,img,p,form,ul,li,dl,dt,dd {
	font-family: inherit;
	font-weight: inherit;
	font-style: inherit;
	outline: 0;
	padding: 0;
	margin: 0;
	border: 0;
}

body {
	font-size: 12px;
	font-family: Verdana;
}

a:link {
	text-decoration: none;
	outline: none;
}

a:visited {
	text-decoration: none;
	outline: none;
}

a:hover {
	text-decoration: none;
	outline: none;
}

a:active {
	text-decoration: none;
	outline: none;
}

.divTop {
	border-bottom: 1px solid #7E9DCC;
}

.divTop:after {
	clear: both;
	display: block;
	content: ".";
	height: 0;
	visibility: hidden;
}

.ulNav {
	padding-left: 50px;
	padding-top: 10px;
}

.liNav,.liNav_c {
	list-style: none;
	display: block;
	float: left;
	height: 2em;
	padding: 0px 1em;
	line-height: 2em;
	font-size: 18px;
}

.liNav a {
	color: #000;
}

.liNav_c {
	background-color: #7E9DCC;
	font-weight: bold;
}

.liNav_c a {
	color: #FFF;
}

.divBottom {
	border-top: 1px solid #7E9DCC;
	padding: 10px;
	text-align: center;
	clear: both;
}

.divOption {
	border-bottom: 1px solid #7E9DCC;
	padding: 10px;
}

.divOption {
	text-align: right;
}

.tblList {
	width: 1005px;
	margin: auto;
}

.tblList .title {
	background: #F3F9FF;
}

.tblList td,.tblList th {
	border: 1px solid #D9E6F0;
	padding: 5px;
}

.tblList tbody th {
	background: #F3F9FF;
	width: 75px;
}

.tblList .ct {
	text-align: center;
}

.tblList .rt {
	text-align: right;
}

.tblList tbody tr:nth-child(odd) td {
	background-color: #EEE;
}

.tblList tbody tr:hover td {
	background-color: #F3F9FF;
}
</style>
</head>
<body>
	<div class="divTop" id="divTop">
		<ul class="ulNav">
			<li class="liNav_c"><a href="/">List</a></li>
		</ul>
	</div>
	<div class="divOption">List</div>
	<table class="tblList">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>首页</th>
				<th>管理后台</th>
			</tr>
		</thead>
		<tbody>
    <?php foreach($aClouds as $iIndex => $aCloud){ ?>
        <tr>
				<th class="ct"><?php echo $iIndex + 1; ?></th>
				<td class="ct"><a href="<?php echo $aCloud['sWWWDomain']; ?>"><?php echo $aCloud['sCloudName']; ?></a></td>
				<td><a href="<?php echo $aCloud['sWWWDomain']; ?>"><?php echo $aCloud['sWWWDomain']; ?></a></td>
				<td><a href="<?php echo $aCloud['sManageDomain']; ?>"><?php echo $aCloud['sManageDomain']; ?></a></td>
			</tr>
    <?php } ?>
    </tbody>
	</table>
	<div class="divBottom">CopyRight @ anhouse.com.cn <?php echo date('Y-m-d H:i:s'); ?></div>
</body>
</html>
