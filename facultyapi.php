<?php
header('Content-Type: application/json');
session_start();

include 'connectiondb.php';

$dept_id = $_SESSION['dept_id'];

$sql = "SELECT * FROM `faculty` WHERE `dept_id` = '$dept_id'" ;
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

$students = array();
if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }
}

echo json_encode($students);


mysqli_close($conn);

?>
