<?php
// Include necessary files and authentication check
include_once('../auth/connection.php');

// Check if user ID is provided and valid
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Prepare user ID
    $user_id = $_GET['id'];

    // Delete user from the database
    $sql = "DELETE FROM tbl_user WHERE id = $user_id";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the admin dashboard after successful deletion
        echo "<script>alert('User deleted successfully!'); window.location='display_users.php';</script>";
        exit();
    } else {
        // Handle deletion failure
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    // Handle invalid or missing user ID
    echo "Invalid user ID";
}

// Close the database connection
mysqli_close($conn);
?>
