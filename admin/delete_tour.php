<!-- delete_tour.php -->
<?php
include('../aut/connection.php');
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get tour ID from the URL
$tour_id = $_GET['tour_id'];

// Delete tour from the tours table
$sql = "DELETE FROM tours WHERE tour_id = $tour_id";

if ($conn->query($sql) === TRUE) {
    echo "Tour deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
