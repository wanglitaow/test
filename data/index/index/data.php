<?php
define('COMMON_PATH', ROOT . '/system/common');
define('SYS_PATH', ROOT . '/system/kernel');
define('COMMON_CFG_PATH', ROOT . '/system/common/config');
define('SYS_CFG_PATH', ROOT . '/system/kernel/config');
define('RENDER_PATH', ROOT . '/app-hf-data');

define('APP_NAME', 'app-hf-data');
define('APP_PATH', ROOT . '/app-hf-data');
define('APP_CFG_PATH', ROOT . '/app-hf-data/config');
define('CST_CFG_PATH', CFG_PATH . '/hf/data');


$G_LOAD_PATH = array( 
		APP_PATH,
		COMMON_PATH,
		SYS_PATH 
);
$G_CONFIG_PATH = array( 
		SYS_CFG_PATH,
		COMMON_CFG_PATH,
		APP_CFG_PATH,
		CST_CFG_PATH 
);

include_once (SYS_PATH . '/bin.php');

main();
