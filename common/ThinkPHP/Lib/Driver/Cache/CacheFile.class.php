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

defined('THINK_PATH') or exit();
/**
 * 文件类型缓存类
 * @category   Think
 * @package  Think
 * @subpackage  Driver.Cache
 * @author    liu21st <liu21st@gmail.com>
 */
class CacheFile extends Cache {

    /**
     * 架构函数
     * @access public
     */
    public function __construct($options = array())
	{
        if(!empty($options))
		{
            $this->options = $options;
        }
        $this->options['temp'] = !empty($options['temp']) ? $options['temp'] : C('DATA_CACHE_PATH');
        $this->options['prefix'] = isset($options['prefix']) ? $options['prefix'] : C('DATA_CACHE_PREFIX');
        $this->options['expire'] = isset($options['expire']) ? $options['expire'] : C('DATA_CACHE_TIME');
        $this->options['length'] = isset($options['length']) ? $options['length'] : 0;
        if (substr($this->options['temp'], -1) != '/')
			$this->options['temp'] .= '/';
        $this->init();
    }

    /**
     * 初始化检查
     * @access private
     * @return boolen
     */
    private function init()
	{
        $stat = stat($this->options['temp']);
        $dir_perms = $stat['mode'] & 0007777;	// Get the permission bits.
        $file_perms = $dir_perms & 0000666; 	// Remove execute bits for files.

        // 创建项目缓存目录
        if (!is_dir($this->options['temp']))
		{
            if (!mkdir($this->options['temp']))
                return false;

            chmod($this->options['temp'], $dir_perms);
        }
    }

    /**
     * 取得变量的存储文件名
     * @access private
     * @param string $name 缓存变量名
     * @return string
     */
    private function filename($name)
	{
        $name =	md5($name);
        // 使用子目录
        if (C('DATA_CACHE_SUBDIR'))
		{
            $dir ='';
            for ($i = 0; $i < C('DATA_PATH_LEVEL'); $i++)
			{
                $dir .=	$name{$i}.'/';
            }
            if (!is_dir($this->options['temp'].$dir))
			{
                mkdir($this->options['temp'].$dir, 0755, true);
            }
            $filename =	$dir.$this->options['prefix'].$name.'.php';
        }
		// 不适用子目录
		else
		{
            $filename =	$this->options['prefix'].$name.'.php';
        }
		
        return $this->options['temp'].$filename;
    }

    /**
     * 读取缓存
     * @access public
     * @param string $name 缓存变量名
     * @return mixed
     */
    public function get($name)
	{
        $filename = $this->filename($name);
        if (!is_file($filename))
		{
           return false;
        }
		
        N('cache_read', 1);
        $content = file_get_contents($filename);
        if (false !== $content)
		{
            // 判断缓存是否过期，如果过期则删除缓存文件
            $expire = (int) substr($content, 8, 12);
            if ($expire != 0 && time() > filemtime($filename) + $expire)
			{
                unlink($filename);
                return false;
            }
			
			// 如果开启了数据校验
            if (C('DATA_CACHE_CHECK'))
			{
                $check = substr($content, 20, 32);
                $content = substr($content, 52, -3);
				if ($check != md5($content))
				{
                    return false;
                }
            }
			else
			{
            	$content = substr($content, 20, -3);
            }
			
			// 如果启用了数据压缩
            if (C('DATA_CACHE_COMPRESS') && function_exists('gzcompress'))
			{
                $content = gzuncompress($content);
            }
			
            $content = unserialize($content);
            return $content;
        }
        else
		{
            return false;
        }
    }

    /**
     * 写入缓存
     * @access public
     * @param string $name 	缓存变量名
     * @param mixed $value  存储数据
     * @param int $expire  	有效时间 0为永久
     * @return boolen
     */
    public function set($name, $value, $expire = null)
	{
        N('cache_write', 1);
        if (is_null($expire))
		{
            $expire = $this->options['expire'];
        }
        $filename = $this->filename($name);
        $data = serialize($value);
		
		// 如果启用了数据压缩
        if (C('DATA_CACHE_COMPRESS') && function_exists('gzcompress'))
		{
            $data = gzcompress($data, 3);
        }
		
		// 如果开启了数据校验
        if (C('DATA_CACHE_CHECK'))
		{
            $check = md5($data);
        }
		else
		{
            $check = '';
        }
		
        $data = "<?php\n//".sprintf('%012d',$expire).$check.$data."\n?>";
        $result = file_put_contents($filename, $data);
        if ($result)
		{
            if ($this->options['length'] > 0)
			{
                // 记录到缓存队列
                $this->queue($name);
            }
            clearstatcache();
            return true;
        }
		else
		{
            return false;
        }
    }

    /**
     * 删除缓存
     * @access public
     * @param string $name 缓存变量名
     * @return boolen
     */
    public function rm($name)
	{
        return unlink($this->filename($name));
    }

    /**
     * 清除缓存
     * @access public
     * @param string $name 缓存变量名
     * @return boolen
     */
    public function clear()
	{
        $path = $this->options['temp'];
        if ($dir = opendir($path))
		{
            while ($file = readdir($dir))
			{
                $check = is_dir($file);
                if (!$check)
                    unlink($path . $file);
            }
            closedir($dir);
            return true;
        }
    }
}