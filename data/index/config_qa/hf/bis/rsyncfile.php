<?php
/**
 * Created by PhpStorm.
 * User: wuxiaofei
 * Date: 14-11-14
 * Time: 10:55
 * desc: 同步寿险数据配置文件
 */

/**
 * @desc 来源服务器信息
 * @var array
 */
$G_CONFIG['rsyncfile']['resouce'] = array(
    'host' => '192.168.10.18',
    'user' => 'www',
//    'passwd' => 'www',
    'pubkey_file'  => '/data1/www/.ssh/id_rsa.pub',      //密钥
    'privkey_file' => '/data1/www/.ssh/id_rsaNOPASSWORD',    //密钥
    'filepath' => '/data1/www/hftdata/shouxian',    //来源服务器路径
    'file' => array(
        'AGENT_CHIEF_INFO','AGENT_INFO','DEPT_INFO','REGION_INFO'   //文件名
    )
);

/**
 * @desc 目标服务器信息
 * @var array
 */
$G_CONFIG['rsyncfile']['destination'] = array(
    'host' => '192.168.10.18',
    'user' => 'www',
//    'passwd' => 'www',
    'pubkey_file'  => '/data1/www/.ssh/id_rsa.pub',      //密钥
    'privkey_file' => '/data1/www/.ssh/id_rsaNOPASSWORD',    //密钥
    'filepath' => '/data1/www/hftdata/rsync'    //目标服务器路径
);

/**
 * @desc 本地临时存放目录
 */
$G_CONFIG['rsyncfile']['locaPath'] = '/wxftest/test/';  //（这里已经包含了php配置中的临时文件存放目录，比如：php配置临时文件存放路径为/tmp，则日志完整路径会变为/tmp/wxftest/test/）

/**
 * @desc 解压密码
 */
$G_CONFIG['rsyncfile']['passwd'] = '43686E6C4B746C3230313431313034';

/**
 * 日志文件路径
 */
$G_CONFIG['rsyncfile']['logfilepath'] = '/wxftest/log/';    //（这里已经包含了php配置中的临时文件存放目录，比如：php配置临时文件存放路径为/tmp，则日志完整路径会变为/tmp/wxftest/test/）
