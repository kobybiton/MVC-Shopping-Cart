<?php

class DataBase{

    protected $host = 'localhost';
    protected $port = '5432';
    protected $dbname = 'ebay';
    protected $user = 'postgres';
    protected $password = 'koby9385';
    protected static $instance;

	public function __construct(){

		$this->db = pg_connect("host=$this->host port=$this->port dbname=$this->dbname user=$this->user password=$this->password") 
		or die("Could not connect") or die('Could not connect'); 		
	    $this->status = pg_connection_status($this->db);
	    if ($this->status === PGSQL_CONNECTION_OK){ 	
	        
	        //echo 'connected';
		} 
		else{
		    echo 'Connection status bad';
		} 	    

	}

	public function getInstance(){
		if(is_null(self::$instance)){
			self::$instance = new self;
		}
		return self::$instance;
	}

	public function connect(){
		return $this->db;
	} 
}



