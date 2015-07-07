<?php
$aMasterCfg = array( 
		'sUsername' => 'queue',
		'sUserpwd' => 'queue',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
);
$aSlaveCfg = array( 
		'sUsername' => 'queue',
		'sUserpwd' => 'queue',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
);
for($i = 0; $i < 10; ++$i){
	$G_CONFIG['database']['queue_master_' . $i] = $aMasterCfg;
	$G_CONFIG['database']['queue_slave_' . $i] = $aSlaveCfg;
	$G_CONFIG['database']['queue_master_' . $i]['sDSN'] = $G_CONFIG['database']['queue_slave_' . $i]['sDSN'] = 'mysql:host=10.59.72.31;port=3306;dbname=queue_db_' . $i;
} // 线上配置
$G_CONFIG['database']['log_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=log_db;port=3306;',
		'sUsername' => 'log',
		'sUserpwd' => 'log',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['log_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=log_db;port=3306;',
		'sUsername' => 'log',
		'sUserpwd' => 'log',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['service_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=service_db;port=3306;',
		'sUsername' => 'service',
		'sUserpwd' => 'service',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['service_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=service_db;port=3306;',
		'sUsername' => 'service',
		'sUserpwd' => 'service',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['dfs_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=dfs_db;port=3306;',
		'sUsername' => 'dfs',
		'sUserpwd' => 'dfs',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['dfs_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=dfs_db;port=3306;',
		'sUsername' => 'dfs',
		'sUserpwd' => 'dfs',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['loupan_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=loupan_db;port=3306;',
		'sUsername' => 'loupan',
		'sUserpwd' => 'loupan',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['loupan_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=loupan_db;port=3306;',
		'sUsername' => 'loupan',
		'sUserpwd' => 'loupan',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['user_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=user_db;port=3306;',
		'sUsername' => 'user',
		'sUserpwd' => 'user',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['user_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=user_db;port=3306;',
		'sUsername' => 'user',
		'sUserpwd' => 'user',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['common_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=common_db;port=3306;',
		'sUsername' => 'common',
		'sUserpwd' => 'common',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['common_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=common_db;port=3306;',
		'sUsername' => 'common',
		'sUserpwd' => 'common',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['housing_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=housing_db;port=3306;',
		'sUsername' => 'housing',
		'sUserpwd' => 'housing',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['housing_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=housing_db;port=3306;',
		'sUsername' => 'housing',
		'sUserpwd' => 'housing',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['haoguanjia_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=haoguanjia_db;port=3306;',
		'sUsername' => 'haoguanjia',
		'sUserpwd' => 'haoguanjia',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['haoguanjia_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=haoguanjia_db;port=3306;',
		'sUsername' => 'haoguanjia',
		'sUserpwd' => 'haoguanjia',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['hfb_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=hfb_db;port=3306;',
		'sUsername' => 'hfb',
		'sUserpwd' => 'hfb',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['hfb_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=hfb_db;port=3306;',
		'sUsername' => 'hfb',
		'sUserpwd' => 'hfb',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['payment_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=payment_db;port=3306;',
		'sUsername' => 'payment',
		'sUserpwd' => 'payment',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['payment_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=payment_db;port=3306;',
		'sUsername' => 'payment',
		'sUserpwd' => 'payment',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['paycenter_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=paycenter_db;port=3306;',
		'sUsername' => 'paycenter',
		'sUserpwd' => 'paycenter',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['paycenter_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=paycenter_db;port=3306;',
		'sUsername' => 'paycenter',
		'sUserpwd' => 'paycenter',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['event_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=event_db;port=3306;',
		'sUsername' => 'event',
		'sUserpwd' => 'event',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['event_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=event_db;port=3306;',
		'sUsername' => 'event',
		'sUserpwd' => 'event',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['api_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=api_db;port=3306;',
		'sUsername' => 'api',
		'sUserpwd' => 'api',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['api_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=api_db;port=3306;',
		'sUsername' => 'api',
		'sUserpwd' => 'api',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['misc_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=databuilding_db;port=3306;',
		'sUsername' => 'misc',
		'sUserpwd' => 'misc',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['misc_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=databuilding_db;port=3306;',
		'sUsername' => 'misc',
		'sUserpwd' => 'misc',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['permission_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=permission_db;port=3306;',
		'sUsername' => 'permission',
		'sUserpwd' => 'permission',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['permission_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=permission_db;port=3306;',
		'sUsername' => 'permission',
		'sUserpwd' => 'permission',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); //线上配置
$G_CONFIG['database']['survey_master'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=survey_db;port=3306;',
		'sUsername' => 'survey',
		'sUserpwd' => 'survey',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
); // 线上配置
$G_CONFIG['database']['survey_slave'] = array( 
		'sDSN' => 'mysql:host=10.59.72.31;dbname=survey_db;port=3306;',
		'sUsername' => 'survey',
		'sUserpwd' => 'survey',
		'aInitsql' => array( 
				'SET CHARACTER SET utf8',
				'SET NAMES utf8' 
		) 
);
/*****************************海外房产 start***************************/ 
$G_CONFIG['database']['oversea_master'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=hw_db;port=3306;', 
    'sUsername' => 'hw', 
    'sUserpwd' => 'hw', 
    'aInitsql' => array( 
        'SET CHARACTER SET utf8', 
        'SET NAMES utf8' 
    ) 
);
$G_CONFIG['database']['oversea_slave'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=hw_db;port=3306;', 
    'sUsername' => 'hw', 
    'sUserpwd' => 'hw', 
    'aInitsql' => array( 
        'SET CHARACTER SET utf8', 
        'SET NAMES utf8' 
    ) 
);

// 问答DB
$G_CONFIG['database']['ask_master'] = array(
    'sDSN' => 'mysql:host=10.59.72.31;dbname=ask_db;port=3306',
    'sUsername' => 'ask',
    'sUserpwd' => 'ask',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);
$G_CONFIG['database']['ask_slave'] = array(
    'sDSN' => 'mysql:host=10.59.72.31;dbname=ask_db;port=3306',
    'sUsername' => 'ask',
    'sUserpwd' => 'ask',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);
$G_CONFIG['database']['zt_slave'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=zt_db;port=3306',
    'sUsername' => 'zt',
    'sUserpwd' => 'zt',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
); 

$G_CONFIG['database']['zt_master'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=zt_db;port=3306',
    'sUsername' => 'zt',
    'sUserpwd' => 'zt',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);

$G_CONFIG['database']['crm_slave'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=crm_db;port=3306',
    'sUsername' => 'crm',
    'sUserpwd' => 'crm',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
); 

$G_CONFIG['database']['crm_master'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=crm_db;port=3306',
    'sUsername' => 'crm',
    'sUserpwd' => 'crm',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);
$G_CONFIG['database']['crowd_slave'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=crowd_db;port=3306',
    'sUsername' => 'crowd',
    'sUserpwd' => 'crowd',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
); 

$G_CONFIG['database']['crowd_master'] = array( 
    'sDSN' => 'mysql:host=10.59.72.31;dbname=crowd_db;port=3306',
    'sUsername' => 'crowd',
    'sUserpwd' => 'crowd',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);

$G_CONFIG['database']['oa_master'] = array(
    'sDSN' => 'mysql:host=10.59.72.31;dbname=oa_db;port=3306',
    'sUsername' => 'oa',
    'sUserpwd' => 'oa',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);
$G_CONFIG['database']['oa_slave'] = array(
    'sDSN' => 'mysql:host=10.59.72.31;dbname=oa_db;port=3306',
    'sUsername' => 'oa',
    'sUserpwd' => 'oa',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);

$G_CONFIG['database']['finance_master'] = array(
    'sDSN' => 'mysql:host=10.59.72.31;dbname=finance_db;port=3306',
    'sUsername' => 'finance',
    'sUserpwd' => 'finance',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);
$G_CONFIG['database']['finance_slave'] = array(
    'sDSN' => 'mysql:host=10.59.72.31;dbname=finance_db;port=3306',
    'sUsername' => 'finance',
    'sUserpwd' => 'finance',
    'aInitsql' => array(
        'SET CHARACTER SET utf8',
        'SET NAMES utf8'
    )
);

