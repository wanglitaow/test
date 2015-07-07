<?php
require_once __DIR__.'/EnvOutside.php';

/**
 * Class EnvAnhouse
 */
class EnvAnhouse extends EnvOutside
{
    /**
     * @return void
     * @throws Exception
     */
    protected function parseServerHost()
    {
        if ( isset($_SERVER['HTTP_HOST']) ) {
            $res = preg_match("/^(.+)\.anhouse\.com$/i",
                $_SERVER['HTTP_HOST'], $match);
            if ( !$res ) {
                throw new \Exception("Illegal server host.");
            }
            $this->businessName = $match[1];
        }
    }

    /**
     * @return string
     */
    public function toString(){
        return 'anhouse';
    }
}
