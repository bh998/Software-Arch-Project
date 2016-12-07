<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$db = new mysqli("localhost", "root", "ab1234", "myDB");

if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";


$sql = "Insert into Users values (null, '" . $username . "', '" . $email . "', SHA('" . $password . "'))";
$db->query($sql);

if($db->error){
    echo $db->error;
    $db->close();
}
else{
    echo "Success";
    $db->close();
    header("Location: ../../index.html");
    exit();
}

?>
