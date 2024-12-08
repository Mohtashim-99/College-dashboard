<?php
include "connectiondb.php";
header("Content-type:application/json");
session_start();
$dept_id = $_SESSION['dept_id'];
$page_id=5;
$sql = "SELECT * FROM activities WHERE dept_id = '$dept_id' AND page_id = '$page_id'";
$result=mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
$details=[];
if($num>=1){
   while($row=mysqli_fetch_assoc($result)){
    $details[]=$row;
   }

}
echo json_encode($details);
mysqli_close($conn);
?>