<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 17:34
 */

namespace Wechat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Wechat\Facades\Token;
use Wechat\Facades\WechatMenu;

class NotifyController extends Controller
{

    /**
     * 处理所有微信服务器推送的消息
     *
     * @param Request $request
     *
     * @throws
     */
    public static function handler(Request $request)
    {
        $menu = [
            'button' => [
                [
                    'name' => '积分',
                    'sub_button' => [
                        [
                            'type' => 'view',
                            'name' => '积分商城',
                            'url' => 'https://www.baidu.com',
                        ],
                        [
                            'type' => 'view',
                            'name' => '微商城1',
                            'url' => 'https://www.baidu.com',
                        ],
                        [
                            'type' => 'view',
                            'name' => '优品专区',
                            'url' => 'https://www.baidu.com',
                        ],
                    ]
                ],
                [
                    'name' => '活动专区',
                    'sub_button' => [
                        [
                            'type' => 'view',
                            'name' => '积分商城',
                            'url' => 'https://www.baidu.com',
                        ],
                        [
                            'type' => 'view',
                            'name' => '微商城1',
                            'url' => 'https://www.baidu.com',
                        ],
                        [
                            'type' => 'view',
                            'name' => '优品专区',
                            'url' => 'https://www.baidu.com',
                        ],
                    ]
                ],
                [
                    'name' => '积分管理',
                    'sub_button' => [
                        [
                            'type' => 'view',
                            'name' => '积分商城',
                            'url' => 'https://www.baidu.com',
                        ],
                        [
                            'type' => 'view',
                            'name' => '微商城1',
                            'url' => 'https://www.baidu.com',
                        ],
                        [
                            'type' => 'view',
                            'name' => '优品专区',
                            'url' => 'https://www.baidu.com',
                        ],
                    ]
                ],
            ]
        ];

        $token = app('message')->receive('text', 'Hello World!');

        exit;
    }
}