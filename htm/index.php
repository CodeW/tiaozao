<?php 
/**
 * index.php
 *
 * 入口文件
 *
 * @author hywang<404621857@qq.com>
 * @version 1.0
*/

 
// 记录开始运行时间
$GLOBALS['_beginTime'] = microtime(TRUE);

// 记录内存初始使用
define('MEMORY_LIMIT_ON', function_exists('memory_get_usage'));
if (MEMORY_LIMIT_ON)
	$GLOBALS['_startUseMems'] = memory_get_usage();

// 基本路径	
define('PRO_PATH', dirname(dirname($_SERVER['SCRIPT_FILENAME'])).'/');
define('RUNTIME_PATH', PRO_PATH.'runtime/');
$runtime = defined('MODE_NAME') ? '~'.strtolower(MODE_NAME).'_indexCache.php' : '~indexCache.php';
define('RUNTIME_FILE', RUNTIME_PATH.$runtime);

// 调试模式
define('APP_DEBUG', true);

// 正式模式且缓存文件存在时直接载入运行缓存文件
if (!APP_DEBUG && is_file(RUNTIME_FILE))
{
    require RUNTIME_FILE;
}
// 调试模式或运行缓存文件不存在时
else
{
	require PRO_PATH.'common/init.php';
}
