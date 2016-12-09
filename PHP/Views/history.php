<!DOCTYPE>
<html>
<head>

<link rel="stylesheet" href="../../Libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../../Libraries/jquery-3.1.1.js"></script>
<script src="../../Libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="../../JS/Classes/Financial_API.js"></script>

</head>

<body>
<?php
session_start();
require_once("../Controllers/print_menu.php");
require_once("../Classes/Database.php");
print_menu();

$database = new Database();
$database->open();
$user_info = $database->get_user($_SESSION['email']);
$transactions = $database->get_transactions($user_info[id]);

$database->close();

echo "<div class='container-fluid'>";
echo "<div class='row'><h3>Past Transactions<h3></div>";
foreach($transactions as $transaction){
  echo "<div class='row'>";
  echo "<div class='col-sm-2'><h4>Type: $transaction[type]<h4></div>";
  echo "<div class='col-sm-2'><h4>Stock: $transaction[stock]<h4></div>";
  echo "<div class='col-sm-2'><h4>Amount: $transaction[amount]<h4></div>";
  echo "<div class='col-sm-2'><h4>Price: \$$transaction[price]<h4></div>";
  echo "</div>";
}
echo "</div>";

?>

</body>
</html>

