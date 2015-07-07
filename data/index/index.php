<?php
/**
 * 生产环境的入口文件。
 */

date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', 'Off');

require __DIR__ . '/lib/version.php';

$sBaseDir = '/data1/www';
$sReleaseDir = $sBaseDir . '/release';

$aTmp = explode('.', $_SERVER['HTTP_HOST']);
$sChannel = $aTmp[0];

if ($sChannel == 'm') {
//    $sChannel = count($aTmp) == 3 ? 'www' : $aTmp[1];
    $sChannel = 'www';
}

$sVersionConfig = $sBaseDir . '/other/' . $sChannel . '.version.json';

$obj = Version::getInstance();
$obj->setConfigFile($sVersionConfig);
$aVersion = $obj->getCurrentVersion();

if (isset($aVersion['version'])) {
    $sVersion = $aVersion['version'];
}

if ($obj->checkBetaIP()) {
    $app = gethostname();
    header("debug: app={$app} version={$sVersion} type={$aVersion['type']}");
}

$sHomePageURL = 'http://www.pinganfang.com';

if ($sVersion) {
    $sReleasePath = $sReleaseDir . '/' . $sChannel . '/' . $sVersion;

    if (!is_dir($sReleasePath)) {
        echo '找不到该版本的代码：' . $sVersion . ' 版本类型：' . $aVersion['type'];
        $obj->clearCookie();
        die;
    }

    define('ENV_NAME', '');
    define('ROOT', $sReleasePath);
    define('VERSION', $sVersion);
    define('CFG_PATH', $sBaseDir . '/index/config');
    define('G_VERSION_TYPE', $aVersion['type']);

    $sIndexFile = __DIR__ . '/index/' . $sChannel . '.php';

    if (file_exists($sIndexFile)) {
        include $sIndexFile;
    } else {
        header('Location:' . $sHomePageURL, true, 302);
        die;
    }

} else {
    $obj->clearCookie();
    header('Location:' . $sHomePageURL, true, 302);
    die;
}

# end of this file
