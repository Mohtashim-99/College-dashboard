<?php
header("content-type:application/json");
include "connectiondb.php";

$dept_id=$_REQUEST['dept_id'];
$page_id=$_REQUEST['page_id'];
if($page_id==1){
    $sql = "SELECT * FROM paragraphs WHERE dept_id ='$dept_id'";
}
else if($page_id==2){
    $sql= "SELECT * FROM faculty WHERE dept_id = '$dept_id'";
}
else if($page_id==3){
    $sql= "SELECT * FROM  notifications  WHERE dept_id = '$dept_id'";
}
else if($page_id==4){
    $sql= "SELECT * FROM infrastructure WHERE dept_id = '$dept_id'";
}
else if($page_id==5){
    $sql= "SELECT * FROM activities  WHERE dept_id = '$dept_id'";
}
else if($page_id==6){
    $sql= "SELECT * FROM programmes WHERE dept_id = '$dept_id'";
}
else if($page_id==7){
    $sql= "SELECT * FROM services WHERE dept_id = '$dept_id'";
}
else {
    echo "Page id did not found";
}

$result = mysqli_query($conn,$sql);
if ($result){
    $num = mysqli_num_rows($result);
    $details = [];
    if($num>0){
        while($row=mysqli_fetch_assoc($result)){
            $details[]=$row;
        }

    }
}
echo json_encode($details);
mysqli_close($conn);

?>