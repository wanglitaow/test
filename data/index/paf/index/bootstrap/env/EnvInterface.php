<?php
/**
 * Created by PhpStorm.
 * User: PA
 * Date: 15-1-26
 * Time: 下午1:59
 */

interface EnvInterface
{
    /**
     * 初始化环境内容
     * @return mixed
     */
    public function initEnvironment();

    /**
     * laravel框架地址
     * @return mixed
     */
    public function getSystemPath();

    /**
     * App路径
     * @return mixed
     */
    public function getAppPath();

    /**
     * 环境配置路径
     * @return mixed
     */
    public function getEnvConfigPath();

    /**
     * 获得业务名称
     * @return mixed
     */
    public function getBusinessName();

    /**
     * 获得storage路径
     * @return mixed
     */
    public function getStoragePath();

    /**
     * 公共视图路径
     * @return mixed
     */
    public function getPublicViewPath();

    public function toString();
}