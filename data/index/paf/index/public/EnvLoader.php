<?php
require "env/Environment.php";
class EnvLoader
{
    /**
     * paf env加载顺序
     * @var array
     */
    static $jsonCfg = array(
        "/data1/www/other/paf/",
        '../../json/',
        "/etc/paf/",
    );

    /**
     * @var string
     */
    static $jsonPath;

    /**
     * @var Environment
     */
    public $env;

    public function __construct()
    {
        $env = ucfirst(strtolower($this->getEnvName()));
        $envFile = __DIR__.'/env/Env'.$env.'.php';
        $envClass = 'Env'.$env;
        if ( empty($env) || !file_exists($envFile) ) {
            throw new \Exception("Invalid vironment: " . $env);
        }

        require $envFile;
        $this->env = new $envClass();

        if ( !($this->env instanceof Environment)) {
            throw new \Exception("illegal env class type.");
        }
        $this->env->initEnvironment();
    }

    public function exportPaths()
    {
        $this->env->exportPaths();
    }

    /**
     * @return Environment
     * @throws Exception
     */
    public function getEnv() {
        return $this->env;
    }

    protected function getEnvName()
    {
        foreach ( self::$jsonCfg as $path ) {
            self::$jsonPath = $path;
            if ( file_exists($path) ) {
                $file = $path . "/env.json";
                $envJson = file_get_contents($file);
                $config = $envJson ? json_decode($envJson, true) : array();
                if ( isset($config['env']) ) {
                    return $config['env'];
                }
            }
        }
        throw new \Exception("illegal file env.json.");
    }

    public static function getJsonPath()
    {
        return static::$jsonPath;
    }
}
