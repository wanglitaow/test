<?php
// 对账系统-FS配置
$G_CONFIG['sftp']['account_check_remote_path'] = "/data1/www/other/accountcheck/"; //远程地址
$G_CONFIG['sftp']['account_check_location_path'] = "/data1/www/other/accountcheck/tmp/"; //本地地址
$G_CONFIG['sftp']['account_check'] = array(
"host" => "10.59.72.25",
"user" => "www",
"port" => "22",
"pubkey_path"  => "/data1/www/.ssh/id_rsa.pub",
"privkey_path" => "/data1/www/.ssh/id_rsa",
);
$G_CONFIG['sftp']['server'] = array(
    "host" => "10.59.72.28",
    "user" => "www",
    "port" => "22",
    "pubkey_path" => "/data1/www/.ssh/id_rsa.pub",
    "privkey_path" => "/data1/www/.ssh/id_rsa",
);
$G_CONFIG['sftp']['htf_account_check_remote_path']   = "/data1/www/other/accountcheck/htfact/"; 
$G_CONFIG['sftp']['htf_account_check'] = [
    "host"          => "10.59.72.28",
    "user"          => "www",
    "port"          => "22",
    "pubkey_path"  => "/data1/www/.ssh/id_rsa.pub",
    "privkey_path" => "/data1/www/.ssh/id_rsa",
];
