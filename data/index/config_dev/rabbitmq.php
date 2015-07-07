<?php

//日志配置
$G_CONFIG['rabbitmq']['sms_producer'] = array(
    array(
        'host'      => '10.59.72.51',
        'port'      => 5672,
        'vhost'     => '/sms/',
        'login'     => 'admin',
        'password'  => 'admin',
        'persist'   => true,
        'exchange'  => 'sms',
        'exgtype'   => 'direct',
        'routing'   => 'send',
        'queue'     => 'sms-send',
        'durable'   => true,
        'autoack'   => true,
    )
);
$G_CONFIG['rabbitmq']['sms_consumer'] = array(
    array(
        'host'      => '10.59.72.51',
        'port'      => 5672,
        'vhost'     => '/sms/',
        'login'     => 'admin',
        'password'  => 'admin',
        'persist'   => true,
        'exchange'  => 'sms',
        'exgtype'   => 'direct',
        'routing'   => 'send',
        'queue'     => 'sms-send',
        'durable'   => true,
        'autoack'   => true,
    )
);
$G_CONFIG['rabbitmq']['logs_producer'] = array(
    array(
        'host'      => '10.59.72.51',
        'port'      => 5672,
        'vhost'     => '/logs/',
        'login'     => 'admin',
        'password'  => 'admin',
        'persist'   => true,
        'exchange'  => 'blackbox',
        'exgtype'   => 'fanout',
        'routing'   => '',
        'queue'     => '',
        'durable'   => false,
        'autoack'   => true,
    )
);
$G_CONFIG['rabbitmq']['logs_consumer'] = array(
    array(
        'host'      => '10.59.72.51',
        'port'      => 5672,
        'vhost'     => '/logs/',
        'login'     => 'admin',
        'password'  => 'admin',
        'persist'   => true,
        'exchange'  => 'blackbox',
        'exgtype'   => 'fanout',
        'routing'   => '',
        'queue'     => 'logs-lgc',
        'durable'   => false,
        'autoack'   => true,
    )
);
$G_CONFIG['rabbitmq']['message_producer'] = array(
        array(
                'host'      => '10.59.72.51',
                'port'      => 5672,
                'vhost'     => '/message/',
                'login'     => 'admin',
                'password'  => 'admin',
                'persist'   => true,
                'exchange'  => 'pushmsg',
                'exgtype'   => 'direct',
                'routing'   => 'message_push',
                'queue'     => 'message_push',
                'durable'   => false,
                'autoack'   => true,
        )
);
$G_CONFIG['rabbitmq']['message_consumer'] = array(
        array(
                'host'      => '10.59.72.51',
                'port'      => 5672,
                'vhost'     => '/message/',
                'login'     => 'admin',
                'password'  => 'admin',
                'persist'   => true,
                'exchange'  => 'pushmsg',
                'exgtype'   => 'direct',
                'routing'   => 'message_push',
                'queue'     => 'message_push',
                'durable'   => false,
                'autoack'   => true,
        )
);
$G_CONFIG['rabbitmq']['messagepush_producer'] = array(
        array(
                'host'      => '10.59.72.51',
                'port'      => 5672,
                'vhost'     => '/message/',
                'login'     => 'admin',
                'password'  => 'admin',
                'persist'   => false,
                'exchange'  => 'sendmsg',
                'exgtype'   => 'direct',
                'routing'   => 'do_pushing',
                'queue'     => 'do_pushing',
                'durable'   => false,
                'autoack'   => true,
        )
);
$G_CONFIG['rabbitmq']['messagepush_consumer'] = array(
        array(
                'host'      => '10.59.72.51',
                'port'      => 5672,
                'vhost'     => '/message/',
                'login'     => 'admin',
                'password'  => 'admin',
                'persist'   => false,
                'exchange'  => 'sendmsg',
                'exgtype'   => 'direct',
                'routing'   => 'do_pushing',
                'queue'     => 'do_pushing',
                'durable'   => false,
                'autoack'   => true,
        )
);
$G_CONFIG['rabbitmq']['dgc_producer'] = array(
        array(
                'host'      => '10.59.72.51',
                'port'      => 5672,
                'vhost'     => '/logs/',
                'login'     => 'admin',
                'password'  => 'admin',
                'persist'   => false,
                'exchange'  => 'blackbox',
                'exgtype'   => 'fanout',
                'routing'   => '',
                'queue'     => '',
                'durable'   => false,
                'autoack'   => true,
        )
);
$G_CONFIG['rabbitmq']['dgc_consumer'] = array(
        array(
                'host'      => '10.59.72.51',
                'port'      => 5672,
                'vhost'     => '/logs/',
                'login'     => 'admin',
                'password'  => 'admin',
                'persist'   => true,
                'exchange'  => 'blackbox',
                'exgtype'   => 'fanout',
                'routing'   => '',
                'queue'     => 'logs-dgc',
                'durable'   => false,
                'autoack'   => true,
        )
);
