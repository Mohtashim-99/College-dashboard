<?php
include "connectiondb.php";
session_start(); 

$order = trim($_REQUEST['order']);
$dept_id = $_SESSION['dept_id'];

// Log the query for debugging
$sql = "DELETE FROM `notifications` WHERE `dept_id` = '$dept_id' AND `order` = '$order'";
echo "SQL: " . $sql; // This will print the SQL query

$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "\nDeleted successfully\n";

        $sql_update= "UPDATE `notifications`
        SET`order`= `order` - 1
        WHERE `order` > $order";
        echo "\n".$sql_update;
        $result_update = mysqli_query($conn,$sql_update);
        if($result_update){
            echo "\nOrder updated succefully";
        }
        else{
           echo "Error in updating order" .mysqli_error($conn);
        }

    } else {
        echo "\nNo matching records found to delete.";
    }
} else {
    echo "Error: " . mysqli_error($conn); // Show the error message
}
?>
