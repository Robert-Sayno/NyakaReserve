<?php
include_once('../auth/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the property ID and status from the form submission
    $propertyID = $_POST['property_id'];
    $status = $_POST['status'];

    // Update the property status in the database
    $updateStatusQuery = "UPDATE properties SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updateStatusQuery);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, "si", $status, $propertyID);

        // Execute the statement
        $success = mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);

        if (!$success) {
            // Handle the error (you can customize this part based on your needs)
            echo "Error updating property status: " . mysqli_error($conn);
            exit();
        }

        // Close the database connection
        mysqli_close($conn);

        // Send a success response (optional)
        echo "Property status updated successfully.";
        exit();
    } else {
        // Handle statement preparation error (optional)
        echo "Error preparing statement: " . mysqli_error($conn);
        exit();
    }
} else {
    // Handle invalid request method (optional)
    echo "Invalid request method.";
    exit();
}
?>
