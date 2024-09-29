<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $order = $_POST['order']; 
    $field = $_POST['field']; 
    $content = $_POST['content']; 

    echo "Received data: order=$order, field=$field, content=$content\n";

    include 'connectiondb.php';


    $sql = "UPDATE programmes SET $field='$content' WHERE  `order`='$order'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    // Close database connection
    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
