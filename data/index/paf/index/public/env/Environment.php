<?php
require_once "EnvInterface.php";
use SebastianBergmann\Exporter\Exception;

abstract class Environment implements EnvInterface
{
    protected $systemVersion;
    protected $businessName;

    abstract protected function parse();

    protected function onBusinessNameNotFound()
    {
        throw new \Exception("Illegal business name.");
    }

    final protected function getSystemVersionFilePath(){
        return EnvLoader::getJsonPath()."/vendorversion/{$this->businessName}.json";
    }

    /**
     * @return void
     */
    public function initEnvironment()
    {
        $this->parse();
        $business = $this->getBusinessName();
        if ( !$business ) {
            $this->onBusinessNameNotFound();
            exit;
        }

        $this->initSystemVersion();
        $this->checkPaths();
    }

    public function exportPaths()
    {
        define("PAF_SYS_PATH", $this->getSystemPath());
        define("PAF_APP_PATH", $this->getAppPath());
        define("PAF_ENV_NAME", $this->toString());
        define("PAF_STORAGE_PATH", $this->getStoragePath());
        define("PAF_ENV_CONFIG_PAHT", $this->getEnvConfigPath());
        define("PAF_ENV_CONFIG_PATH", $this->getEnvConfigPath());
    }

    /**
     * @return void
     * @throws \Exception
     */
    final protected function initSystemVersion(){
        $versionFilePath = $this->getSystemVersionFilePath();
        if ( empty($versionFilePath) || !file_exists($versionFilePath) ) {
            throw new \Exception("System version file is not found.");
        }

        $json = file_get_contents($versionFilePath);
        $config = $json ? json_decode($json, true) : array();

        if ( empty($config) || !isset($config["version"]) ) {
            throw new \Exception("llegal system version file.");
        }

        $this->systemVersion = $config["version"];
    }

    /**
     * @return void
     */
    protected function checkPaths() {

        $this->checkSystemPath();
        $this->checkAppPath();
        $this->checkEnvConfigPath();
        $this->initStoragePath();
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function checkSystemPath()
    {
        if ( !file_exists($this->getSystemPath()) ) {
            throw new \Exception("System path is not found.");
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function checkAppPath()
    {
        if ( !file_exists($this->getAppPath()) ) {
            throw new \Exception("App path is not found.");
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function checkEnvConfigPath()
    {
        if ( !file_exists($this->getEnvConfigPath()) ) {
            throw new \Exception("Env config path is not found.");
        }
    }

    /**
     * 初始化storage相关文件
     * @return void
     */
    protected function initStoragePath()
    {
        $storagePath = $this->getStoragePath();
        $storageCachePath = $storagePath . "/cache";
        is_dir($storageCachePath) || mkdir($storageCachePath, 0777, true);

        $storageLogsPath = $storagePath . "/logs";
        is_dir($storageLogsPath) || mkdir($storageLogsPath, 0777, true);

        $storageMetaPath = $storagePath . "/meta";
        is_dir($storageMetaPath) || mkdir($storageMetaPath, 0777, true);

        $storageSessionsPath = $storagePath . "/sessions";
        is_dir($storageSessionsPath) || mkdir($storageSessionsPath, 0777, true);

        $storageViewsPath = $storagePath . "/views";
        is_dir($storageViewsPath) || mkdir($storageViewsPath, 0777, true);
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getSystemVersion(){
        return $this->systemVersion;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getSystemPath()
    {
        throw new \Exception("Illegal system path.");
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getAppPath()
    {
        throw new \Exception("Illegal app path.");
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getEnvConfigPath()
    {
        throw new \Exception("Illegal env config path.");
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getBusinessName(){
        return $this->businessName;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getStoragePath()
    {
        throw new \Exception("Illegal storage path.");
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getPublicViewPath()
    {
        throw new \Exception("Illegal public view path.");
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function toString()
    {
        throw new \Exception("Illegal environment name.");
    }
}