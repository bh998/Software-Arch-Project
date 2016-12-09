<!DOCTYPE html>
<html>
<body>

<script src="../../JS/Classes/Tradier_API.js"></script>

<?php

require_once("../Classes/Database.php");

$database = new Database();
$database->open();

$stock = $database->get_stock($_POST['stock_id']);
$funds = $database->get_funds($_POST['id']);

$sell = $_POST['amount'] * $_POST['price'];
$new_fund = $funds[balance] + $sell;
if($stock[amount] < $_POST['amount']){
    echo "<h3>Sorry!<h3>";
    echo "<h4>Not Enough Stocks to Sell.<h4>";
    echo "<a href='../Views/account.php'>Click to return to your account.</a>";
}
else{
    if($stock[amount] > $_POST['amount']){
	$new_amount = $stock[amount] - $_POST['amount']; 
	$database->update_stock($_POST['stock_id'], $new_amount);
    }
    else{
	$database->sell_stock($_POST['stock_id']);
    }
    $database->set_funds($_POST['id'], $new_fund);
    $database->insert_transaction("Sold", $_POST['id'], $stock[name], $_POST['amount'], $_POST['price']);
    $database->close();
    header("Location: ../Views/account.php");
    exit();
}

$database->close();

?>

</body>
</html>
