<html>

<head>

<link rel="stylesheet" href="../../Libraries/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<script src="../../Libraries/jquery-3.1.1.js"></script>
<script src="../../Libraries/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

<script src="../../JS/Classes/Tradier_API.js"></script>

</head>

<body> 
<?php
session_start();
require_once("../Classes/Database.php");
$database = new Database();
$database->open();
$user_info = $database->get_user($_SESSION['email']);
$database->close();
?>

<script>
//function that gets the stock data from tradier and adds it to the html
function get_stock(stock){
    
    var tradier = new Tradier_API();
    var obj = tradier.getStock(stock);
    
    document.getElementById('price').innerHTML = "$" + obj.quotes.quote.bid;
    document.getElementById('buy_price').value = obj.quotes.quote.bid;
    document.getElementById('change').innerHTML = "$" + obj.quotes.quote.change;
    document.getElementById('percent').innerHTML = obj.quotes.quote.change_percentage + "%";
    document.getElementById('volume').innerHTML = obj.quotes.quote.volume;
}
</script>

<?php
//prints the main menu of the website
require_once("../Controllers/print_menu.php");
print_menu();

//if the stock has not been searched it presents the search bar
if(is_null($_GET['stock'])){
echo '
	<h4>Find a stock for information and purchasing options.</h4>

	<form action="stocks.php" method="GET">
	<input type="text" name="stock"><br>
	<input type="submit" value="Submit">
	</form>';
}

//checks to see if the stock has been search, if so it displays its info
require_once('../Classes/Twitter_API.php');
if(isset($_GET['stock']) && $_GET['stock'] != null){
    echo "<div class='container-fluid'>";
    echo "<h3>Data for stock: $" . $_GET['stock'] . "</h3>";
    echo "<div class='row'>";
    echo "<div class='col-sm-3'><h4>Price</h4></div>";
    echo "<div class='col-sm-3'><h4>Change</h4></div>";
    echo "<div class='col-sm-3'><h4>Percent Change</h4></div>";
    echo "<div class='col-sm-3'><h4>Volume</h4></div>";
    echo "</div>";
    echo "<div class='row'>";
    echo "<div class='col-sm-3' id='price'></div>";
    echo "<div class='col-sm-3' id='change'></div>";
    echo "<div class='col-sm-3' id='percent'></div>";
    echo "<div class='col-sm-3' id='volume'></div>";
    echo "</div>";
    echo "<div class='row'>"; 
    echo "<button type='button' class='col-sm-3 btn btn-primary' data-toggle='modal' data-target='#buyStock'>Buy Stock</button>";
    echo "<div id='buyStock' class='modal fade' role='dialog'>
	  <div class='modal-dialog'>
	    <div class='modal-content'>
	      <div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal'>&times;</button>
		<h4 class='modal-title'>Buy Stock</h4>
	      </div>
	      <div class='modal-body'>	
		<form class='form-horizontal' name='add' method='POST' action='../Controllers/buy_stock.php'>
		<div class='form-group'>
		  <input name='amount' type='text' class='form-control' placeholder='Select Number to Purchase:'/>
		</div>
		<div class='form-group'>
		  <input type='hidden' name='id' value=$user_info[id]>
		  <input id='buy_price' type='hidden' name='price'>
		  <input id='stock' type='hidden' name='stock' value='$" . $_GET['stock'] . "'>
		</div>
		<div class='form-group'>
		  <button type='submit' class='btn btn-primary'>Buy</button>
		</div>
		</form>
	      </div>
	    </div>
	  </div>
	</div>";
    echo "<div class='col-sm-3'></div>";
    echo "<a href='stocks.php' class='col-sm-3 btn btn-primary'>Search Another Stock</a>";
    echo "<br><br>";

    echo '<script>get_stock("' . $_GET['stock'] . '");</script>';
    $twitter = new Twitter_API();
    $json = $twitter->getStockTweets($_GET['stock']); 
    $tweets = json_decode($json, true);

    $numTweets = 5;
    $x = 0;
    echo "<h3>Tweets related to stock</h3>";
    while($x < $numTweets){
        echo "<div class='container-fluid'>";
	echo "<div class='row'>";
        echo "<b>Created At: </b>" . $tweets["statuses"][$x]["created_at"];
	echo "</div>";
	echo "<div class='row'>";
        echo "<b>Tweet: </b>" . $tweets["statuses"][$x]["text"];
	echo "</div>";
	echo "<div class='row'>";
        echo "<b>Screen Name: </b>" . $tweets["statuses"][$x]["user"]["screen_name"];
        echo "</div>";
 	echo "</div>";
	echo "<br>";
        $x++;
    }
}

?>


</body>


</html>
