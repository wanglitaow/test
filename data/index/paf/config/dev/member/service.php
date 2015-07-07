<?php
/**
 * 内部服务相关配置
 * Created by PhpStorm.
 * User: liaojunling
 * Date: 15-1-20
 * Time: 上午10:36
 */

return array(
    "member" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonStatusProtocol",
        "host" => "member.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
            "user/register" => "/api/internal/user/register.html",
            "cfm/getbanklist" => "/v2/service/cfm/getbanklist",
        ),
    ),
    "hfb" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonCodeProtocol",
        "host" => "hfb.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "steward" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonStewardSuccessProtocol",
        "host" => "steward.hekai.dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "hfb_sign" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonSuccessProtocol",
        "sign" => true,
        "signSalt" => 'HAOFANGBAO###$!#@%&$#@$!@2@$!3!$13^&254#',
        "host" => "hfb.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "hfd_sign" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonHfdSuccessProtocol",
        "sign" => true,
        "signSalt" => 'HAOFANGBAO###$!#@%&$#@$!@2@$!3!$13^&254#',
        "host" => "hfb.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "zc_sign" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonZcSuccessProtocol",
        "sign" => true,
        "signSalt" => 'HAOFANGBAO###$!#@%&$#@$!@2@$!3!$13^&254#',
        "host" => "zc.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "zjd" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonZjdCodeProtocol",
        "host" => "hfb.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "gold" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonCodeProtocol",
        "host" => "gold.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "fsjl" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonFsjlCodeProtocol",
        "host" => "hft.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),
    "esf" => array(
        "strategy" => "http",
        "protocol" => "Util\\Service\\Protocol\\JsonEsfCodeProtocol",
        "host" => "esf.".PAF_CLOUD.".dev.anhouse.com.cn",
        "uri" => array(
        ),
    ),

);
