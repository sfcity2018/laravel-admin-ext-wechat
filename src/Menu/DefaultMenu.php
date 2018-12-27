<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 20:36
 */

namespace Wechat\Menu;


use GuzzleHttp\Client;
use Wechat\Contracts\Token\AccessToken;
use wechat\Traits\ApiUrls;

class DefaultMenu extends AbstractMenu
{

    /**
     * @var null
     */
    protected $accessToken;


    /**
     * AbstractMenu constructor.
     * @param AccessToken $accessToken
     */
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }


    /***菜单标准格式**/
    /***$menu = [
     * 'button' => [
     * [
     * 'name' => '积分',
     * 'sub_button' => [
     * [
     * 'type' => 'view',
     * 'name' => '积分商城',
     * 'url' => 'https://www.baidu.com',
     * ],
     * [
     * 'type' => 'view',
     * 'name' => '微商城1',
     * 'url' => 'https://www.baidu.com',
     * ],
     * [
     * 'type' => 'view',
     * 'name' => '优品专区',
     * 'url' => 'https://www.baidu.com',
     * ],
     * ]
     * ],
     * [
     * 'name' => '活动专区',
     * 'sub_button' => [
     * [
     * 'type' => 'view',
     * 'name' => '积分商城',
     * 'url' => 'https://www.baidu.com',
     * ],
     * [
     * 'type' => 'view',
     * 'name' => '微商城1',
     * 'url' => 'https://www.baidu.com',
     * ],
     * [
     * 'type' => 'view',
     * 'name' => '优品专区',
     * 'url' => 'https://www.baidu.com',
     * ],
     * ]
     * ],
     * [
     * 'name' => '积分管理',
     * 'sub_button' => [
     * [
     * 'type' => 'view',
     * 'name' => '积分商城',
     * 'url' => 'https://www.baidu.com',
     * ],
     * [
     * 'type' => 'view',
     * 'name' => '微商城1',
     * 'url' => 'https://www.baidu.com',
     * ],
     * [
     * 'type' => 'view',
     * 'name' => '优品专区',
     * 'url' => 'https://www.baidu.com',
     * ],
     * ]
     * ],
     * ]
     * ];
     ***/
    /**
     * @param $menuContent
     *
     * @return bool|mixed
     * @throws
     */
    public function createMenu($menuContent)
    {
        $url = ApiUrls::$menu_create . app()->get(\Wechat\Token\AccessToken::class)->getAccessToken();
        $client = new Client(['verify' => false]);

        $response = $client->request('POST', $url, [
            'body' => json_encode($menuContent, JSON_UNESCAPED_UNICODE),
        ]);
        $content = json_decode($response->getBody()->getContents(), true);

        if (key_exists('errcode', $content) && $content['errcode'] != 0) {
            print_r($content);
            return false;
        }
        return true;
    }


    /**
     * @return null
     */
    public function getAccessToken()
    {
        return $this->accessToken->getAccessToken();
    }
}