<?php
include_once('../auth/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user ID and other details from the form submission
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $status = $_POST['status'];

    // Update user details in the database
    $updateUserQuery = "UPDATE tbl_user SET name = ?, username = ?, active = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateUserQuery);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "ssii", $name, $username, $status, $user_id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the admin dashboard or any other appropriate page
    header("Location: dashboard.php?success=User updated successfully");
    exit();
} else {
    // Handle invalid request method (optional)
    echo "Invalid request method.";
}
?>
