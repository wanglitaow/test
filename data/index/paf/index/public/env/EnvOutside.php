<?php
/**
 * 多有对外环境抽象
 * Created by PhpStorm.
 * User: liaojunling
 * Date: 15-1-31
 * Time: 下午1:58
 */
require_once __DIR__ . '/Environment.php';

/**
 * Class EnvOutside
 */
abstract class EnvOutside extends Environment
{
    /**
     * 环境路径
     *
     * @var string
     */
    const VENDOR_BASE_PATH = "/data1/www/paf_release/paf-vendor";
    const APP_BASE_PATH = "/data1/www/paf_release/";
    const CONFIG_BASE_PATH = "/data1/www/index/paf/config";
	const TMP_FILE_PATH = '/data1/www/other/tmp';

    /**
     * 环境分支名
     *
     * @var string
     */
    const ENV_STATUS_GA = "ga";
    const ENV_STATUS_BETA = "beta";

    /**
     * 用来区分分支的cookie名称
     *
     * @val string
     */
    const COOKIE_NAME = "pafversion";

    /**
     * @var string
     */
    protected $envBranchName;

    /**
     * @var string
     */
    protected $appVersion;

    /**
     * 内部IP列表
     * @var array
     */
    static $_internalIP = array(
        '101.95.96.102',
        '127.0.0.1',
    );

    /**
     * 解析域名，获得业务id
     * @return void
     */
    abstract protected function parseServerHost();

    /**
     * @return void
     */
    protected function parse()
    {
        if ( PHP_SAPI == 'cli' ) {
            $this->parseCliArgs();
        } else {
            $this->parseServerHost();
            $envBranchName = $this->_getEnvBranchName();
            $this->appVersion = $this->_getAppVersion($envBranchName);
            $this->envBranchName = $envBranchName;
        }
    }

    public function exportPaths()
    {
        define("PAF_VERSION", $this->getAppVersion());
        define("PAF_ENV_BRANCH", $this->getEnvBranchName());//是beta还是ga
        define("PAF_ENV_BRANCH_COOKIE", $this->getEnvBranchCookie(PAF_ENV_BRANCH));
        parent::exportPaths();
    }

    /**
     * @return void
     */
    private function parseCliArgs(){
        global $argv;

        if(count($argv)>=3 && $argv[0] == 'artisan'){
            $this->cloudName = $argv[1];
            $this->businessName = $argv[2];
            unset($argv[1]);
            unset($argv[2]);
            $argvs = $argv;
            $argv = [];
            foreach ($argvs as $v) {
                $argv[] = $v;
            }
            $_SERVER['argv'] = $argv;
        }else{
            exit('无法定位路径');
        }
    }

    /**
     * @param $env string
     * @return string
     */
    public function getEnvBranchCookie($env)
    {
        $val = array(
            "type" => $env,
        );
        return static::COOKIE_NAME."=".urlencode($this->encrypt(json_encode($val)));
    }

    /**
     * 用于cookie加密
     * @param $sStr
     * @return string
     */
    public function encrypt($sStr)
    {
        $r = "";
        $hexes = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f");

        for ($i = 0; $i < strlen($sStr); $i++) {
            $r .= ($hexes [(ord($sStr{$i}) >> 4)] . $hexes [(ord($sStr{$i}) & 0xf)]);
        }

        return $r;
    }

    /**
     * 解密
     * @param $sStr
     * @return string
     */
    public function decrypt($sStr)
    {
        $r = "";

        for ($i = 0; $i < strlen($sStr); $i += 2) {
            $x1 = ord($sStr{$i});
            $x1 = ($x1 >= 48 && $x1 < 58) ? $x1 - 48 : $x1 - 97 + 10;
            $x2 = ord($sStr{$i + 1});
            $x2 = ($x2 >= 48 && $x2 < 58) ? $x2 - 48 : $x2 - 97 + 10;
            $r .= chr((($x1 << 4) & 0xf0) | ($x2 & 0x0f));
        }

        return $r;
    }

    /**
     * 初始环境分支名
     * @return string
     */
    protected function _getEnvBranchName()
    {
        if ( isset($_COOKIE[static::COOKIE_NAME]) ) {
            $value = $this->decrypt($_COOKIE[static::COOKIE_NAME]);
            $ret = json_decode($value, true);
            if ( isset($ret["type"]) && $ret["type"] != static::ENV_STATUS_GA  ) {
                return static::ENV_STATUS_BETA;
            }
        } else {
            return $this->isInternal() ? static::ENV_STATUS_BETA : static::ENV_STATUS_GA;
        }

        return static::ENV_STATUS_GA;
    }

    protected function isInternal()
    {
        $clientIP = $this->getClientIP();
        if ( in_array($clientIP, static::$_internalIP) ) {
            return true;
        }

        if (preg_match('/^(192.168)/', $clientIP) > 0 or preg_match('/^(10.10.100)/', $clientIP) > 0 or preg_match('/^(172.)/', $clientIP) > 0) {
            return true;
        }

        return false;
    }

    protected function getClientIP()
    {
        $sIP = '';

        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $sIP = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aIPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $sIP = array_shift($aIPs);
        } else {
            $sIP = $_SERVER['REMOTE_ADDR'];
        }
        return $sIP;
    }

    /**
     * 初始化app版本
     * @param $envBranchName
     * @return mixed
     * @throws Exception
     */
    protected function _getAppVersion($envBranchName)
    {
        $appVersionFile = EnvLoader::getJsonPath() . "/appversion/".$this->businessName.".json";
        if ( !file_exists($appVersionFile) ) {
            throw new \Exception("Illegal app version file.");
        }

        $cfg = json_decode(file_get_contents($appVersionFile), true);
        if ( !isset($cfg[$envBranchName]) ) {
            throw new \Exception("Invalid app version content.");
        }
        return $cfg[$envBranchName];
    }

    /**
     * @return string
     */
    public function getAppVersion()
    {
        return $this->appVersion;
    }

    /**
     * @return string
     */
    public function getEnvBranchName()
    {
        return $this->envBranchName;
    }

    /**
     * @return string
     */
    public function getSystemPath(){
        $systemVersion = $this->getSystemVersion();
        return static::VENDOR_BASE_PATH . "/laravel/v".$systemVersion;
    }

    /**
     * @return string
     */
    public function getAppPath(){
        return static::APP_BASE_PATH .
                "/".$this->businessName.
                "/".$this->appVersion.
                "/app";
    }

    /**
     * @return string
     */
    public function getEnvConfigPath()
    {
        return static::CONFIG_BASE_PATH . "/" . $this->toString() . "/" . $this->businessName;
    }

    /**
     * @return string
     */
    public function getStoragePath()
    {
        return self::TMP_FILE_PATH.'/'.$this->businessName;
    }
}