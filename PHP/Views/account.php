<html>

<head>

<link rel="stylesheet" href="../../Libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../../Libraries/jquery-3.1.1.js"></script>
<script src="../../Libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</head>

<body>
<?php
require_once("../Controllers/print_menu.php");
session_start();
print_menu();
?>

<br>
<div class='container-fluid'>
<div class='row'>
<div class='col-sm-3'><h3>User: *need to add session*</h3></div>
<div class='col-sm-3'><h3>Email: <?php echo $_SESSION['email'];?></h3></div>
<div class='col-sm-3'></div>
<div><a class='col-sm-3 btn btn-primary' href='../Controllers/logout.php'>Logout</a></div>
</div>
</div>

</body>


</html>
