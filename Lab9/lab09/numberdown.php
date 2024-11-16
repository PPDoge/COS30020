<?php
  session_start(); 
  $num = $_SESSION["number"]; 
  $_SESSION["number"] = $num; 
  header("location:number.php"); 
?>