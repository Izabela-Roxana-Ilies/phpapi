<?php
class MysqlConnector {
    public $host = "";
    public $user = "";
    public $pass = "";
    public $dbname = "";

    private $link = null;

    private $results = array();

    private $queryErrors = array();

    public function __construct($host, $user, $pass, $dbname = ""){
        $this->link = mysql_connect($host, $user, $pass)or die("no db connection. Sorry");
        if($dbname != ""){
           mysql_select_db($dbname, $this->link);
        }
    }
    public function  __destruct() {
        @mysql_close($this->link);
    }

    public function InsertID(){
        return mysql_insert_id($this->link);
    }
    
    public function query($query){
    	$microtime_start = microtime(true);
        $res = mysql_query($query, $this->link);// or die(mysql_error()." #".$query);
        $microtime_end = microtime(true);
		$exec_time = $microtime_end - $microtime_start;
        array_push($this->results, $res);
		$error = mysql_error($this->link);
		if($error != ""){
			
		}
		array_push($this->queryErrors, array($query, $error));
        return $this->results[count($this->results)-1];
    }

    public function fetchRow($result = null){
        if(!$result){
            $result = $this->results[count($this->results)-1];
        }
        return mysql_fetch_assoc($result);
    }
    public function prepInput($val){
        return mysql_real_escape_string($val, $this->link);
    }
    public function fetchAll($result = null){
        if(!$result){
            $result = $this->results[count($this->results)-1];
        }
        $fetch = array();
        while($line = mysql_fetch_assoc($result)){
            array_push($fetch, $line);
        }
        return $fetch;
    }
    public function resetFetchRow($result = null){
        if(!$result){
            $result = $this->results[count($this->results)-1];
        }
        mysql_data_seek($result, 0);
        return $result;
    }
	public function affectedRows(){
		return mysql_affected_rows($this->link);
	}
    public function fetchHistoryRow($idx = -1){
        $result = null;
        if($idx < 0 || $idx > (count($this->results)-1)){
            $result = $this->results[count($this->results)-1];
        }else{
            $result = $this->results[$idx];
        }
        return mysql_fetch_assoc($result);
    }
    public function resetFetchHistoryRow($idx = -1){
        $result = null;
        if($idx < 0 || $idx > (count($this->results)-1)){
            $result = $this->results[count($this->results)-1];
        }else{
            $result = $this->results[$idx];
        }

        mysql_data_seek($result, 0);
        return $result;
    }
    public function numberOfRows($idx = -1){
          $result = null;
        if($idx < 0 || $idx > (count($this->results)-1)){
            $result = $this->results[count($this->results)-1];
        }else{
            $result = $this->results[$idx];
        }
        return mysql_num_rows($result);
    }
}
?>