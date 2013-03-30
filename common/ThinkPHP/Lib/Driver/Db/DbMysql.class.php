<?php
class DbMysql extends Db
{
    /**
     * ���캯�� ע�����ݿ�������Ϣ
     * @access public
     * @param array $config ���ݿ�������Ϣ����
     */
    public function __construct($config='')
	{
        if (!extension_loaded('mysql'))
		{
            throw_exception(L('_NOT_SUPPERT_').':mysql');
        }
		
        if(!empty($config))
		{
            $this->config = $config;
            if(empty($this->config['params']))
			{
                $this->config['params'] = '';
            }
        }
    }
	
    /**
     * �������ݿ�
     * @access public
     * @throws Execption
     */
    public function connect($config='', $linkNum=0, $force=false)
	{
        if (!isset($this->linkID[$linkNum]))
		{
			$config = empty($config) ? $this->config : $config;
			if (empty($config))
				throw_exception(L('_NO_DB_CONFIG_'));
			if (!is_array($config))
				throw_exception(L('_DB_CONFIG_NOT_ARRAY_'));
			
            // �������˿ںŵ�socket�������
            $host = $config['hostname'].($config['hostport'] ? ":{$config['hostport']}" : '');
			
			// �������ݿ�
            $pconnect = !empty($config['params']['persist']) ? $config['params']['persist'] : $this->pconnect;
            if($pconnect)
			{
                $this->linkID[$linkNum] = mysql_pconnect($host, $config['username'], $config['password'], 131072);	// ���һ��������ʾ����ʹ�ô洢����
            }else{
                $this->linkID[$linkNum] = mysql_connect($host, $config['username'], $config['password'], true, 131072);
            }
			
			// ������ӻ���ѡ�����ݿ�ʧ�����׳��쳣
            if (!$this->linkID[$linkNum] || (!empty($config['database']) && !mysql_select_db($config['database'], $this->linkID[$linkNum])))
			{
                throw_exception(mysql_error());
            }
			
            mysql_query("SET NAMES '".C('DB_CHARSET')."'", $this->linkID[$linkNum]);
			
            //���� sql_model
            $dbVersion = mysql_get_server_info($this->linkID[$linkNum]);
            if($dbVersion >'5.0.1')
			{
                mysql_query("SET sql_mode=''", $this->linkID[$linkNum]);
            }
			
            // ������ӳɹ�
            $this->connected = true;
			
            // ������ݿ�Ĳ���ʽ��Ϊ�ֲ�ʽ�������Ļ������ӳɹ������ݿ�������Ϣ����
            if(1 != C('DB_DEPLOY_TYPE'))
				unset($this->config);
        }
		
        return $this->linkID[$linkNum];
    }
	
    /**
     * �ͷŲ�ѯ���
     * @access public
     */
    public function free()
	{
        mysql_free_result($this->queryID);
        $this->queryID = null;
    }
	
    /**
     * ִ��SELECT��ѯ���
     * @access public
     * @param string $str
     * @return mixed	�ɹ����ؽ������ʧ�ܷ���false
     */
    public function query($str)
	{
		// �洢���̲�ѯ֧��
        if (0 === stripos($str, 'call'))
		{
            $this->close();
        }
		
        $this->initConnect(false);
        if (!$this->_linkID)
			return false;
        
		// ��¼��ǰ��sqlָ��
		$this->queryStr = $str;
		
        // �ͷ�ǰ�εĲ�ѯ���
        if ($this->queryID)
			$this->free();
        
		// ��¼��ѯ����
		N('db_query',1);
		
        // ��¼��ʼִ��ʱ��
        G('queryStartTime');
		
        $this->queryID = mysql_query($str, $this->_linkID);
        $this->debug();
		
        if (false === $this->queryID)
		{
            $this->error();
            return false;
        }
		else
		{
            $this->numRows = mysql_num_rows($this->queryID);
            return $this->getAll();
        }
    }
	
    /**
     * ִ�и��£�UPDATE��INSERT��DELETE�����
     * @access public
     * @param string $str  sql���
     * @return integer|false
     */
    public function execute($str)
	{
        $this->initConnect(true);
        if (!$this->_linkID)
			return false;
		
		// ��¼��ǰ��sqlָ��
        $this->queryStr = $str;
		
        //�ͷ�ǰ�εĲ�ѯ���
        if ($this->queryID)
			$this->free();
		
		// ��¼���²����Ĵ���
        N('db_write',1);
		
        // ��¼��ʼִ��ʱ��
        G('queryStartTime');
		
        $result = mysql_query($str, $this->_linkID);
        $this->debug();
		
        if (false === $result)
		{
            $this->error();
            return false;
        }
		else
		{
            $this->numRows = mysql_affected_rows($this->_linkID);
            $this->lastInsID = mysql_insert_id($this->_linkID);
            return $this->numRows;
        }
    }
	
    /**
     * ��������
     * @access public
     * @return void
     */
    public function startTrans()
	{
        $this->initConnect(true);
        if (!$this->_linkID)
			return false;
        
		//����rollback֧��
        if ($this->transTimes == 0) {
            mysql_query('START TRANSACTION', $this->_linkID);
        }
        $this->transTimes++;
		
        return ;
    }
	
