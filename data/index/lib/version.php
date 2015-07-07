<?php
/**
 * 版本切换工具
 * @author liuxd
 */
class Version
{

    const VERSION_COOKIE_NAME = 'pafversion';
    const VERSION_COOKIE_EXPIRE = 3600;
    const VERSION_COOKIE_SALT = '';
    const VERSION_TYPE_GA = 'ga';
    const VERSION_TYPE_BETA = 'beta';
    const VERSION_TYPE_COOKIE = 'cookie';

    private static $sConfigFilePath = '';
    private static $obj = null;

    /**
     * Get an object of Version.
     * @return Version
     */
    public static function getInstance()
    {
        if (is_null(self::$obj)) {
            $class = __CLASS__;
            self::$obj = new $class;
        }

        return self::$obj;
    }

    /**
     * Set config file.
     * @param string $sConfigFilePath
     */
    public function setConfigFile($sConfigFilePath)
    {
        if (is_writable($sConfigFilePath)) {
            self::$sConfigFilePath = $sConfigFilePath;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get current version which you are facing.
     * @return string
     */
    public function getCurrentVersion()
    {
        $aCookie = $this->getCookieVersion();

        if ($aCookie) {
            switch ($aCookie['type']) {
                case self::VERSION_TYPE_COOKIE:
                    $sVersion = $aCookie['version'];
                    $sType = self::VERSION_TYPE_COOKIE;
                    break;
                case self::VERSION_TYPE_BETA:
                    $sVersion = $this->getBetaVersion();

                    if ($sVersion) {
                        $sType = self::VERSION_TYPE_BETA;
                    } else {
                        $sVersion = $this->getGAVersion();
                        $sType = self::VERSION_TYPE_GA;
                    }

                    break;
                case self::VERSION_TYPE_GA:
                    $sVersion = $this->getGAVersion();
                    $sType = self::VERSION_TYPE_GA;
                    break;
                default : break;
            }
        } else {
            $sBetaVersion = $this->getBetaVersion();

            if ($sBetaVersion) {
                $sVersion = $sBetaVersion;
                $sType = self::VERSION_TYPE_BETA;
            } else {
                $sVersion = $this->getGAVersion();
                $sType = self::VERSION_TYPE_GA;
            }
        }

        return ['version' => $sVersion, 'type' => $sType];
    }

    /**
     * Set cookie version.
     * @param string $sVersion
     * @param string $sType version type.Possible value: cookie, ga, beta
     * @return bool
     */
    public function setCookieVersion($sVersion, $sType)
    {
        $sDomain = $this->getCookieDomain();
        $sValue = $this->genCookieValue($sVersion, $sType);
        $iExpires = $_SERVER['REQUEST_TIME'] + self::VERSION_COOKIE_EXPIRE;
        return setcookie(self::VERSION_COOKIE_NAME, $sValue, $iExpires, '/', $sDomain);
    }

    /**
     * Generate cookie value.
     * @param string $sVersion
     * @param string $sType
     * @return string
     */
    public function genCookieValue($sVersion, $sType)
    {
        $aData = [
            'version' => $sVersion,
            'type' => $sType
        ];

        $sValue = $this->encrypt(json_encode($aData));
        return $sValue;
    }

    /**
     * Set beta version.
     * @param string $sVersion
     */
    public function setBetaVersion($sVersion)
    {
        $this->setConfig('Beta', $sVersion);
    }

    /**
     * Set GA version.
     * @param string $sVersion
     */
    public function setGAVersion($sVersion)
    {
        $this->setConfig('GA', $sVersion);
    }

    /**
     * Get cookie version.
     */
    public function getCookieVersion()
    {
        $aRet = [];

        if (isset($_COOKIE[self::VERSION_COOKIE_NAME])) {
            $sCookie = $_COOKIE[self::VERSION_COOKIE_NAME];
            $sValue = $this->decrypt($sCookie);
            $aRet = json_decode($sValue, true);
        }

        return $aRet;
    }

    /**
     * Get beta version.
     */
    public function getBetaVersion()
    {
        $sVersion = '';

        if ($this->checkBetaIP()) {
            $sVersion = $this->getConfig('Beta');
        }

        return $sVersion;
    }

    /**
     * Get GA version.
     */
    public function getGAVersion()
    {
        return $this->getConfig('GA');
    }

    /**
     * Set config information
     * @param string $sKey
     * @param string $sValue
     * @return bool
     */
    public function setConfig($sKey, $sValue)
    {
        $aConfig = $this->getAllConfig();
        $aConfig[$sKey] = $sValue;

        return file_put_contents(self::$sConfigFilePath, json_encode($aConfig));
    }

    /**
     * Get config information
     * @param string $sItemName
     * @return array
     */
    public function getConfig($sItemName)
    {
        $aConfig = $this->getAllConfig();

        return isset($aConfig[$sItemName]) ? $aConfig[$sItemName] : '';
    }

    /**
     * Get all config information
     * @return array
     */
    private function getAllConfig()
    {
        if (!file_exists(self::$sConfigFilePath)) {
            return [];
        }

        $sOrigin = file_get_contents(self::$sConfigFilePath);
        $aTmp = json_decode($sOrigin, true);
        return is_array($aTmp) ? $aTmp : [];
    }

    /**
     * Check beta IP list.
     * @return bool
     */
    public function checkBetaIP()
    {
        $IP = $this->getClientIP();
        $aWhiteList = [
            '101.95.96.102', // 浦电路外网IP
            '116.247.112.178',  //凯滨路外网IP1
            '116.247.112.179',  //凯滨路外网IP2
            '116.247.112.180',  //凯滨路外网IP3
        ];

        if (in_array($IP, $aWhiteList)) {
            return true;
        }

        $bResult = false;

        if (preg_match('/^(192.168)/', $IP) > 0 or preg_match('/^(10.10.100)/', $IP) > 0 or preg_match('/^(172.)/', $IP) > 0) {
            $bResult = true;
        }

        return $bResult;
    }

    /**
     * Clear version cookie
     */
    public function clearCookie()
    {
        $sDomain = $this->getCookieDomain();
        return setcookie(self::VERSION_COOKIE_NAME, '', time() - self::VERSION_COOKIE_EXPIRE, '/', $sDomain);
    }

    /**
     * Encrypt
     * @param string $sStr
     * @return string
     */
    private function encrypt($sStr)
    {
        $r = "";
        $hexes = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f");

        for ($i = 0; $i < strlen($sStr); $i++) {
            $r .= ($hexes [(ord($sStr{$i}) >> 4)] . $hexes [(ord($sStr{$i}) & 0xf)]);
        }

        return $r;
    }

    /**
     * Decrypt
     * @param string $sStr
     * @return string
     */
    private function decrypt($sStr)
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
     * Get client IP.
     * @return '';
     */
    private function getClientIP()
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
     * Get cookie domain.
     * @return string
     */
    private function getCookieDomain()
    {
        return substr($_SERVER['HTTP_HOST'], strpos($_SERVER['HTTP_HOST'], '.') + 1);
    }

}

# end of this file
