<?php
$servername = "localhost:3307";
$username = "root";
$password = "mohtashim123";
$database = "dashboard";
    

$conn = @mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  
    die("Sorry, we are experiencing technical difficulties. Please try again later.");}
?>
