<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="../../Libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../../Libraries/jquery-3.1.1.js"></script>
<script src="../../Libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</head>

<body>
<div class="container-fluid">
  <div class="row">
    <h3 class="bg-info text-center">Welcome To Tradier Stock System</h3>
  </div>
  <div class="row">
  <div class="btn-group btn-group-justified">
    <a href="homepage.php" class="btn btn-primary">Home</a>
    <a href="account.php" class="btn btn-primary">Account</a>
  </div>
  </div>
</div>

<br>
<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="financial_api.html">Financial News!</a>
</button><br><br>

<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="email_validator.html">Email Validator!</a>
</button><br><br>

<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="tradier_api.html">Tradier Info!</a>
</button><br><br>

<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="twitter_api.php">Twitter Search!</a>
</button><br><br>

</body>

</html>
