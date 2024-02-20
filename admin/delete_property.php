<?php
include_once('../auth/connection.php');

try {
    // Check if property ID is set and valid
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $property_id = $_GET['id'];

        // Delete the property from the database
        $sql_delete_property = "DELETE FROM properties WHERE id = $property_id";
        $result_delete_property = mysqli_query($conn, $sql_delete_property);

        // Check if the query was successful
        if ($result_delete_property) {
            // Redirect back to the admin_dashboard.php with a success message
            header("Location: dashboard.php?success=Property deleted successfully");
            exit();
        } else {
            // Handle the error
            throw new Exception('Error deleting property: ' . mysqli_error($conn));
        }
    } else {
        // Invalid property ID
        throw new Exception('Invalid property ID');
    }
} catch (Exception $e) {
    // Log the exception or display an error message
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// Close the database connection
mysqli_close($conn);
?>
