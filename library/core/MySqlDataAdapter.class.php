<?php
class MySqlDataAdapter
{
    protected $_server, $_username, $_password, $_errorInfo;
    
    /**
    * Db name
    * 
    * @var mixed
    */
    public $dbName;
    
    /**
    * MySQL connection information
    *
    * @var resource
    */
    public $connection;
    
    /**
    * Result of last query
    *
    * @var resource
    */
    protected $_result;
    
    /**
     * Date and time
     *
     */
    const DATETIME = 'Y-m-d H:i:s';
    
    /**
     * Date
     *
     */
    const DATE = 'Y-m-d';
    
    /**
     * Constructor
     *
     * @param string $server MySQL server address
     * @param string $username Database username
     * @param string $password Database password
     * @param string $dbName Database name
     * @param boolean $persistant Is persistant connection
     * @param  boolean $connect_now Connect now
     * @return void
     */              
    public function __construct($server, $username, $password, $dbName, $connect_now = true, $persistent = false, $pdoFlags = false){
        $this->_server   = $server;         // Host address
        $this->_username = $username;       // User
        $this->_password = $password;       // Password
        $this->dbName   = $dbName;          // Database         
       
        if ($connect_now){
            $this->connect($persistent, $pdoFlags);
        }
    }
   

}