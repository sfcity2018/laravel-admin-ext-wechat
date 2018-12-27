<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 13:30
 */

namespace Wechat\Token;


use Illuminate\Support\ServiceProvider;

class TokenServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AccessToken::class, function ($app) {
            $config = $app->make('config')->get('admin');
            print($config);
           return new AccessToken();
        });
    }
}