<?php
/**
 * 处理生产环境版本问题
 * User: 洪明伟
 * Date: 2015/6/12
 * Time: 15:45
 */

class PAFVersion
{

    const VERSION_COOKIE_NAME = 'pafversion';

    /**
     * 获取版本号
     * @param string $type 版本类型 ga|beta
     * @return string
     */
    public static function getVersion($versionMap){
        $type = self::getVersionType();
        return $versionMap[$type];
    }

    /**
     * 获取当前版本类型
     */
    public static function getVersionType(){
        $versionType = 'ga';
        $cookieVersion = self::getCookieVersion();
        $checkIP = self::checkBetaIP();
        if(isset($cookieVersion['type']) && $cookieVersion['type'] == 'beta' && $checkIP){
            $versionType = 'beta';
        }
        return $versionType;
    }

    /**
     * Get cookie version.
     */
    public static function getCookieVersion(){
        $aRet = [];

        if (isset($_COOKIE[self::VERSION_COOKIE_NAME])) {
            $sCookie = $_COOKIE[self::VERSION_COOKIE_NAME];
            $sValue = self::decrypt($sCookie);
            $aRet = json_decode($sValue, true);
        }

        return $aRet;
    }

    /**
     * Check beta IP list.
     * @return bool
     */
    public static function checkBetaIP(){
        $IP = self::getClientIP();
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

        if (preg_match('/^(192.168)/', $IP) > 0 or preg_match('/^(10.)/', $IP) > 0 or preg_match('/^(172.)/', $IP) > 0) {
            $bResult = true;
        }

        return $bResult;
    }

    /**
     * Encrypt
     * @param string $sStr
     * @return string
     */
    public static function encrypt($sStr){
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
    public static function decrypt($sStr){
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
    public static function getClientIP(){
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

}