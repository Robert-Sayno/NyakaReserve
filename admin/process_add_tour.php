<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../auth/connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve form data and sanitize input
    $activity = mysqli_real_escape_string($conn, $_POST['activity']);
    $days = mysqli_real_escape_string($conn, $_POST['days']);
    $place = mysqli_real_escape_string($conn, $_POST['place']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);

    // File upload handling
    $targetDir = "/opt/lampp/htdocs/NyakaReserve/admin/photos/";
    $targetFile = $targetDir . basename($_FILES["courtesyPhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["courtesyPhoto"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image.');</script>";
        echo "<script>window.location.replace('add_tours.php');</script>";
        exit();
    }

    // Check file size
    if ($_FILES["courtesyPhoto"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        echo "<script>window.location.replace('add_tours.php');</script>";
        exit();
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ["jpg", "jpeg", "png"])) {
        echo "<script>alert('Sorry, only JPG, JPEG, and PNG files are allowed.');</script>";
        echo "<script>window.location.replace('add_tours.php');</script>";
        exit();
    }

    // Move the file to the target directory
    if (move_uploaded_file($_FILES["courtesyPhoto"]["tmp_name"], $targetFile)) {
        // File upload successful
        $uploadedFilePath = $targetFile;

       // Insert data into the tours table
       $sql = "INSERT INTO tours (activity, days, place, amount, courtesy_photo) VALUES ('$activity', '$days', '$place', '$amount', '$uploadedFilePath')";

       if (mysqli_query($conn, $sql)) {
           echo "<script>alert('Tour added successfully!');</script>";
           echo "<script>window.location.replace('add_tours.php');</script>";
           exit();
       } else {
           echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
           echo "<script>window.location.replace('add_tours.php');</script>";
           exit();
       }
   } else {
       echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
       echo "<script>window.location.replace('add_tours.php');</script>";
       exit();
   }
}

// Close the database connection
mysqli_close($conn);
?>
