<?php
define('COMMON_PATH', ROOT . '/system/common');
define('SYS_PATH', ROOT . '/system/kernel');
define('COMMON_CFG_PATH', ROOT . '/system/common/config');
define('SYS_CFG_PATH', ROOT . '/system/kernel/config');

define('APP_NAME', 'app-download');
define('APP_PATH', ROOT . '/app-download');
define('APP_CFG_PATH', ROOT . '/app-download/config');
define('CST_CFG_PATH', CFG_PATH . '/download');

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
