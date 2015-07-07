<?php
require_once __DIR__.'/Environment.php';

class EnvQa extends Environment
{
    const ROOT = '/data1/www/paf';
    private $cloudName;

    protected function parse()
    {
        if ( PHP_SAPI == 'cli' ) {
            $this->parseCliArgs();
        } else {
            $this->parseServerHost();
        }
    }

    protected function parseCliArgs()
    {
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

    protected function parseServerHost()
    {
        if ( isset($_SERVER['HTTP_HOST']) ) {
            $res = preg_match("/^(.+)\.(.+?)\.qa\.ipo\.com(\:\d+)?$/i",
                $_SERVER['HTTP_HOST'], $match);
            if ( $res ) {
                $this->businessName = $match[1];
                $this->cloudName = $match[2];
            }
        }

        if ( empty($this->cloudName) || empty($this->businessName) ) {
            $this->showCloudPage();
            exit;
        }
    }

    private function showCloudPage(){
        $cloudPath = $this->getCloudPath();

        $content = "";
        $dh = opendir($cloudPath);
        while ( ($file = readdir($dh)) !== false ) {
            switch ( $file ) {
                case ".":
                case "..":
                    continue;
                default:
                    $url = "http://www.{$file}.dev.anhouse.com.cn";
                    $content .= "<tr><td><a href='{$url}'>{$file}</a></td></tr>";
            }
        }
        $table = "<table>{$content}</table>";
        $html = "<html><head></head><body>{$table}</body></html>";
        echo $html;
        exit;
    }

    protected function checkCloudName(){
        if ( !file_exists($this->getCloudPath().'/'.$this->cloudName) ) {
            $this->showCloudPage();
            exit;
        }
    }

    protected function checkPaths()
    {
        $this->checkCloudName();
        parent::checkPaths();
    }

    private function getCloudPath(){
        $path = self::ROOT.'/cloud';
        return $path;
    }

    public function getSystemPath(){
        $systemVersion = $this->getSystemVersion();
        return self::ROOT.'/vendor/laravel/v'.$systemVersion;
    }

    public function getAppPath(){
        $path = $this->getCloudPath() . '/' .
            $this->cloudName . '/' .
            $this->businessName.'/app';
        return $path;
    }

    public function toString(){
        return 'qa';
    }

    public function getCloudName(){
        return $this->cloudName;
    }

    public function getEnvConfigPath()
    {
        return self::ROOT . "/config/" . $this->toString() . "/" . $this->getBusinessName();
    }

    public function getStoragePath()
    {
        return "/tmp/{$this->businessName}";
    }
}
