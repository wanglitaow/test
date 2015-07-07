<?php
/**
 * 通用配置
 * Created by PhpStorm.
 * User: 王立涛
 * Date: 15-04-10
 * Time: 上午11:38
 */

return array(

    //允许多点登录的手机白名单列表
    'multi_login_mobile' => array(
        '18616201181',
    ),

    // 保险配置
    "baoxian" => array(
         'client_id' => 'V_PA008_EGIS_ABBS' ,
        'client_secret' => 'E89g3HRE' ,
        'grant_type' => 'client_credentials' ,
        'agencyNo' => 'SHAA-00001' ,
        'productNo' => 'P1122S24' ,
        'period'    =>'60d',
        'url' => 'https://test-api.pingan.com.cn:20443',
    ),

    //微信配置
    "weixin" => array(
        "appid" => "wxf5b1859ade279666",
        "appsecret" => "e7d9a98d5a00e3f1ae4028558519acb2",
        "cookie_name"=>'weixin_openid',
    ),

    //地推活动配置
    "promotion" => array(
        array("prize" => "平安伞", "per" => 2),
        array("prize" => "环保袋", "per" => 3),
        array("prize" => "纸巾", "per" => 20),
        array("prize" => "饮料", "per" => 10),
        array("prize" => "多肉植物", "per" => 0),
        array("prize" => "平安扑克", "per" => 65)
    ),

    //一账通配置
    "yzt" => array(
        'iTimeout'       => 30,
        'iRetry'         => 0,
        'sHeaderSignKey' => 'sdk-bis-sign',
        'sHeaderTSKey'   => 'sdk-bis-ts',
        'sEncryptKey'    => 'X!bis1@20don',

        //陆金所分配给好房的渠道ID和授信类型
        'sLufaxChannel'  => 'xxx',
        'sLufaxCredit'   => 'xxx',

        //一账通联合登录和登出地址
        'sTOALoginURL'   => 'https://test-member.pingan.com.cn/pinganone/pa/login.view',
        'sTOALogoutURL'  => 'https://test-member.pingan.com.cn/pinganone/pa/fcmmLogOut.do',
        'sH5TOALoginURL' => 'https://test-member.pingan.com.cn/pinganone/pa/mergeLogin.view',
        'sTOARegisterURL'=> 'https://test-member.pingan.com.cn/pinganone/pa/mergeRegisterEntry.view',
       
        //一账通分配给好房的APPID
        'sTOAAppID'      => '10072',
        'sTOAMobileAppID'=> '10133',

        //一账通签名方式
        'sTOASignType'   => 'MD5',
        //一账通签名加密公钥
        'sTOAPublicKey'  => 'D3E93B518D094B04AE38A09F066A9352',
        //一账通回传数据的3DES解密公钥
        's3DESPublicKey' => 'ABEFB1FC56774AECAEB4AD0F6105FEAE',
        //回传给账户中心的加解密公钥
        'sMemberKey'     => '5B51452E94336CB9E799EBD6AC58218E',
        //一账通临时缓存key
        'sCachePrefix'   => 'hf:bis:yzt:cache:',


        //用户体系 任意门 分配给好房的APPName
        'AppName'        => 'PA02800000000_01_PAHF',
    ),

    //微信联合登录
    'unionlogin'=>array(
        'clientID'=>'wxcf37eb262cae901c',
        'clientSecret'=>'d6f211fad0d8cfb83f1e06fea7d08e0d',
    ),

    // 注册紧急抗压开关。
    // 默认是false，如果设置为true，则注册不需要验证码。
    "sos"=>array(
        "switch" => false,
    ),

    //是否显示联合登录地址
    'bUnionShow' => true,

);
