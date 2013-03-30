<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * ThinkPHP内置的Dispatcher类
 * 完成URL解析、路由和调度
 * @category   Think
 * @package  Think
 * @subpackage  Core
 * @author    liu21st <liu21st@gmail.com>
 */
class Dispatcher {

    /**
     * URL映射到控制器
     * @access public
     * @return void
     */
    static public function dispatch()
	{
        $urlMode = C('URL_MODEL');
        
		// 判断URL里面是否有兼容模式参数
		if (!empty($_GET[C('VAR_PATHINFO')]))
		{
            $_SERVER['PATH_INFO'] = $_GET[C('VAR_PATHINFO')];
            unset($_GET[C('VAR_PATHINFO')]);
        }
		
		// 获取当前项目地址
        if ($urlMode == URL_COMPAT)			// 兼容模式
		{
            define('PHP_FILE', _PHP_FILE_.'?'.C('VAR_PATHINFO').'=');
        }
		elseif ($urlMode == URL_REWRITE)	// REWRITE模式
		{
            $url = dirname(_PHP_FILE_);
            if ($url == '/' || $url == '\\')
                $url = '';
            define('PHP_FILE', $url);
        }
		else								// 普通模式，PATHINFO模式
		{
            define('PHP_FILE', _PHP_FILE_);
        }

        // 开启子域名部署
        if (C('APP_SUB_DOMAIN_DEPLOY'))
		{
            $rules = C('APP_SUB_DOMAIN_RULES');
            $subDomain  = strtolower(substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'],'.')));
            define('SUB_DOMAIN', $subDomain); 	// 二级域名定义
			
            if ($subDomain && isset($rules[$subDomain]))
			{
                $rule = $rules[$subDomain];
            }
			// 泛域名支持
			elseif (isset($rules['*']))
			{
                if ('www' != $subDomain && !in_array($subDomain, C('APP_SUB_DOMAIN_DENY')))
				{
                    $rule = $rules['*'];
                }
            }
			
            if (!empty($rule))
			{
                // 子域名部署规则 '子域名'=>array('分组名/[模块名]','var1=a&var2=b');
                $array = explode('/', $rule[0]);
				
				// 模块
                $module = array_pop($array);
                if (!empty($module))
				{
                    $_GET[C('VAR_MODULE')] = $module;
                    $domainModule = true;
                }
				// 分组
                if (!empty($array))
				{
                    $_GET[C('VAR_GROUP')] = array_pop($array);
                    $domainGroup = true;
                }
				// 参数
                if (isset($rule[1]))
				{
                    parse_str($rule[1], $parms);
                    $_GET = array_merge($_GET, $parms);
                }
            }
        }
		
        // 获取PATHINFO信息
        if (empty($_SERVER['PATH_INFO']))
		{
            $types = explode(',', C('URL_PATHINFO_FETCH'));
            foreach ($types as $type)
			{
				// 支持自定义函数判断
                if (0 === strpos($type, ':'))
				{
                    $_SERVER['PATH_INFO'] = call_user_func(substr($type, 1));
                    break;
                }
				// 默认
				elseif (!empty($_SERVER[$type]))
				{
                    $_SERVER['PATH_INFO'] = (0 === strpos($_SERVER[$type], $_SERVER['SCRIPT_NAME'])) ? substr($_SERVER[$type], strlen($_SERVER['SCRIPT_NAME'])) : $_SERVER[$type];
                    break;
                }
            }
        }
		
		// 将PathInfo中的参数解析出并放置到$_GET中
        $depr = C('URL_PATHINFO_DEPR');
        if (!empty($_SERVER['PATH_INFO']))
		{
            tag('path_info');
            $part = pathinfo($_SERVER['PATH_INFO']);
            define('__EXT__', isset($part['extension']) ? strtolower($part['extension']) : '');
            
			// 去除文件后缀
			if (C('URL_HTML_SUFFIX'))	// 如果设置了URL伪静态后缀
			{
                $_SERVER['PATH_INFO'] = preg_replace('/\.('.trim(C('URL_HTML_SUFFIX'),'.').')$/i', '', $_SERVER['PATH_INFO']);
            }
			elseif (__EXT__)			// 如果获取到了访问文件的后缀信息
			{
                $_SERVER['PATH_INFO'] = preg_replace('/.'.__EXT__.'$/i', '', $_SERVER['PATH_INFO']);
            }
			
			// 检测路由规则，如果没有则按默认规则调度URL
            if (!self::routerCheck())
			{
                $paths = explode($depr, trim($_SERVER['PATH_INFO'], '/'));
                if (C('VAR_URL_PARAMS'))
				{
                    // 直接通过$_GET['_URL_'][1] $_GET['_URL_'][2] 获取URL参数 方便不用路由时参数获取
                    $_GET[C('VAR_URL_PARAMS')] = $paths;
                }
				
                $var = array();
				
                // 获取要访问的分组
				if (C('APP_GROUP_LIST') && !isset($_GET[C('VAR_GROUP')]))
				{
                    $var[C('VAR_GROUP')] = in_array(strtolower($paths[0]), explode(',', strtolower(C('APP_GROUP_LIST')))) ? array_shift($paths) : '';
                    
					// 如果设置了禁止访问的分组列表，则检查当前访问的分组是否是被禁止的
                    if (C('APP_GROUP_DENY') && in_array(strtolower($var[C('VAR_GROUP')]), explode(',', strtolower(C('APP_GROUP_DENY')))))
					{
                        exit;
                    }
                }
				
				// 获取要访问的模块
                if (!isset($_GET[C('VAR_MODULE')]))
				{
                    $var[C('VAR_MODULE')] = array_shift($paths);
                }
				
				// 获取要访问的动作
                $var[C('VAR_ACTION')] = array_shift($paths);
                
				// 解析剩余的URL参数
                preg_replace('@(\w+)\/([^\/]+)@e', '$var[\'\\1\']=strip_tags(\'\\2\');', implode('/', $paths));
				
				// 将从PATHINFO中解析出的参数放置$_GET
                $_GET = array_merge($var, $_GET);
            }
            define('__INFO__',$_SERVER['PATH_INFO']);
        }

        // 获取要访问的页面，例如 "/index.html"
        define('__SELF__', strip_tags($_SERVER['REQUEST_URI']));
		
        // 获取当前项目地址
        define('__APP__', strip_tags(PHP_FILE));

        // 获取分组名和分组URL地址
        if (C('APP_GROUP_LIST'))
		{
            define('GROUP_NAME', self::getGroup(C('VAR_GROUP')));
            define('__GROUP__', (!empty($domainGroup) || strtolower(GROUP_NAME) == strtolower(C('DEFAULT_GROUP'))) ? __APP__ : __APP__.'/'.GROUP_NAME);
        }
        
        // 获取项目基础加载路径（MVC所在路径）
        define('BASE_APP_PATH', (defined('GROUP_NAME') && C('APP_GROUP_MODE') == 1) ? PRO_PATH.C('APP_GROUP_PATH').'/'.GROUP_NAME.'/' : APP_PATH);
        if (defined('GROUP_NAME'))
		{
			// 获取conf和common目录的路径
            if (1 == C('APP_GROUP_MODE'))	// 独立分组模式
			{
                $config_path = BASE_APP_PATH.'conf/';
                $common_path = BASE_APP_PATH.'common/';
            }
			else							// 普通分组模式
			{
                $config_path = CONF_PATH.GROUP_NAME.'/';
                $common_path = COMMON_PATH.GROUP_NAME.'/';
            }
			
            // 加载分组配置文件
            if (is_file($config_path.'config.php'))
                C(include $config_path.'config.php');

            // 加载分组别名定义
            if (is_file($config_path.'alias.php'))
                alias_import(include $config_path.'alias.php');

            // 加载分组函数文件
            if(is_file($common_path.'function.php'))
                include $common_path.'function.php';
        }
		
		// 获取模块名和动作名
        define('MODULE_NAME', self::getModule(C('VAR_MODULE')));
        define('ACTION_NAME', self::getAction(C('VAR_ACTION')));
        
        // 当前模块和分组地址
        $moduleName = defined('MODULE_ALIAS') ? MODULE_ALIAS : MODULE_NAME;
		if (defined('GROUP_NAME'))
		{
            define('__URL__', !empty($domainModule) ? __GROUP__.$depr : __GROUP__.$depr.$moduleName);
        }
		else
		{
            define('__URL__',!empty($domainModule)?__APP__.'/' : __APP__.'/'.$moduleName);
        }
		
        // 当前操作地址(eg: /tiaozao/htm/Index/index -- /tiaozao/htm/模块名/动作名)
        define('__ACTION__', __URL__.$depr.(defined('ACTION_ALIAS') ? ACTION_ALIAS : ACTION_NAME));
		
		//保证$_REQUEST正常取值
        $_REQUEST = array_merge($_POST, $_GET);
    }

    /**
     * 路由检测
     * @access public
     * @return void
     */
    static public function routerCheck()
	{
        $return = false;
        // 路由检测标签
        tag('route_check', $return);
        return $return;
    }

    /**
     * 获得实际的模块名称
     * @access private
     * @return string
     */
    static private function getModule($var)
	{
        $module = (!empty($_GET[$var]) ? $_GET[$var] : C('DEFAULT_MODULE'));
        unset($_GET[$var]);
        if ($maps = C('URL_MODULE_MAP'))
		{
            if (isset($maps[strtolower($module)]))
			{
                // 记录当前别名
                define('MODULE_ALIAS', strtolower($module));
				
                // 获取实际的模块名
                return $maps[MODULE_ALIAS];
            }
			elseif (array_search(strtolower($module), $maps))
			{
                // 禁止直接访问实际操作名
                return   '';
            }
        }
        if (C('URL_CASE_INSENSITIVE'))
		{
            // URL地址不区分大小写
            // 智能识别方式 index.php/user_type/index/ 识别到 UserTypeAction 模块
            // $module = ucfirst(parse_name($module, 1));	mod by hywang 2013/3/22
            $module = parse_name($module, 1);
        }
        return strip_tags($module);
    }

    /**
     * 获得实际的操作名称
     * @access private
     * @return string
     */
    static private function getAction($var)
	{
        $action = !empty($_POST[$var]) ? $_POST[$var] : (!empty($_GET[$var]) ? $_GET[$var] : C('DEFAULT_ACTION'));
        unset($_POST[$var], $_GET[$var]);
        if ($maps = C('URL_ACTION_MAP'))
		{
            if (isset($maps[strtolower(MODULE_NAME)]))
			{
                $maps = $maps[strtolower(MODULE_NAME)];		// 键为别名，值为实际操作名
                if (isset($maps[strtolower($action)]))
				{
                    // 记录当前别名
                    define('ACTION_ALIAS', strtolower($action));
					
                    // 获取实际的操作名
                    return $maps[ACTION_ALIAS];
                }
				elseif (array_search(strtolower($action), $maps))
				{
                    // 禁止直接访问实际操作名
                    return '';
                }
            }
        }        
        return strip_tags(C('URL_CASE_INSENSITIVE') ? strtolower($action) : $action);
    }

    /**
     * 获得实际的分组名称
     * @access private
     * @return string
     */
    static private function getGroup($var)
	{
        $group = (!empty($_GET[$var]) ? $_GET[$var] : C('DEFAULT_GROUP'));
        unset($_GET[$var]);
        // return strip_tags(C('URL_CASE_INSENSITIVE') ? ucfirst(strtolower($group)) : $group);		mod by hywang 2013/3/22
        return strip_tags(C('URL_CASE_INSENSITIVE') ? strtolower($group) : $group);
    }

}