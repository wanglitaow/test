<?php
require_once __DIR__ . '/EnvOutside.php';

/**
 * Class EnvAnhouse
 */
class EnvGa extends EnvOutside
{
    /**
     * @return void
     * @throws Exception
     */
    protected function parseServerHost()
    {
        if ( isset($_SERVER['HTTP_HOST']) ) {
			if ( preg_match("/^(.+)\.pinganfang\.com$/i",$_SERVER['HTTP_HOST'], $match) ) {
				$this->businessName = $match[1];
            } else if ( preg_match("/^(.+)\.s\.d\.pa\.com$/i",$_SERVER['HTTP_HOST'], $match) ) {
				$this->businessName = 'service-'.$match[1];
			} else if ( preg_match("/^(.+)\.d\.pa\.com$/i",$_SERVER['HTTP_HOST'], $match) ) {
				$this->businessName = $match[1];
			} else {
				throw new \Exception("Illegal server host.");
			}
        }
    }

    /**
     * @return string
     */
    public function toString(){
        return 'ga';
    }
}