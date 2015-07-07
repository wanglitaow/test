<?php
/**
 * 代收代付渠道配置
 * User: liujian
 * Date: 2015/07/02
 * Time: 11:37
 */

return array(
    'paf' => [
        'server' => [
            'host'      => 'https://test-www.stg.1qianbao.com:7443/caps/request.do',
            'timeout'   => 30,
            'is_ssl'    => false
        ],
        'common' => [ //公共配置
//            'merchantNo'    => '900000027487',//商户号
            'merchantNo'    => '900000000889',//商户号
            'hashFunc'      => 'SHA-1',
            'systemId'      => 'HAOFANG',
            'version'       => '1.0',//版本号
            'signType'      => 'SHA256withRSA',//签名方式
            'max_try_num'   => 3 , //最大尝试次数
            'aes_key'       => 'e4130e355260e98e2fdc1bba4e81c97e',//原始平安付提供的AES key：DF94CBDCA294DC5DEF1368E64313FD3B98FE5EBCAB7F23AE
            'sign_file'     => '/data1/www/other/paycenter_cert/paf/hf_paf_private.pem',
            'verify_sign_file'   => '/data1/www/other/paycenter_cert/paf/paf_hf_public.pem'
        ],
        'business' => [
            'cashout_apply' => [ //代付申请
                'accessMode'    => 'HAOFANGF',//接入方式
                'businessType'  => 'HAOFANGRTF',//业务类型
                'serviceCode'   => 'R0002',
            ],
            'cashout_search' => [
                'accessMode'    => 'HAOFANGF',//接入方式
                'businessType'  => 'HAOFANGRTF',//业务类型
                'serviceCode'   => 'R0043',
            ],
            'cashin_apply' => [
                'accessMode'    => 'HAOFANGS',
                'businessType'  => 'HAOFANGRTS',
                'serviceCode'   => 'R0001',
            ],
            'cashin_search' => [
                'accessMode'    => 'HAOFANGS',
                'businessType'  => 'HAOFANGRTS',
                'serviceCode'   => 'R0043',
            ]
        ]
    ],
    'beos' => [
        'server' => [
            'host'      => 'https://222.68.184.181:8107',
            'timeout'   => 30,
            'is_ssl'    => true,
            'keyfile'   => '/data1/www/other/bis/haofang_cms_stg.pem',
            'password'  => 'bis123456'
        ],
        'common' => [
            'request_cms_tpl'           => PAF_APP_PATH.'/src/Template/haofang_cms_request.xml',
            'response_cms_tpl'          => PAF_APP_PATH.'/src/Template/haofang_cms_response.xml',
            'aes_key' => 'pinganfang@bankcard!2014',
            'max_try_num' => 3 , //最大尝试次数
            'charset' => 'UTF-8'
        ],
        'business' => [
            'cashout_apply' => [
                'BIS_TRANCODE'      => '100985',
                'REQUEST_CODE'      => 'TRADE',
                'BUSINESSTYPEID'    => 'HFTX',
                'PAYTYPE'            => 'C',//收付类型：收款：D;付款:C
                'BRANCHID'           => 'R010000',//上海分公司财务机构ID
                'CURRENCY_CODE'     => 'RMB',
                'KIND'               => '1',//1:对公/0:对私（必须
                'PURPOSE'            => '提现',
                'SYSTEMID'           => 'HF',
                'CMS_PRIVATE_KEY'   => 'www.pingan.com/cms',
            ]
        ]
    ],
    'pab' => [
        'server' => [
            'host'      => 'https://222.68.184.181:8107',
            'timeout'   => 30,
            'is_ssl'    => true,
            'keyfile'   => '/data1/www/other/bis/haofang_cms_stg.pem',
            'password'  => 'bis123456',
        ],
        'common' => [
            'request_cms_tpl'           => PAF_APP_PATH.'/src/Template/haofang_cms_request.xml',
            'response_cms_tpl'          => PAF_APP_PATH.'/src/Template/haofang_cms_response.xml',
            'aes_key' => 'pinganfang@bankcard!2014',
            'max_try_num' => 3 , //最大尝试次数
            'charset' => 'UTF-8'
        ],
        'business' => [
            'cashout_apply' => [
                'BIS_TRANCODE'      => '100985',
                'REQUEST_CODE'      => 'TRADE',
                'BUSINESSTYPEID'    => 'HFYQDF',
                'PAYTYPE'            => 'C',//收付类型：收款：D;付款:C
                'BRANCHID'           => 'R010000',//上海分公司财务机构ID
                'CURRENCY_CODE'     => 'RMB',
                'KIND'               => '1',//1:对公/0:对私（必须
                'PURPOSE'            => '代付',
                'SYSTEMID'           => 'HF',
                'CMS_PRIVATE_KEY'   => 'www.pingan.com/cms',
            ],
            'cashin_apply' => [
                'BIS_TRANCODE'      => '100985',
                'REQUEST_CODE'      => 'TRADE',
                'BUSINESSTYPEID'    => 'HFYQDS',
                'PAYTYPE'            => 'D',//收付类型：收款：D;付款:C
                'BRANCHID'           => 'R010000',//上海分公司财务机构ID
                'CURRENCY_CODE'     => 'RMB',
                'KIND'               => '1',//1:对公/0:对私（必须
                'PURPOSE'            => '代收',
                'SYSTEMID'           => 'HF',
                'CMS_PRIVATE_KEY'   => 'www.pingan.com/cms',
            ]
        ]
    ]
);
