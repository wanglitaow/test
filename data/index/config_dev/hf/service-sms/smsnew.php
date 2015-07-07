<?php
$G_CONFIG['smsnew']['YM3in1'] = array( 
    'sGateWay' => 'http://sdk999ws.eucp.b2m.cn:8080/sdk/SDKService',
    'sSN' => '9SDK-EMY-0999-JBTSL-dev',
    'bNeedSignature' => true,
    'sPassword' => '859502' 
); 
$G_CONFIG['smsnew']['YMads'] = array(
    'sGateWay' => 'http://sdk4report.eucp.b2m.cn:8080/sdk/SDKService',
    'sSN' => '6SDK-EMY-6688-KDUQT-dev',
    'bNeedSignature' => true,
    'sPassword' => '881462'
);
$G_CONFIG['smsnew']['95511'] = array(
    'isOpen' => true,
    'sGateWay' => 'https://ifront.pingan.com.cn',
    'sSenderID' => 'V_GROUP_PSCP3_OTP_SSL_VPN_001-dev',
    'sTranCode' => '100969',
    'sSendUser' => 'V_GROUP_PSCP3_OTP_SSL_VPN_001',
    'sSendSeriesID' => 'Pa029_s000000005',
    'sTemplateID' => 'JK140618001',
    'isDebug' => 1,
    'sPemPath' => '/data1/www/other/95511/HAOFANG_BIS_PRD.pem',
    'bNeedSignature' => false,
); 
$G_CONFIG['smsnew']['95511new'] = array(
    'isOpen' => true,
    'sTokenUrl' => '172.16.40.181',
    'sOpenUrl' => '172.16.40.182',
    'sSenderID' => 'V_GROUP_PSCP3_PAHF_SMS_001',
    'sClientId' => 'P_HF_SMS',
    'sSendUser' => 'V_GROUP_PSCP3_PAHF_SMS_001',
    'sSendSeriesID' => 'Pa029_s000000005',
    'sGrantType' => 'client_credentials',
    'sClientSecret' => '18cybtR8',
    'bNeedSignature' => false,
    'isDebug' => 1,
); 
$G_CONFIG['smsnew']['mongate'] = array(
    'sGateWay' => 'http://61.145.229.29:7791/MWGate/wmgw.asmx',
    'sUserName' => 'H10308-dev',
    'sPassword' => '986579',
    'bNeedSignature' => false,
);
$G_CONFIG['smsnew']['mongateADS'] = array(
    'sGateWay' => 'http://61.145.229.28:7902/MWGate/wmgw.asmx',
    'sUserName' => 'js0203-dev',
    'sPassword' => '966962',
    'bNeedSignature' => false,
);
// 控制短信通道的映射关系,用于把异常通道的短信转向别的通道发送
$G_CONFIG['smsnew']['ChannelMap'] = array();
