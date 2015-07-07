<?php
date_default_timezone_set('Asia/Shanghai');
ini_set('display_errors', 'Off');

require __DIR__ . '/lib/version.php';

$sBasdDir = '/data1/www';
$sReleaseDir = $sBasdDir . '/release';

$aArg = [];

if ($_SERVER['argc'] > 2) {
    for ($i = 2; $i < $_SERVER['argc']; ++$i) {
        if (isset($_SERVER['argv'][$i]) and isset($_SERVER['argv'][$i + 1])) {
            if ('-' == substr($_SERVER['argv'][$i], 0, 1)) {
                $aArg[strtoupper(substr($_SERVER['argv'][$i], 1))] = $_SERVER['argv'][++$i];
            }
        }
    }
}
$sChannel = isset($aArg['CHANNEL']) ? $aArg['CHANNEL'] : '';

$sVerInfoPath = $sBasdDir . '/other/' . $sChannel . '.version.json';

if (file_exists($sVerInfoPath)) {
    $oVersion = Version::getInstance();
    $oVersion->setConfigFile($sVerInfoPath);
    $sVersion = $oVersion->getGAVersion();
    $sReleasePath = $sReleaseDir . '/' . $sChannel . '/' . $sVersion;

    if (is_dir($sReleasePath)) {
        define('G_VERSION_TYPE', 'ga');
        define('ENV_NAME', '');
        define('ROOT', $sReleasePath);
        define('VERSION', $sVersion);
        define('CFG_PATH', $sBasdDir . '/index/config');
        define('CHANNEL', $sChannel);
        define('CLOUDNAME', 'release');

        include '/data1/www/index/launcher/' . $sChannel . '.php';
    } else {
        echo 'No Version Files.';
    }
} else {
    echo 'No Version Info.';
}

# end of this file
