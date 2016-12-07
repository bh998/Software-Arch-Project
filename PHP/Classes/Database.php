<?php

class Database {

    var $host = "localhost";
    var $user = "root";
    var $pass = "ab1234";
    var $database = "myDB";
    var $db;

    public function open(){
	$this->db = new mysqli($this->host, $this->user, $this->pass, $this->database);

	if($this->db->connect_error){
    	    die("Connection failed: " . $this->db->connect_error);
	}
	echo "Connected successfully";
    }

    public function close(){
	$this->db->close();

	if($this->db->error){
	    echo "Closing database failed.";
	}
	echo "Closed Successfully";
    }


    public function send_query($query){
	$result = $this->db->query($query);
	
	if($this->db->error){
    	    echo $this->db->error;
	    return false;
	}
	else{
    	    echo "Success";
	    return $result;
	}
    }
}


?>
