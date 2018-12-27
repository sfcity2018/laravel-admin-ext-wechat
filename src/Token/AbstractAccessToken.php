<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 13:29
 */

namespace Wechat\Token;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\Routing\Exception\InvalidParameterException;
use Wechat\Contracts\Token\AccessToken;
use Wechat\Traits\ApiUrls;

abstract class AbstractAccessToken implements AccessToken
{
    use ApiUrls;

    /**
     * @var string
     */
    private $key = 'wechat_access_token';

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        if (Cache::has($this->key)){
            $content = json_decode(Cache::get($this->key), true);
            if(isset($content) && key_exists('access_token', $content))
                return $content['access_token'];
        }

        $appId = $this->getAppId();
        $appSecret = $this->getAppSecret();

        if (!$appId || !$appSecret)
            throw new InvalidParameterException('appId or appSecret parameter error!');

        $url = ApiUrls::$access_token . "appid={$appId}&secret={$appSecret}";
        $client = new Client(['verify' => false]);
        $response = $client->request('GET', $url);
        $content = json_decode($response->getBody()->getContents(), true);

        if (key_exists('errcode', $content))
            throw new InvalidParameterException(json_encode($content));
        $second = $content['expires_in'] / 60;
        Cache::put($this->key, json_encode($content),  $second - 3);

        return $content['access_token'];
    }


    /**
     * @return mixed
     */
    public function getClass()
    {
        return static::class;
    }


}