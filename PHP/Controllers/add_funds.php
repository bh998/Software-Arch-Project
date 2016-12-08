<?php

require_once("../Classes/Database.php");

$database = new Database();
$database->open();

$array = $database->get_funds($_POST['id']);
$funds = $array[balance] + $_POST['amount'];
$database->set_funds($_POST['id'], $funds);

$database->close();

header("Location: ../Views/account.php");
exit();

?>
