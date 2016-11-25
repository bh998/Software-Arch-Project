<?php

$db = new mysqli("localhost", "root", "Rawrlion234", "myDB");

if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";

$sql = "drop table Users";
$db->query($sql);

$sql = "Create table Users (id INT auto_increment primary key, user_name varchar(30), email varchar(30), password varchar(64))";
if($db->query($sql) === TRUE){
    echo "Success";
}
else{
    echo $db->error;
}
$db->close();

?>
