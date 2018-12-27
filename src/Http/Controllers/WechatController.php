<?php

namespace Wechat\Http\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Psr\Container\ContainerInterface;
use Wechat\Token\AccessToken;

class WechatController extends Controller
{
    public function index(Content $content, ContainerInterface $container)
    {
        $wechat = $container->get(AccessToken::class);
        print_r($wechat->getAccessToken());
        return $content
            ->header('Title')
            ->description('Description')
            ->body(view('wechat::index'));
    }


}