<?php
$G_CONFIG['common']['sZXDomain'] = 'news.pinganfang.com'; 
$G_CONFIG['common']['sUpdDomain'] = 'upd'.ENV_NAME.'.anhouse.com.cn';
$G_CONFIG['common']['sHFTDomain'] = 'hft'.ENV_NAME.'.anhouse.com.cn';
$G_CONFIG['common']['sPermissionDomain'] = 'permission'.ENV_NAME.'.anhouse.com.cn';
$G_CONFIG['common']['bMemberSecure'] = false;
$G_CONFIG['common']['sCookieBaseDomain'] = '.qa.anhouse.com.cn'; //线上配置,各业务可以独立配置
$G_CONFIG['common']['sBaseDomain'] = '.qa.anhouse.com.cn'; //线上配置 
$G_CONFIG['common']['sStaticDomain'] = 'http://static' . ENV_NAME . '.anhouse.com.cn'; //线上配置
$G_CONFIG['common']['sXFDomain'] = 'xf'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sESFDomain'] = 'esf'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sRentDomain'] = 'zf'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sFullDomain'] = 'www'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sManageDomain'] = 'manage'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sMemberDomain'] = 'member'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sPayCenterDomain'] = 'pay'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sOverSeasDomain'] = 'overseas'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sHaoFangBaoDomain'] = 'hfb'.ENV_NAME.'.anhouse.com.cn';; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sGoldDomain'] = 'gold'.ENV_NAME.'.anhouse.com.cn';; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sAgencyDomain'] = 'hkagent'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sHgjDomain'] = 'hgj'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sStewardDomain'] = 'steward'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sAPIDomain'] = 'api'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sEventHfjieDomain'] = '520'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sWWWDomain']='www'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sStewardDomain']='steward'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sYPZDomain'] = 'ypz'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sResourceDomain'] = 'resource'.ENV_NAME.'.anhouse.com.cn'; //消息查看地址
$G_CONFIG['common']['sTouchXFDomain'] = 'xf.m'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sTouchWWWDomain'] = 'm'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
$G_CONFIG['common']['sTouchESFDomain'] = 'esf.m'.ENV_NAME.'.anhouse.com.cn'; //二手房html5
$G_CONFIG['common']['sTouchZFDomain'] = 'zf.m'.ENV_NAME.'.anhouse.com.cn'; //租房html5
$G_CONFIG['common']['sTouchGoldDomain'] = 'gold.m'.ENV_NAME.'.anhouse.com.cn';
$G_CONFIG['common']['sTouchOverseasDomain'] = 'overseas.m'.ENV_NAME.'.anhouse.com.cn';
$G_CONFIG['common']['sBISDomain'] = 'bis'.ENV_NAME.'.anhouse.com.cn'; //BIS内部服务地址
$G_CONFIG['common']['sBISENV'] = 'test';
$G_CONFIG['common']['sEventDomain'] = 'event'.ENV_NAME.'.anhouse.com.cn';
$G_CONFIG['common']['sDownloadDomain'] = 'd.qa.anhouse.com.cn';
$G_CONFIG['common']['sCashoutCharset'] = 'UTF-8';
$G_CONFIG['common']['paycenter_url'] = [
'PAY_H5' => 'http://'.$G_CONFIG['common']['sPayCenterDomain'].'/order/h5create.html',
'PAY_WEB' =>'http://'.$G_CONFIG['common']['sPayCenterDomain'].'/order/create.html',
'REFUND' => 'http://'.$G_CONFIG['common']['sPayCenterDomain'].'/refund/create.html'];
$G_CONFIG['common']['sCrowdDomain'] = 'zc'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置 
$G_CONFIG['common']['sAgentDomain'] = 'agent'.ENV_NAME.'.anhouse.com.cn'; //线上配置,各业务必须独立配置
//好房对接BIS系统地址及证书密码配置
$G_CONFIG['common']['aBISHosts'] = [
    'host'      => 'https://222.68.184.181:8107',
    'keyfile'   => '/data1/www/other/bis/haofang_rcs_css_stg.pem',
    'password'  => '123456',
    'timeout'   => 30,
];
//好房对接科技Bis－》CMS，地址及对应SSL证书
$G_CONFIG['common']['aBISCMSHost'] = [
    'host'      => 'https://222.68.184.181:8107',
    'keyfile'   => '/data1/www/other/bis/haofang_cms_stg.pem',
    'password'  => 'bis123456',
    'timeout'   => 30,
];
/**
 * *金融最高收益率
 * */
$G_CONFIG['common']['finance_rate_setting'] = array(
	'IHfbMaxLaw' => '35', //好房宝收益律
	'iRaiseMaxAmount' => '51', //预计收
);
