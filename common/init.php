<?php
    // ThinkPHP����Ŀ¼
    defined('THINK_PATH') or define('THINK_PATH', PRO_PATH.'common/ThinkPHP/');
	
	// ThinkPHP�汾��Ϣ
	define('THINK_VERSION', '3.1.2');
	
	// �汾���
	if(version_compare(PHP_VERSION,'5.2.0','<'))
		die('require PHP > 5.2.0 !');

	// ϵͳ��Ϣ
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

	// ��Ŀ���ƣ�����Ŀ��Ŀ¼������һ�£�
	defined('APP_NAME') or define('APP_NAME', basename(dirname(dirname($_SERVER['SCRIPT_FILENAME']))));

	// ��������ģʽ
	if(!IS_CLI)
	{
		// ��ǰ�ļ��������·�����ļ���(eg: /tiaozao/htm/index.php)
		if (!defined('_PHP_FILE_'))
		{
			// CGI/FASTCGIģʽ
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
		
		// ��վURL��Ŀ¼(eg: /tiaozao ��ͬ��APP_PATH�� F:/localhost/tiaozao/)
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

		//֧�ֵ�URLģʽ
		define('URL_COMMON',   0);   //��ͨģʽ
		define('URL_PATHINFO', 1);   //PATHINFOģʽ
		define('URL_REWRITE',  2);   //REWRITEģʽ
		define('URL_COMPAT',   3);   // ����ģʽ
	}
	
	// ��Ŀ���·������
	define('HTML_PATH',   	PRO_PATH.'htm/'); 			// ��Ŀ��̬Ŀ¼
	define('COMMON_PATH', 	PRO_PATH.'common/'); 		// ��Ŀ����Ŀ¼
	define('LIB_PATH',    	PRO_PATH.'lib/'); 			// ��Ŀ���Ŀ¼
	define('CONF_PATH',   	PRO_PATH.'conf/'); 			// ��Ŀ����Ŀ¼
	define('LANG_PATH',   	PRO_PATH.'lang/'); 			// ��Ŀ���԰�Ŀ¼
	define('APP_PATH',    	PRO_PATH.'app/');			// MVCĿ¼
	define('MODEl_PATH',  	APP_PATH.'model/');		// ģ��Ŀ¼
	define('CONTROL_PATH', 	APP_PATH.'controller/');	// ������Ŀ¼
	define('TMPL_PATH', 	APP_PATH.'view/');			// ��ͼĿ¼
	
	define('LOG_PATH',       RUNTIME_PATH.'logs/'); 	// ��Ŀ��־Ŀ¼
	define('CACHE_PATH',     RUNTIME_PATH.'cache/'); 	// ��Ŀ����Ŀ¼
	define('DATA_PATH',      RUNTIME_PATH.'data/'); 	// ��Ŀ����Ŀ¼
	define('TPL_PATH',     	 RUNTIME_PATH.'tpl/'); 		// ��Ŀģ�建��Ŀ¼
	
	// ThinkPHP·������ -- ����·�������������� / ��β
	define('CORE_PATH',      THINK_PATH.'Lib/'); 		// ϵͳ�������Ŀ¼
	define('EXTEND_PATH',    THINK_PATH.'Extend/'); 	// ϵͳ��չĿ¼
	define('MODE_PATH',      EXTEND_PATH.'Mode/'); 		// ģʽ��չĿ¼
	define('ENGINE_PATH',    EXTEND_PATH.'Engine/'); 	// ������չĿ¼
	define('VENDOR_PATH',    EXTEND_PATH.'Vendor/'); 	// ���������Ŀ¼
	define('LIBRARY_PATH',   EXTEND_PATH.'Library/');	// ��չ���Ŀ¼

	// Ϊ����ThinkPHP�з��㵼���������⣬����VendorĿ¼��include_path
	set_include_path(get_include_path() . PATH_SEPARATOR . VENDOR_PATH);

	// ��������ʱ����Ҫ���ļ� �������Զ�Ŀ¼����
	function load_runtime_file()
	{
		// ����ThinkPHP����������
		require THINK_PATH.'Common/common.php';
		
		// ��ȡThinkPHP�����ļ��б�
		$list = array(
			CORE_PATH.'Core/Think.class.php',
			CORE_PATH.'Core/ThinkException.class.php',  // �쳣������
			CORE_PATH.'Core/Behavior.class.php',
		);
		foreach ($list as $key=>$file)
		{
			if(is_file($file))
				require_cache($file);
		}
		
		// ����ThinkPHP����������
		alias_import(include THINK_PATH.'Conf/alias.php');

		// ����ģʽ�л�ɾ�����뻺��
		if (APP_DEBUG)
		{
			if(is_file(RUNTIME_FILE))
				unlink(RUNTIME_FILE);
		}
	}
	
	// ��������ʱ�����ļ�
	load_runtime_file();
	
	// ��¼�����ļ�ʱ��
	G('loadTime');
	
	// ִ�����
	Think::Start();
