<?php
include('../auth/connection.php');

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get tour ID and other form data
$tour_id = $_POST['tour_id'];
$tour_name = $_POST['tour_name'];
$tour_description = $_POST['tour_description'];
$tour_price = $_POST['tour_price'];
$tour_duration = $_POST['tour_duration'];
$tour_location = $_POST['tour_location'];
$tour_guide = $_POST['tour_guide'];

// Prepare the SQL query
$sql = "UPDATE tours SET tour_name='$tour_name', tour_description='$tour_description', tour_price='$tour_price', tour_duration='$tour_duration', tour_location='$tour_location', tour_guide='$tour_guide' WHERE tour_id=$tour_id";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Tour updated successfully!'); window.location='display_tours.php';</script>";
   
    // Redirect to admin dashboard after updating echo "Tour updated successfully!";
} else {
    echo "Error updating tour: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
