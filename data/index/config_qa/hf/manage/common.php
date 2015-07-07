<?php
include CFG_PATH . '/common.php';

$G_CONFIG['common']['sFullDomain'] = 'manage'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sCDNDomain'] = 'http://resmanage'.ENV_NAME .'.anhouse.com.cn'; //线上配置,各业务可以独立配置
$G_CONFIG['common']['sPermissionDomain'] = 'permission'.ENV_NAME.'.anhouse.com.cn'; //权限校验地址
$G_CONFIG['common']['sAppDownloadDomain'] = 'download.'.ENV_CLOUDNAME.'.s.'.IPO_ENV.'.anhouse.com.cn';
$G_CONFIG['common']['sAppDownloadKey'] = 'GDQvMDQdpOj8oQgAJE6JTWl2frpOqSGN';
