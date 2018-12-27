<?php
/**
 * 作者: 距离
 * 日期: 2018/12/27
 * 时间: 7:26
 */

namespace Wechat\Messages;

use InvalidArgumentException;
use Wechat\Contracts\Messages\Message;
use Wechat\Contracts\Messages\Factory as FactoryContract;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

class MessageManager implements FactoryContract
{
    /**
     * The application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * The array of resolved messages types.
     *
     * @var array
     */
    protected $messages = [];

    /**
     * Create a new Message manager instance.
     *
     * @param  \Illuminate\Foundation\Application $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Get a cache store instance by name.
     *
     * @param  string|null $type
     * @param string|null $content
     * @return \Wechat\Contracts\Messages\Message
     */
    public function receive($type, $content)
    {
        return $this->messages[$type] = $this->get($type, $content);
    }

    /**
     * Attempt to get the store from the local cache.
     *
     * @param  string $type
     * @param string|null $content
     * @return \Wechat\Contracts\Messages\Message
     */
    protected function get($type, $content)
    {

        return $this->stores[$type] ?? $this->resolve($type, $content);
    }

    /**
     * Resolve the given $type.
     *
     * @param  string $type
     * @param string|null $content
     * @return \Wechat\Contracts\Messages\Message
     *
     * @throws \InvalidArgumentException
     */
    protected function resolve($type, $content)
    {

        $messageMethod = 'create' . ucfirst($type) . 'Message';
        if (method_exists($this, $messageMethod)) {
            return $this->{$messageMethod}($content);
        } else {
            throw new InvalidArgumentException("Message {$type} is not supported.");
        }
    }

    /**
     * Create a new message repository with the given implementation.
     * @param Message $message
     * @return Repository
     */
    public function repository(Message $message)
    {
        $repository = new Repository($message);

        if ($this->app->bound(DispatcherContract::class)) {
            $repository->setEventDispatcher(
                $this->app[DispatcherContract::class]
            );
        }
        return $repository;
    }

    /**
     * @param string $content
     * @return Repository
     */
    public function createTextMessage($content)
    {
        $text = new Text($content);
        $text->handle();
        return $this->repository($text);
    }
}