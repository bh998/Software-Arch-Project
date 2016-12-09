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

    public function get_stocks($id){
	$query = "Select * from Stocks where user_id = $id";
	$result = $this->send_query($query);
	$stocks = array();
	while($row = $result->fetch_row()){
	  $array = array("id" => $row[0], "name" => $row[1], "amount" => $row[3], "price" => $row[4]);
	  array_push($stocks, $array);
	}
	return $stocks;
    }

    public function get_funds($id){
	$query = "Select balance from Users where id = " . $id;
	$result = $this->send_query($query);
	$row = $result->fetch_row();
	$array = array("balance" => $row[0]);
	return $array;
    }

    public function set_funds($id, $amount){
	$query = "Update Users Set balance=" . $amount . " where id = " . $id;
	$result = $this->send_query($query);
    }

    public function buy_stock($id, $stock, $amount, $price){
	$query = "Insert into Stocks values (null, '$stock', $id, $amount, $price)";
	$result = $this->send_query($query);
    }

    public function sell_stock($stock_id){
	$query = "Delete From Stocks where id = " . $stock_id;
	$result = $this->send_query($query);
    }

    public function update_stock($stock_id, $amount){
	$query = "Update Stocks Set amount=" . $amount . " where id = " . $stock_id;
	$result = $this->send_query($query);
	echo "$query";
    }

    public function get_stock($stock_id){
	$query = "Select * from Stocks where id = " . $stock_id;
	$result = $this->send_query($query);
	$row = $result->fetch_row();
	$array = array("id" => $row[0], "name" => $row[1], "amount" => $row[3], "price" => $row[4]);
	return $array;
    }

    public function insert_transaction($type, $user_id, $stock, $amount, $price){
        $query = "Insert into Transactions values (null, '$type', '$user_id', '$stock', $amount, $price)";
	$result = $this->send_query($query);
    }

    public function get_transactions($id){
	$query = "Select * from Transactions where user_id = $id";
	$result = $this->send_query($query);
	$transactions = array();
	while($row = $result->fetch_row()){
	  $array = array("id" => $row[0], "type" => $row[1], "stock" => $row[3], "amount" => $row[4], "price" => $row[5]);
	  array_push($transactions, $array);
	}
	return $transactions;
    }
}


?>
