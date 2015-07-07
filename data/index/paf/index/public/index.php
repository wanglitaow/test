<?php
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

require __DIR__.'/EnvLoader.php';

$envLoader = new EnvLoader();
$envLoader->exportPaths();

require PAF_SYS_PATH . "/vendor/autoload.php";
require PAF_APP_PATH . "/../public/index.php";