<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head></head>

<body>

<?php
if(is_null($_SESSION["username"])){
    echo "<h4>I'm sorry you are not allowed to access this page.</h4>";
    echo "<a href='../../index.html'>Please Login.</a>";
    exit();
}
echo "<h3>Welcome " . $_SESSION["username"] . "!</h3>";
?>
<p>Choose a link to begin.</p>

<br>
<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="../../HTML/Views/financial_api.html">Financial News!</a>
</button><br><br>

<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="../../HTML/Views/email_validator.html">Email Validator!</a>
</button><br><br>

<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="../../HTML/Views/tradier_api.html">Tradier Info!</a>
</button><br><br>

<button type="button" class="btn btn-default">
<span class="glyphicon glyphicon-hand-up"></span>
<a href="../../PHP/Views/twitter_api.php">Twitter Search!</a>
</button><br><br>

</body>

</html>
