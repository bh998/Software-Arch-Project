<?php
require_once('../Classes/Database.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$database = new Database();
$database->open();


$sql = "Insert into Users values (null, '" . $username . "', '" . $email . "', SHA('" . $password . "'))";
$database->send_query($sql);

$database->close();


header("Location: ../../index.html");
exit();

?>
