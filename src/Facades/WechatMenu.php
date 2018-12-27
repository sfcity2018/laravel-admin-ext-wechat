<?php
/**
 * 作者: 距离
 * 日期: 2018/12/26
 * 时间: 18:53
 */

namespace Wechat\Facades;


use Illuminate\Support\Facades\Facade;
use Wechat\Menu\DefaultMenu;

class WechatMenu extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'menu';
    }

}