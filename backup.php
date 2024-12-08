<?php
include "connectiondb.php";
session_start(); 

$order = $_REQUEST['order'];  // Be cautious of unsanitized input
$id = $_REQUEST['id'];        // Be cautious of unsanitized input
$dept_id = $_SESSION['dept_id'];

// Log for debugging (optional)
echo "\n id: " . $id;
echo "\n order: " . $order;

$sql = "DELETE FROM notifications WHERE id = '$id'";
echo $sql; // Optional: Remove in production

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "Deleted notification";

        // After deleting, update the order for other notifications
        $sql_update = "UPDATE notifications 
                       SET `order` = `order` - 1 
                       WHERE `order` > $order AND `dept_id` = '$dept_id'";
        
        $result_update = mysqli_query($conn, $sql_update);
        
        if ($result_update) {
            echo "Notification deleted and order updated";

            // Redirect after successful update
            header("Location: ".$_SERVER['PHP_SELF']."?success=true");
            exit();
        } else {
            echo "Error in updating order: " . mysqli_error($conn);
            // Redirect in case of error
            header("Location: ".$_SERVER['PHP_SELF']."?error=true");
            exit();
        }
    } else {
        echo "No matching records found to delete.";
    }
} else {
    echo "Error in DELETE query: " . mysqli_error($conn);
}

// Handle success or error messages after redirection
if (isset($_GET['success'])) {
    echo "<script>
          console.log('Notification deleted successfully');
          </script>";
}

if (isset($_GET['error'])) {
    echo "<script>
          alert('Some error occurred while updating the order.');
          </script>";
}
?>
