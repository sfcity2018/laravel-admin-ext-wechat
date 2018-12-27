<?php
/**
 * 作者: 距离
 * 日期: 2018/12/26
 * 时间: 19:59
 */

namespace Wechat\Messages;

class Text extends Message
{
    public function handle()
    {
        print_r('text message');
    }
}