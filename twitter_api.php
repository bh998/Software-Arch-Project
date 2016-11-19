<!DOCTYPE html>

<html>
<body>


Twitter Stock News!<br>

<br><br>

<form action="twitter_api.php" method="GET">
Stock: <br><input type="text" name="stock"><br>
<input type="submit" value="Submit">
</form>

<?php
require_once('Twitter_Manager.php');
if(isset($_GET['stock']) && $_GET['stock'] != null){
    $twitter = new Twitter_Manager();
    $json = $twitter->getStockTweets($_GET['stock']); 
    $tweets = json_decode($json, true);

    $numTweets = 10;
    //var_dump($tweets);
    $x = 0;
    while($x < $numTweets){
        echo "<p>";
        echo "<b>Created At: </b>" . $tweets["statuses"][$x]["created_at"] . "<br>";
        echo "<b>Tweet: </b>" . $tweets["statuses"][$x]["text"] . "<br>";
        echo "<b>Screen Name: </b>" . $tweets["statuses"][$x]["user"]["screen_name"] . "<br>";
        echo "</p>";
        $x++;
    }
}

?>

</body>
</html>
