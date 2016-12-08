<?php

$db = new mysqli("localhost", "root", "ab1234", "myDB");

if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully\n";

$sql = "drop table Users, Stocks";
$db->query($sql);

$sql = "Create table Users (id INT auto_increment primary key, user_name varchar(30), email varchar(30), password varchar(64), balance float, pandl float)";
if($db->query($sql) === TRUE){
    echo "Successfully Created Table Users\n";
}
else{
    echo $db->error;
}

$sql = "Create table Stocks (id INT auto_increment primary key, name varchar(20), user_id int, amount int, price float)";
if($db->query($sql) === TRUE){
    echo "Successfully Created Table Stocks\n";
}
else{
    echo $db->error;
}

$sql = "Insert into Users values (null, 'Brandon', 'bray4168@yahoo.com', SHA('hello'), 500.00, 0)";
if($db->query($sql) === TRUE){
    echo "Successfully added the user\n";
}
else{
    echo $db->error;
}

$db->close();

?>
