<?php
$db = new mysqli("localhost", "root", "Rawrlion234", "myDB");

if($db->connect_error){
die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully";

$sql = "Select id from Users where user_name = '".$_POST['username']."' and password = SHA('".$_POST['password']."')";

$result = $db->query($sql);

if($result->num_rows == 0){
    echo $db->error;
    $db->close();
    header("Location: ../../index.html");
    exit();
}
else{
    echo "Success";
    $db->close();
    session_start();
    $_SESSION['username'] = $_POST['username'];
    header("Location: ../Views/homepage.php");
    exit();
}

?>

