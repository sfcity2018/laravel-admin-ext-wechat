<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 13:51
 */

namespace Wechat\Token;


class AccessToken extends AbstractAccessToken
{
    /**
     * @var null
     */
    protected static $appId = null;

    /**
     * @var null
     */
    protected static $appSecret = null;

    /**
     * Token constructor.
     * @param null $appId
     * @param null $appSecret
     */
    public function __construct($appId = null, $appSecret = null)
    {
        self::$appId = $appId;
        self::$appSecret = $appSecret;
        $this->init();
    }

    /**
     * Checked appId and appSecret
     */
    private function init()
    {
        if (!self::$appId || !self::$appSecret){
            self::$appId = config('wechat.configure.appId');
            self::$appSecret = config('wechat.configure.appSecret');
        }
    }

    /**
     * @return null
     */
    public static function getAppId()
    {
        return self::$appId;
    }

    /**
     * @param null $appId
     */
    public static function setAppId($appId)
    {
        self::$appId = $appId;
    }

    /**
     * @return null
     */
    public static function getAppSecret()
    {
        return self::$appSecret;
    }

    /**
     * @param null $appSecret
     */
    public static function setAppSecret($appSecret)
    {
        self::$appSecret = $appSecret;
    }

    /**
     * @return $this|\Wechat\Contracts\Token\AccessToken
     */
    public function getClass()
    {
        return $this;
    }


}