<?php 
/**
 * index.php
 *
 * ����ļ�
 *
 * @author hywang<404621857@qq.com>
 * @version 1.0
*/

 
// ��¼��ʼ����ʱ��
$GLOBALS['_beginTime'] = microtime(TRUE);

// ��¼�ڴ��ʼʹ��
define('MEMORY_LIMIT_ON', function_exists('memory_get_usage'));
if (MEMORY_LIMIT_ON)
	$GLOBALS['_startUseMems'] = memory_get_usage();

// ����·��	
define('PRO_PATH', dirname(dirname($_SERVER['SCRIPT_FILENAME'])).'/');
define('RUNTIME_PATH', PRO_PATH.'runtime/');
$runtime = defined('MODE_NAME') ? '~'.strtolower(MODE_NAME).'_indexCache.php' : '~indexCache.php';
define('RUNTIME_FILE', RUNTIME_PATH.$runtime);

// ����ģʽ
define('APP_DEBUG', true);

// ��ʽģʽ�һ����ļ�����ʱֱ���������л����ļ�
if (!APP_DEBUG && is_file(RUNTIME_FILE))
{
    require RUNTIME_FILE;
}
// ����ģʽ�����л����ļ�������ʱ
else
{
	require PRO_PATH.'common/init.php';
}
