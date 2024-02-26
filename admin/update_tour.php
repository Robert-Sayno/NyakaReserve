<!-- update_tour.php -->
<?php
include('../aut/connection.php');

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$tour_id = $_POST['tour_id'];
$activity = $_POST['activity'];
$days = $_POST['days'];
$place = $_POST['place'];
$amount = $_POST['amount'];

// Update tour details in the tours table
$sql = "UPDATE tours SET activity='$activity', days='$days', place='$place', amount='$amount' WHERE tour_id=$tour_id";

if ($conn->query($sql) === TRUE) {
    echo "Tour updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
