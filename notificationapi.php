<?php
header('Content-Type:application/json');
session_start();
include "connectiondb.php";
$page_id = 3;
$dept_id = $_SESSION['dept_id'];


$sql ="SELECT * FROM `notifications` WHERE `page_id` ='$page_id' AND `dept_id` = '$dept_id'";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
$notification = array();
if($num>0){
    while($row = mysqli_fetch_assoc($result)){
       $notification[] = $row;
       
    }

}
echo json_encode($notification);
mysqli_close($conn);

?>