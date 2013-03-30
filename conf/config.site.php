<?php
/**
 * config.site.php
 *
 * 网站结构配置文件
 *
 * @author hywang<404621857@qq.com>
 * @version 1.0
 */

// 是否显示错误提示
$siteConf['displayErrors'] = 1;

// 默认字符集
$siteConf['charset'] = 'gbk';

// 默认时区
$siteConf['timeZone'] = 'PRC';

// HTML中要用到的路径
$siteConf['base_path'] = dirname(dirname($_SERVER['SCRIPT_NAME']));

// URL路由模式
define('URL_PATHINFO', 0);
define('URL_QUERYSTRING', 1);
define('URL_QS_PATHINFO', 2);
define('URL_REWRITE', 3);

// 默认的URL路由模式
define('URL_MODEL', URL_PATHINFO);
