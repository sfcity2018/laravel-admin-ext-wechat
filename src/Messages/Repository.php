<?php
/**
 * 作者: 距离
 * 日期: 2018/12/27
 * 时间: 7:57
 */

namespace Wechat\Messages;

use Illuminate\Contracts\Events\Dispatcher;
use Wechat\Contracts\Messages\Message;
use Wechat\Contracts\Messages\Repository as RepositoryContract;

class Repository implements RepositoryContract
{

    /**
     * The event dispatcher implementation.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $events;

    public function __construct(Message $message)
    {
    }

    public function storage()
    {
        // TODO: Implement storage() method.
    }

    /**
     * Set the event dispatcher instance.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function setEventDispatcher(Dispatcher $events)
    {
        $this->events = $events;
    }
}