<?php
/**
 * 作者: 距离
 * 日期: 2018/12/27
 * 时间: 7:22
 */

namespace Wechat\Contracts\Messages;


interface Factory
{
    /**
     * @param  string|null  $type
     * @param string|null $content
     * @return mixed
     */
    public function receive($type, $content);
}