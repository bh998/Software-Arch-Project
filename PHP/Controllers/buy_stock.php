<!DOCTYPE html>
<html>
<body>

<?php

require_once("../Classes/Database.php");

$database = new Database();
$database->open();

$funds = $database->get_funds($_POST['id']);

$cost = $_POST['amount'] * $_POST['price'];
$leftover = $funds[balance] - $cost;
if($cost > $funds[balance]){
    echo "<h3>Sorry!<h3>";
    echo "<h4>Not Enough Funds to Purchase Stock.<h4>";
    echo "<a href='../Views/stocks.php'>Click to look at other stocks</a>";
}
else{
    $database->set_funds($_POST['id'], $leftover);
    $database->buy_stock($_POST['id'], $_POST['stock'], $_POST['amount'], $_POST['price']);
    $database->close();
    header("Location: ../Views/account.php");
    exit();
}

$database->close();

?>

</body>
</html>
