<?php
/**
 * config.site.php
 *
 * ��վ�ṹ�����ļ�
 *
 * @author hywang<404621857@qq.com>
 * @version 1.0
 */

// �Ƿ���ʾ������ʾ
$siteConf['displayErrors'] = 1;

// Ĭ���ַ���
$siteConf['charset'] = 'gbk';

// Ĭ��ʱ��
$siteConf['timeZone'] = 'PRC';

// HTML��Ҫ�õ���·��
$siteConf['base_path'] = dirname(dirname($_SERVER['SCRIPT_NAME']));

// URL·��ģʽ
define('URL_PATHINFO', 0);
define('URL_QUERYSTRING', 1);
define('URL_QS_PATHINFO', 2);
define('URL_REWRITE', 3);

// Ĭ�ϵ�URL·��ģʽ
define('URL_MODEL', URL_PATHINFO);
