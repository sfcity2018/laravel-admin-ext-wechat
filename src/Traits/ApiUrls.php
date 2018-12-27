<?php
/**
 * 作者: 距离
 * 日期: 2018/12/25
 * 时间: 14:29
 */

namespace wechat\Traits;


trait ApiUrls
{
    /**
     * @var string 获取access_token连接地址
     */
    public static $access_token = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&';

    /**
     * 创建默认菜单
     *
     * @var string
     */
    public static $menu_create = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=';

    /**
     * 删除菜单，包括个性化菜单
     *
     * @var string
     */
    public static $menu_delete = 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=';

    /**
     * 查询菜单，包括个性化菜单
     *
     * @var string
     */
    public static $menu_query = 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=';

    /**
     * 获取自定义菜单配置接口
     *
     * @var string
     */
    public static $menu_current_menu_info = 'https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token=';

}