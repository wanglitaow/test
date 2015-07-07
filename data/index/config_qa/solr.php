<?php
$G_CONFIG['solr']['xf_master'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8984,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);
$G_CONFIG['solr']['xf_slave'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8984,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);
$G_CONFIG['solr']['suggest_master'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8985,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);
$G_CONFIG['solr']['suggest_slave'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8985,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);
$G_CONFIG['solr']['match_master'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8986,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);
$G_CONFIG['solr']['match_slave'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8986,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);

/**
 * 租房房源列表solr
 * @author jiangshengjun
*/
$G_CONFIG['solr']['rent_master'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8987,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);

$G_CONFIG['solr']['rent_slave'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8987,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);

/**
 * 小区solr
 * @author jiangshengjun
*/
$G_CONFIG['solr']['community_master'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8988,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);

$G_CONFIG['solr']['community_slave'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8988,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);

/**
 * 二手房solr
 * @author jiangshengjun
*/
$G_CONFIG['solr']['secondhand_master'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8989,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);
$G_CONFIG['solr']['secondhand_slave'] = array( 
		'endpoint' => array( 
				'localhost' => array( 
						'host' => '10.59.72.52',
						'port' => 8989,
						'core' => 'collection1',
						'path' => '/solr/' 
				) 
		) 
);
$G_CONFIG['solr']['ask_master'] = array(
    'endpoint' => array(
        'localhost' => array(
            'host' => '10.59.72.52',
            'port' => 8982,
            'core' => 'collection1',
            'path' => '/solr/',
        )
    )
);
$G_CONFIG['solr']['ask_slave'] = array(
    'endpoint' => array(
        'localhost' => array(
            'host' => '10.59.72.52',
            'port' => 8982,
            'core' => 'collection1',
            'path' => '/solr/',
        )
    )
);
