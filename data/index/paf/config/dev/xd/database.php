<?php
/**
 * 外部域名配置
 * User: 洪明伟
 * Date: 2015/6/15
 * Time: 11:26
 */

return array(

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => array(
        'xiaodai_db' => array(
            'driver'    => 'mysql',
            'host'      => '10.59.72.31',
            'port'      => 3306,
            'database'  => 'xiaodai_db',
            'username'  => 'xiaodai',
            'password'  => 'xiaodai',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),
	),
    'redis' => array(
        'cluster' => false,
        'default' => array(
            'host'     => '10.59.72.31',
            'port'     => 6379,
            'database' => 0,
        ),
    ),
);
