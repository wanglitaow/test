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
    public static $env;

    /**
     * @return Environment
     * @throws Exception
     */
    public static function getEnv() {
        if ( is_null(self::$env) ) {
            $env = ucfirst(strtolower(static::getEnvName()));
            $envFile = __DIR__.'/env/Env'.$env.'.php';
            $envClass = 'Env'.$env;
            if ( empty($env) || !file_exists($envFile) ) {
                throw new \Exception("Invalid vironment: " . $env);
            }
            
            require $envFile;
            self::$env = new $envClass();

            if ( !(self::$env instanceof Environment)) {
                throw new \Exception("illegal env class type.");
            }
            self::$env->initEnvironment();
        }
        return self::$env;
    }

    protected static function getEnvName()
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
        return self::$jsonPath;
    }
}
