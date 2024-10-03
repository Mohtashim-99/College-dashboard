include "connectiondb.php";
session_start(); 

$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : null;
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$dept_id = $_SESSION['dept_id'];

if (!$order || !$id) {
    echo "Error: 'order' or 'id' is missing in the request.";
    exit;
}

// Log for debugging
echo "\n id: " . $id;
echo "\n order: " . $order;

$sql = "DELETE FROM notifications WHERE id = '$id'";
echo $sql; // For debugging (remove in production)
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "Deleted notification";

        // Update the order for other notifications
        $sql_update = "UPDATE notifications 
                       SET `order` = `order` - 1 
                       WHERE `order` > $order AND `dept_id` = '$dept_id'";
        
        $result_update = mysqli_query($conn, $sql_update);
        if ($result_update) {
            echo "Notification deleted and order updated";
        } else {
            echo "Error in updating order: " . mysqli_error($conn);
        }
    } else {
        echo "No matching records found to delete.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
