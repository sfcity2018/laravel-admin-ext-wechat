<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 17:47
 */

namespace Wechat\Exception;


use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class Handler extends \Exception
{
    /**
     * Render exception.
     *
     * @param \Exception $exception
     *
     * @return string
     *
     * @throws
     */
    public static function renderException(\Exception $exception)
    {
        $error = new MessageBag([
            'type'    => get_class($exception),
            'message' => $exception->getMessage(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
        ]);

        $errors = new ViewErrorBag();
        $errors->put('exception', $error);

        return view('wechat::errors.exception', compact('errors'))->render();
    }

    /**
     * Flash a error message to content.
     *
     * @param string $title
     * @param string $message
     *
     * @return mixed
     */
    public static function error($title = '', $message = '')
    {
        $error = new MessageBag(compact('title', 'message'));

        return session()->flash('error', $error);
    }
}