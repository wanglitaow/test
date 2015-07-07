<?php
/**
 * QA环境数据库配置
 * User: 洪明伟
 * Date: 2015/3/17
 * Time: 17:29
 */

return [

    'fetch' => PDO::FETCH_CLASS,

    'default' => 'user_db',

    'connections' => [
        'user_db' => [
            'driver'    => 'mysql',
            'host'      => '10.59.72.31:3306',
            'database'  => 'user_db',
            'username'  => 'user',
            'password'  => 'user',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'common_db' => [
            'driver'    => 'mysql',
            'host'      => '10.59.72.31:3306',
            'database'  => 'common_db',
            'username'  => 'common',
            'password'  => 'common',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
        'mongodb' => [
            'driver'   => 'mongodb',
            'host'     => '10.59.72.41',
            'port'     => 27017,
            'username' => '',
            'password' => '',
            'database' => 'logs'
        ],
    ],
	'redis' => array(
        'cluster' => false,
        'default' => array(
            'host'     => '10.59.72.31',
            'port'     => 6379,
            'database' => 0,
        ),
    ),

];
