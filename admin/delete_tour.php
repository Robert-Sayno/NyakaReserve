<?php
include('../auth/connection.php'); // Adjust the path as necessary

// Assuming your connection parameters are defined in connection.php
$conn = new mysqli($host, $username, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get tour ID from the URL
$tour_id = $_GET['id']; // Adjust the key based on how you're passing the tour ID

// Prepare and execute the SQL statement to delete the tour
$sql = "DELETE FROM tours WHERE tour_id = $tour_id";

if ($conn->query($sql) === TRUE) {
    echo "Tour deleted successfully!";
    header("Location: tours.php");

} else {
    echo "Error deleting tour: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
