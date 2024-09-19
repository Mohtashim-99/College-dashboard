<?php
header('Content-Type: application/json');

include 'connectiondb.php';
$sql = "SELECT * FROM `faculty`";
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
