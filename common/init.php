<?php
    // ThinkPHP所在目录
    defined('THINK_PATH') or define('THINK_PATH', PRO_PATH.'common/ThinkPHP/');
	
	// ThinkPHP版本信息
	define('THINK_VERSION', '3.1.2');
	
	// 版本检测
	if(version_compare(PHP_VERSION,'5.2.0','<'))
		die('require PHP > 5.2.0 !');

	// 系统信息
	if(version_compare(PHP_VERSION,'5.4.0','<'))
	{
		ini_set('magic_quotes_runtime', 0);
		define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc() ? True : False);
	}
	else
	{
		define('MAGIC_QUOTES_GPC', false);
	}
	define('IS_CGI', substr(PHP_SAPI, 0, 3) == 'cgi' ? 1 : 0);
	define('IS_WIN', strstr(PHP_OS, 'WIN') ? 1 : 0);
	define('IS_CLI', PHP_SAPI == 'cli' ? 1 : 0);

	// 项目名称（和项目根目录名保持一致）
	defined('APP_NAME') or define('APP_NAME', basename(dirname(dirname($_SERVER['SCRIPT_FILENAME']))));

	// 非命令行模式
	if(!IS_CLI)
	{
		// 当前文件所在相对路径和文件名(eg: /tiaozao/htm/index.php)
		if (!defined('_PHP_FILE_'))
		{
			// CGI/FASTCGI模式
			if(IS_CGI)
			{
				$_temp = explode('.php', $_SERVER['PHP_SELF']);
				define('_PHP_FILE_', rtrim(str_replace($_SERVER['HTTP_HOST'], '', $_temp[0].'.php'),'/'));
			}
			else
			{
				define('_PHP_FILE_', rtrim($_SERVER['SCRIPT_NAME'],'/'));
			}
		}
		
		// 网站URL根目录(eg: /tiaozao 不同于APP_PATH的 F:/localhost/tiaozao/)
		if (!defined('__ROOT__'))
		{
			if (strtoupper(APP_NAME) == strtoupper(basename(dirname(dirname(_PHP_FILE_)))))
			{
				$_root = dirname(dirname(dirname(_PHP_FILE_)));
			}
			else
			{
				$_root = dirname(_PHP_FILE_);
			}
			define('__ROOT__', (($_root == '/' || $_root == '\\') ? '' : $_root));
		}

		//支持的URL模式
		define('URL_COMMON',   0);   //普通模式
		define('URL_PATHINFO', 1);   //PATHINFO模式
		define('URL_REWRITE',  2);   //REWRITE模式
		define('URL_COMPAT',   3);   // 兼容模式
	}
	
	// 项目相关路径设置
	define('HTML_PATH',   	PRO_PATH.'htm/'); 			// 项目静态目录
	define('COMMON_PATH', 	PRO_PATH.'common/'); 		// 项目公共目录
	define('LIB_PATH',    	PRO_PATH.'lib/'); 			// 项目类库目录
	define('CONF_PATH',   	PRO_PATH.'conf/'); 			// 项目配置目录
	define('LANG_PATH',   	PRO_PATH.'lang/'); 			// 项目语言包目录
	define('APP_PATH',    	PRO_PATH.'app/');			// MVC目录
	define('MODEl_PATH',  	APP_PATH.'model/');		// 模型目录
	define('CONTROL_PATH', 	APP_PATH.'controller/');	// 控制器目录
	define('TMPL_PATH', 	APP_PATH.'view/');			// 视图目录
	
	define('LOG_PATH',       RUNTIME_PATH.'logs/'); 	// 项目日志目录
	define('CACHE_PATH',     RUNTIME_PATH.'cache/'); 	// 项目缓存目录
	define('DATA_PATH',      RUNTIME_PATH.'data/'); 	// 项目数据目录
	define('TPL_PATH',     	 RUNTIME_PATH.'tpl/'); 		// 项目模板缓存目录
	
	// ThinkPHP路径设置 -- 所有路径常量都必须以 / 结尾
	define('CORE_PATH',      THINK_PATH.'Lib/'); 		// 系统核心类库目录
	define('EXTEND_PATH',    THINK_PATH.'Extend/'); 	// 系统扩展目录
	define('MODE_PATH',      EXTEND_PATH.'Mode/'); 		// 模式扩展目录
	define('ENGINE_PATH',    EXTEND_PATH.'Engine/'); 	// 引擎扩展目录
	define('VENDOR_PATH',    EXTEND_PATH.'Vendor/'); 	// 第三方类库目录
	define('LIBRARY_PATH',   EXTEND_PATH.'Library/');	// 扩展类库目录

	// 为了在ThinkPHP中方便导入第三方类库，设置Vendor目录到include_path
	set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);

	// 加载运行时所需要的文件 并负责自动目录生成
	function load_runtime_file()
	{
		// 加载ThinkPHP基础函数库
		require THINK_PATH.'Common/common.php';
		
		// 读取ThinkPHP核心文件列表
		$list = array(
			CORE_PATH.'Core/Think.class.php',
			CORE_PATH.'Core/ThinkException.class.php',  // 异常处理类
			CORE_PATH.'Core/Behavior.class.php',
		);
		foreach ($list as $key=>$file)
		{
			if(is_file($file))
				require_cache($file);
		}
		
		// 加载ThinkPHP类库别名定义
		alias_import(include THINK_PATH.'Conf/alias.php');

		// 调试模式切换删除编译缓存
		if (APP_DEBUG)
		{
			if(is_file(RUNTIME_FILE))
				unlink(RUNTIME_FILE);
		}
	}
	
	// 加载运行时所需文件
	load_runtime_file();
	
	// 记录加载文件时间
	G('loadTime');
	
	// 执行入口
	Think::Start();
