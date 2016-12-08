<?php
require_once("../Classes/Database.php");

$sql = "Select id from Users where email = '".$_POST['email']."' and password = SHA('".$_POST['password']."')";

$database = new Database();
$database->open();

$result = $database->send_query($sql);
$database->close();

if($result->num_rows == 0){
    header("Location: ../../index.html");
    exit();
}
else{
    echo "Success";
    session_start();
    $_SESSION['email'] = $_POST['email'];
    header("Location: ../Views/homepage.php");
    exit();
}

?>

