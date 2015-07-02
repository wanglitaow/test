<?php
/**
 * Created by PhpStorm.
 * User: wanglitao
 * Date: 14-12-23
 * Time: 下午5:29
 */

load_controller('/base');
load_lib('/bll/message/message');

/**
 * 用户站内信界面
 * Class affiliate_myhaofangcontroller
 */
class message_testcontroller extends basecontroller{


    private static $asignKeyMap=['no','mobile','sToken','sCaptcha','iType','clientno','signature','sNo'];
    const TRANCE_SUCCESS = 1; // 传输成功
    const TRANCE_ERROR   = 0; // 传输失败
    const CALL_ERROR_CODE=100;//调取失败code
    const VERIFY_FAIL =101;   // 签名失败
    const UN_BUNDLE_ERROR = 0 ;   // 解绑失败
    const UN_BUNDLE_SUCCEES =1 ;   // 解绑成功

    // 签名的key
    const YZT_KEY = 'e01b303bb027a00647994863287fc1b6' ;


    public function doRequest() {
        $p_aParams = $this->_getYztData($_REQUEST);
      //  $sign = trim($this->input('signature'));
        if(array_key_exists('signature',$p_aParams)){
            unset($p_aParams['signature']) ;
        }
        if(!$this->_verifySign($p_aParams, self::YZT_KEY, '')){
        }
     exit ;
    }


    /**
     * @param $p_aParams
     * @return array
     * @author  wanglitao
     * 过滤数据
     */
    private function _getYztData($p_aParams){
        $aData = [];
        if(empty($p_aParams)) return $aData;
        foreach($p_aParams as $key =>$v){
            if(in_array(trim($key), self::$asignKeyMap)){
                $aData[$key] = $this->getParam($key);
            }
        }
        return $aData;
    }

    public function doRedquest(){

        if(!in_array(trim(@$this->getParam('sAction')), ['yztsendmessage','yztbinduser'])){
            $p_aParams = $this->_getYztData($_REQUEST);
            $sign = trim($this->input('signature'));
            if(array_key_exists('signature',$p_aParams)){
                unset($p_aParams['signature']) ;
            }
            if(!$this->_verifySign($p_aParams, self::YZT_KEY, $sign)){
                $aResult=['code'=>self::VERIFY_FAIL,'msg'=>'签名失败'];
                bll_blackbox::setTopic('bis_outward_yzt_verify_sign');
                bll_blackbox::add('info','bis verify sign error  ', $p_aParams);
                $this->_returnData($aResult);
            }

        }
        parent::doRequest();

    }


    /**
     * 生成签名仅限于bis一账通
     * @param $p_aParams  //加签名的数组
     * @param $p_sKey     //加签名的Key
     * @return string
     * @author  wanglitao
     */
    private  function  _produceSign($p_aParams,$p_sKey){
        ksort($p_aParams);
        $sSign = '' ;
        $i = 1 ;
        $iNum = count($p_aParams);
        foreach($p_aParams as $k=>$v){
            if($i<$iNum){
                $sSign.= $k.'='.$v.'&';
            }else{
                $sSign.= $k.'='.$v.$p_sKey;
            }
            $i++;
        }
        $sSignSign = md5($sSign);
        return $sSignSign;
    }

    /**
     * 签名验证
     * @param $p_aParams //加签名的数组
     * @param $p_sKey    //加签名的Key
     * @param $p_sSign   // 从zyt得到的签名串
     * @return bool
     * @author  wanglitao
     */
    private  function _verifySign($p_aParams, $p_sKey, $p_sSign) {
        $sSignSign = $this->_produceSign($p_aParams, $p_sKey);
        echo $sSignSign;
        return $p_sSign == $sSignSign;
    }



}