<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Web application development" />
  <meta name="keywords" content="PHP" />
  <meta name="author" content="Nguyen Duy Anh Tu" />
  <title>Web Programming - Lab10</title>
</head>

<body>
  <h1>Hit Counter</h1>
  <?php
  require_once("hitcounter.php");
  umask(0007);
  $directory = "../../data/lab10";
  if (!file_exists($directory)) {
    echo "<p>'$directory' does not exist.</p>";
  }
  $filename = "../../data/lab10/mykeys.txt";

  $handle = @fopen($filename, "r");
  if (!$handle) {
    echo "<p>Unable to open the file.</p>";
  } else {
    $host = trim(fgets($handle));
    $username = trim(fgets($handle));
    $password = trim(fgets($handle));
    $dbname = trim(fgets($handle));
    fclose($handle);
    $Counter = new HitCounter($host, $username, $password, $dbname);
    $hit = $Counter->getHits();
    echo "<p>This page has received $hit hits.</p>";
    $hit++;
    $Counter->setHits($hit);
    $Counter->closeConnection();
  }
  ?>
  <p><a href="startover.php">Start Over</a></p>
</body>

</html>