<html>

<head>

<link rel="stylesheet" href="../../Libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../../Libraries/jquery-3.1.1.js"></script>
<script src="../../Libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

</head>

<body>
<?php
require_once("../Controllers/print_menu.php");
require_once("../Classes/Database.php");
session_start();
print_menu();

$database = new Database();
$database->open();
$user_info = $database->get_user($_SESSION['email']);
$database->close();
?>

<br>
<div class='container-fluid'>
<div class='row'>
<div class='col-sm-2'><h4>User: <?php echo $user_info[user];?></h4></div>
<div class='col-sm-3'><h4>Email: <?php echo $user_info[email];?></h4></div>
<div class='col-sm-4'></div>
<div><a class='col-sm-3 btn btn-primary' href='../Controllers/logout.php'>Logout</a></div>
</div>
<div class='row'>
<div class='col-sm-2'><h4>Balance: $<?php echo $user_info[balance];?></h4></div>
<div class='col-sm-2'><h4>P&L: <?php echo $user_info[pandl];?></h4></div>
</div>
<div class='row'>
<div class='col-sm-2'>
<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#addFunds'>Add Funds</button>

<div id='addFunds' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Add Funds</h4>
      </div>
      <div class='modal-body'>	
        <form class='form-horizontal' name='add' method='POST' action='../Controllers/add_funds.php'>
	<div class='form-group'>
	  <input name='amount' type='text' class='form-control' placeholder='Add Funds: (i.e. 100.00)'/>
	</div>
	<div class='form-group'>
	  <input type='hidden' name='id' value='<?php echo $user_info[id];?>'>
	</div>
	<div class='form-group'>
          <button type='submit' class='btn btn-primary'>Add</button>
	</div>
	</form>
      </div>
    </div>
  </div>
</div>

</div>
</div>
</div>

</body>


</html>
