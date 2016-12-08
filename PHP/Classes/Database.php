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
    }

    public function close(){
	$this->db->close();

	if($this->db->error){
	    echo "Closing database failed.";
	}
    }


    public function send_query($query){
	$result = $this->db->query($query);
	
	if($this->db->error){
    	    echo $this->db->error;
	    return false;
	}
	else{
	    return $result;
	}
    }

    public function get_user($email){
	$query = "Select * from Users where email = '" . $email . "'";
	$result = $this->send_query($query);
	$row = $result->fetch_row();
	$array = array("id" => $row[0], "user" => $row[1], "email" => $row[2], "balance" => $row[4], "pandl" => $row[5]);
	return $array;
    }

    public function get_funds($id){
	$query = "Select balance from Users where id = " . $id;
	$result = $this->send_query($query);
	$row = $result->fetch_row();
	$array = array("balance" => $row[0]);
	return $array;
    }

    public function add_funds($id, $amount){
	$query = "Update Users Set balance=" . $amount . " where id = " . $id;
	$result = $this->send_query($query);
    }
}


?>
