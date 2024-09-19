<?php 
header("Content-Type:application/json");
include "connectiondb.php";
session_start();

$page_id = 6;
$dept_id = $_SESSION['dept_id'];
$sql = "SELECT * FROM `programmes` WHERE `dept_id` = '$dept_id' AND `page_id` = '$page_id'";
$result =mysqli_query($conn,$sql);

$num = mysqli_num_rows($result);
$details= array();

if($num>0){
    while ($row=mysqli_fetch_assoc($result)){
        $details[] = $row;
    }
}
echo json_encode($details);

mysqli_close($conn);


?>