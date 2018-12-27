<?php
/**
 * 作者: 距离
 * 日期: 2018/12/27
 * 时间: 7:41
 */

namespace Wechat\Messages;

use Wechat\Contracts\Messages\Message as MessageContract;

abstract class Message implements MessageContract
{

    public function __construct()
    {
    }


}