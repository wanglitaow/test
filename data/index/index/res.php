<?php
define('SYS_PATH', ROOT . '/system/kernel');
define('SYS_CFG_PATH', ROOT . '/system/kernel/config');

define('APP_NAME', '');

$G_LOAD_PATH = array( 
		SYS_PATH 
);
$G_CONFIG_PATH = array( 
		SYS_CFG_PATH 
);

include_once (SYS_PATH . '/bin.php');

main();