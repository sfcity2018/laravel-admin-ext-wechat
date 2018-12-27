<?php

namespace Wechat;

use Illuminate\Support\ServiceProvider;
use Wechat\Contracts\Menu\Menu;
use Wechat\Menu\DefaultMenu;
use Wechat\Messages\MessageManager;
use Wechat\Token\AccessToken;
use Wechat\Contracts\Token\AccessToken as WechatAccessToken;

class WechatServiceProvider extends ServiceProvider
{
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin.auth'       => Middleware\WechatAuthMiddleware::class,
    ];


    /**
     * {@inheritdoc}
     */
    public function boot(Wechat $extension)
    {
        if (! Wechat::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'wechat');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext/wechat')],
                'wechat'
            );
            $this->publishes([__DIR__.'/../config' => config_path()], 'wechat');
        }

        $this->app->booted(function () {
            Wechat::routes(__DIR__.'/../routes/web.php');
        });
        /*Admin::booting(function () {
            Admin::js('vendor/laravel-admin-ext/futures/js/futures.js');
            Admin::css('vendor/laravel-admin-ext/futures/css/futures.css');
        });*/
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('message', function ($app) {
            return new MessageManager($app);
        });

        $this->app->bind('token',function(){
            return new Accesstoken();
        });

        $this->app->bind('menu',function(){
            return new DefaultMenu();
        });
        // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'message', 'token', 'menu',
        ];
    }
}