<?php
define('COMMON_PATH', ROOT . '/system/common');
define('SYS_PATH', ROOT . '/system/kernel');
define('COMMON_CFG_PATH', ROOT . '/system/common/config');
define('SYS_CFG_PATH', ROOT . '/system/kernel/config');

define('APP_NAME', 'app-file-view');
define('APP_PATH', ROOT . '/app-file-view');
define('APP_CFG_PATH', ROOT . '/app-file-view/config');
define('CST_CFG_PATH', CFG_PATH . '/file/view');

define('APP_BASE_PATH', ROOT . '/app-file-base');
define('APP_BASE_CFG_PATH', ROOT . '/app-file-base/config');
define('APP_SERVICE_PATH', ROOT . '/app-service');
define('APP_SERVICE_CFG_PATH', ROOT . '/app-service/config');

$G_LOAD_PATH = array( 
        APP_PATH,
        APP_BASE_PATH,
        APP_SERVICE_PATH,
        COMMON_PATH,
        SYS_PATH 
);
$G_CONFIG_PATH = array( 
        SYS_CFG_PATH,
        COMMON_CFG_PATH,
        APP_SERVICE_CFG_PATH,
        APP_BASE_CFG_PATH,
        APP_CFG_PATH,
        CST_CFG_PATH 
);

include_once (SYS_PATH . '/bin.php');

main();
