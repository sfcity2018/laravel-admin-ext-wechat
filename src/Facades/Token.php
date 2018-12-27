<?php
/**
 * 作者: 距离
 * 日期: 2018/12/26
 * 时间: 18:09
 */

namespace Wechat\Facades;


use Illuminate\Support\Facades\Facade;
use Wechat\Contracts\Token\AccessToken as WechatAccessToken;

/**
 * Class Token
 * @package Wechat\Facades
 * @method static null|string getAccessToken()
 */
class Token extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'token';
    }

}