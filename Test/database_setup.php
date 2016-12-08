<?php

$db = new mysqli("localhost", "root", "ab1234", "myDB");

if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully\n";

$sql = "drop table Users";
$db->query($sql);

$sql = "Create table Users (id INT auto_increment primary key, user_name varchar(30), email varchar(30), password varchar(64), balance float, pandl float)";
if($db->query($sql) === TRUE){
    echo "Successfully Created Table\n";
}
else{
    echo $db->error;
}

$sql = "Insert into Users values (null, 'Brandon', 'bray4168@yahoo.com', SHA('hello'), 0, 0)";
if($db->query($sql) === TRUE){
    echo "Successfully added the user\n";
}
else{
    echo $db->error;
}

$db->close();

?>
