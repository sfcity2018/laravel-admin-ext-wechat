<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 20:28
 */

namespace Wechat\Menu;


use GuzzleHttp\Client;
use Wechat\Contracts\Token\AccessToken;
use Wechat\Traits\ApiUrls;
use Wechat\Contracts\Menu\Menu;

abstract class AbstractMenu implements Menu
{
    use ApiUrls;


    /**
     * @return mixed|boolean
     * @throws
     */
    public function deleteMenu()
    {
        $url = ApiUrls::$menu_delete . $this->getAccessToken();

        $client = new Client(['verify' => false]);
        $response = $client->request('GET', $url);
        $content = json_decode($response->getBody()->getContents(), true);

        if (key_exists('errcode', $content) && $content['errcode'] != 0) {
            print_r($content);
            return false;
        }
        return true;
    }

    /**
     * @return mixed|null
     * @throws \Exception
     */
    public function queryMenu()
    {
        $url = ApiUrls::$menu_query . $this->getAccessToken();

        $client = new Client(['verify' => false]);
        $response = $client->request('GET', $url);
        $content = json_decode($response->getBody()->getContents(), true);

        if (key_exists('errcode', $content) && $content['errcode'] != 0) {
            print_r($content);
            return null;
        }
        return $content;
    }

    public function getCurrentMenuInfo()
    {
        $url = ApiUrls::$menu_current_menu_info . $this->getAccessToken();

        $client = new Client(['verify' => false]);
        $response = $client->request('GET', $url);
        $content = json_decode($response->getBody()->getContents(), true);

        if (key_exists('errcode', $content) && $content['errcode'] != 0) {
            print_r($content);
            return null;
        }
        return $content;
    }

}