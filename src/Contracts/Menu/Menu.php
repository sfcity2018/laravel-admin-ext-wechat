<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 20:17
 */

namespace Wechat\Contracts\Menu;


interface Menu
{
    /**
     * @return mixed
     */
    public function createMenu($menuContent);

    /**
     * @return mixed
     */
    public function queryMenu();

    /**
     * @return mixed
     */
    public function deleteMenu();


    /**
     * @return mixed
     */
    public function getCurrentMenuInfo();

}