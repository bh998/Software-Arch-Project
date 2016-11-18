<!DOCTYPE html>

<html>
<body>

<?php
require_once('PHP_Classes/Twitter_Manager.php');
if(isset($_GET['stock']) && $_GET['stock'] != null){
    $twitter = new Twitter_Manager();
    $tweets = $twitter->getStockTweets($_GET['stock']); 
    print_r($tweets);
}

?>


Twitter Stock News!<br>
*stock news from tweets*<br>

<br><br>

<form action="twitter_api.php" method="GET">
Stock: <br><input type="text" name="stock"><br>
<input type="submit" value="Submit">
</form>

</body>
</html>
