<?php
class DBLink{
	private $db_user;
	private $db_pass;
	private $db_name;
	private $db_host;
	private $link;
	private $result;
	private $successful;
	private $error;
	public $lastInsertID;
	public $updatedRows;
	public function __construct($db_host = "localhost",$db_user = "", $db_pass = "",$db_name = ""){
		$this->db_user = $db_user;
		$this->db_name = $db_name;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
		$this->successful = false;
		$this->error = array();
		$this->connect();
	}
	private function connect(){
		$this->link = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
		if($this->link && $this->db_name != ""){
			mysql_select_db($this->db_name,$this->link);
		}else{
			$this->successful = false;
			$this->error = array("query"=>"","text"=>"unable to connect","number"=>"1000001");
		}
	}
	public function getLink(){
		return $this->link;
	}
	public function query($query_string){
		$this->successful = false;
		$this->error = array();
		$this->result = mysql_query($query_string, $this->link);
		if(mysql_errno($this->link) == 0){
			$this->successful = true;
			return $this->result;
		}else{
			$this->successful = false;
			$this->error["query"] = $query_string;
			$this->error["number"] = mysql_errno($this->link);
			return null;
		}
	}
	public function numberOfSelectedRows(){
		if($this->successful){
			return mysql_num_rows($this->result);
		}
		return false;
	}
	public function prepInput($val){
		return mysql_real_escape_string($val, $this->link);
	}
	public function fetchOne(){
		if($this->successful){
			return mysql_fetch_assoc($this->result);
		}else{
			return false;
		}
	}
	public function insert($table_name, $fields_and_values){
		$fields = "";
		$values = "";
		foreach($fields_and_values as $key=>$value){
			if($fields == ""){
				$fields .= "`".$this->prepInput($key)."`";
				$values .= "'".$this->prepInput($value)."'";
			}else{
				$fields .= ",`".$this->prepInput($key)."`";
				$values .= ",'".$this->prepInput($value)."'";
			}
		}
		$this->query("INSERT INTO `".$this->db_name."`.`".$table_name."` (".$fields.") VALUES (".$values.")");
		if($this->successful){
			$this->lastInsertID = mysql_insert_id($this->link);
			return $this->lastInsertID;
		}
		return "0";
	}
	public function update($table_name, $fields_and_values, $where_clause = "1=1"){
		$fields_update = "";
		foreach($fields_and_values as $key=>$value){
			$key = $this->prepInput($key);
			$value = $this->prepInput($value);
			if($fields_update == ""){
				$fields_update .= "`{$key}` = '{$value}'";
			}else{
				$fields_update .= ",`{$key}` = '{$value}'";
			}
		}
		$this->query("UPDATE  `".$this->db_name."`.`".$table_name."` SET ".$fields_update." WHERE ".$where_clause);
		if($this->successful){
			return $this->updatedRows = mysql_affected_rows($this->link);
		}else{
			return false;
		}
	}
}

?>