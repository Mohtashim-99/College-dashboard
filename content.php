
<?php
header('Content-Type: application/json');

include "connectiondb.php";

$sql ="SELECT * FROM `content`";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$content = array();
if($num>0){
    while($row=mysqli_fetch_assoc($result)){
        $content[] = $row;

    }
}

echo json_encode($content);


mysqli_close($conn);


?>