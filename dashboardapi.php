<?php
header('Content-Type:application/json');

include "connectiondb.php";
session_start();
$page_id = 1;
$dept_id = $_SESSION['dept_id']; // Fixed assignment

$sql = "SELECT * FROM `paragraphs` WHERE `page_id` = '$page_id' AND `dept_id` = '$dept_id'"; // Fixed query
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
$content = array();

if($num > 0){
    while($row = mysqli_fetch_assoc($result)){
        $content[] = $row;
    }
}

echo json_encode($content);

mysqli_close($conn);
?>
