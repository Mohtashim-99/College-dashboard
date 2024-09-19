<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dashboard";

$conn = @mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  
    die("Sorry, we are experiencing technical difficulties. Please try again later.");}
?>