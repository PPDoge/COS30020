<?php
session_start(); 
if (!isset($_SESSION["number"])) {
  $_SESSION["number"] = 0; 
}
$num = $_SESSION["number"]; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Web application development" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Nguyen Duy Anh Tu" />
  <title>Lab 9 - Task 1</title>
</head>

<body>
  <h1>Web Programming - Lab09</h1>
  <?php
  echo "<p>The number is $num</p>";
  ?>

  <p><a href="numberup.php">Up</a></p>
  <p><a href="numberdown.php">Down</a></p>
  <p><a href="numberreset.php">Reset</a></p>
</body>

</html>