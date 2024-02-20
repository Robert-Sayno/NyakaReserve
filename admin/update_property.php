<?php
include_once('../auth/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get property ID and other details from the form submission
    $property_id = $_POST['property_id'];
    $property_name = $_POST['property_name'];
    $property_description = $_POST['property_description'];
    $found_location = $_POST['found_location'];
    $contact_info = $_POST['contact_info'];
    $status = $_POST['status'];

    // Update property details in the database
    $updatePropertyQuery = "UPDATE properties SET property_name = ?, property_description = ?, found_location = ?, contact_info = ?, status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $updatePropertyQuery);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, "sssssi", $property_name, $property_description, $found_location, $contact_info, $status, $property_id);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    // Redirect back to the admin dashboard or any other appropriate page
    header("Location: dashboard.php?success=Property updated successfully");
    exit();
} else {
    // Handle invalid request method (optional)
    echo "Invalid request method.";
}
?>