    /**
     * ���ڷ��Զ��ύ״̬����������ύ
     * @access public
     * @return boolen
     */
    public function commit()
	{
        if ($this->transTimes > 0)
		{
            $result = mysql_query('COMMIT', $this->_linkID);
            $this->transTimes = 0;
            if(!$result)
			{
                $this->error();
                return false;
            }
        }
		
        return true;
    }
	
    /**
     * ����ع�
     * @access public
     * @return boolen
     */
    public function rollback()
	{
        if ($this->transTimes > 0)
		{
            $result = mysql_query('ROLLBACK', $this->_linkID);
            $this->transTimes = 0;
            if(!$result)
			{
                $this->error();
                return false;
            }
        }
		
        return true;
    }
	
    /**
     * ������еĲ�ѯ����
     * @access private
     * @return array
     */
    private function getAll() {
        //�������ݼ�
        $result = array();
        if($this->numRows >0)
		{
            while($row = mysql_fetch_assoc($this->queryID))
			{
                $result[]   =   $row;
            }
            mysql_data_seek($this->queryID,0);
        }
		
        return $result;
    }
	
    /**
     * ȡ�����ݱ���ֶ���Ϣ
     * @access public
     * @return array
     */
    public function getFields($tableName)
	{
        $result = $this->query('SHOW COLUMNS FROM '.$this->parseKey($tableName));
        $info = array();
        if($result)
		{
            foreach ($result as $key => $val)
			{
                $info[$val['Field']] = array(
                    'name'    => $val['Field'],
                    'type'    => $val['Type'],
                    'notnull' => (bool) ($val['Null'] === ''), // not null is empty, null is yes
                    'default' => $val['Default'],
                    'primary' => (strtolower($val['Key']) == 'pri'),
                    'autoinc' => (strtolower($val['Extra']) == 'auto_increment'),
                );
            }
        }
        return $info;
    }
	
    /**
     * ȡ�����ݿ�ı���Ϣ
     * @access public
     * @return array
     */
    public function getTables($dbName='')
	{
        if(!empty($dbName))
		{
           $sql = 'SHOW TABLES FROM '.$dbName;
        }
		else
		{
           $sql = 'SHOW TABLES ';
        }
        $result = $this->query($sql);
		$info = array();
        foreach ($result as $key => $val)
		{
            $info[$key] = current($val);
        }
		
        return $info;
    }
	
    /**
     * �滻��¼
     * @access public
     * @param mixed $data ����
     * @param array $options �������ʽ
     * @return false | integer
     */
    public function replace($data, $options=array())
	{
        foreach ($data as $key=>$val)
		{
            $value = $this->parseValue($val);
            // ���˷Ǳ�������
			if(is_scalar($value))
			{
                $values[] = $value;
                $fields[] = $this->parseKey($key);
            }
        }
        $sql = 'REPLACE INTO '.$this->parseTable($options['table']).' ('.implode(',', $fields).') VALUES ('.implode(',', $values).')';
        
		return $this->execute($sql);
    }
	
    /**
     * ���������¼
     * @access public
     * @param mixed $datas ����
     * @param array $options �������ʽ
     * @param boolean $replace �Ƿ�replace
     * @return false | integer
     */
    public function insertAll($datas, $options = array(), $replace = false)
	{
        if(!is_array($datas[0]))
			return false;
		
		// ����
        $fields = array_keys($datas[0]);
        array_walk($fields, array($this, 'parseKey'));
		
		// ��ֵ������Ϊ���У�
        $values  =  array();
        foreach ($datas as $data)
		{
            $value = array();
            foreach ($data as $key=>$val)
			{
                $val = $this->parseValue($val);
                // ���˷Ǳ�������
				if(is_scalar($val))
				{
                    $value[]   =  $val;
                }
            }
            $values[] = '('.implode(',', $value).')';
        }
		
        $sql = ($replace ? 'REPLACE' : 'INSERT').' INTO '.$this->parseTable($options['table']).' ('.implode(',', $fields).') VALUES '.implode(',',$values);
        return $this->execute($sql);
    }
	
    /**
     * �ֶκͱ����������`
     * @access protected
     * @param string $key
     * @return string
     */
    protected function parseKey(&$key)
	{
        $key = trim($key);
        if(!preg_match('/[,\'\"\*\(\)`.\s]/',$key))
		{
           $key = '`'.$key.'`';
        }
        return $key;
    }
	
    /**
     * SQLָ�ȫ����
     * @access public
     * @param string $str  SQL�ַ���
     * @return string
     */
    public function escapeString($str)
	{
        if($this->_linkID)
		{
            return mysql_real_escape_string($str,$this->_linkID);
        }
		else
		{
            return mysql_escape_string($str);
        }
    }
	
    /**
     * �ر����ݿ�
     * @access public
     * @return void
     */
    public function close()
	{
        if ($this->_linkID)
		{
            mysql_close($this->_linkID);
        }
        $this->_linkID = null;
    }
	
    /**
     * ���ݿ������Ϣ
     * ����ʾ��ǰ��SQL���
     * @access public
     * @return string
     */
    public function error()
	{
        $this->error = mysql_error($this->_linkID);
        if('' != $this->queryStr)
		{
            $this->error .= "\n [ SQL��� ] : ".$this->queryStr;
        }
        trace($this->error,'','ERR');
        
		return $this->error;
    }
} 