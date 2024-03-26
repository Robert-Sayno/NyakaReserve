<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once('auth/connection.php');
if (isset($_SESSION['email'])) {
    echo "User is logged in with email: " . $_SESSION['email'];
    // Rest of the code...
} else {
    echo "User is not logged in.";
}


// Check if the tour ID is provided in the GET request
if (isset($_GET['id'])) {
    $tourId = $_GET['id'];

    // Check if the user email is set in the session
    if (isset($_SESSION['email'])) {
        $userEmail = $_SESSION['email']; // Get user email from the session

        // Query the database to get the user ID and other details based on the email
        $getUserSql = "SELECT user_id, name FROM users WHERE email = ?";
        $stmt = $conn->prepare($getUserSql);
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, retrieve user details
            $user = $result->fetch_assoc();
            $userId = $user['user_id'];
            $userName = $user['name'];

            // Generate a random reference tracing number
            $referenceNumber = uniqid('REF') . mt_rand(100000, 999999);

            // Insert booking details into the database
            $insertBookingSql = "INSERT INTO bookings (tour_id, user_id, user_name, user_email, reference_number) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertBookingSql);
            $stmt->bind_param("iisss", $tourId, $userId, $userName, $userEmail, $referenceNumber);

            if ($stmt->execute()) {
                // Booking successful
                echo '<script>alert("Booking successful, we shall contact you soon! Your Reference Number is: ' . $referenceNumber . '");</script>';
            } else {
                // Booking failed
                echo '<script>alert("Error: ' . $stmt->error . '");</script>';
            }
        } else {
            // User not found with the provided email
            echo "User not found!";
        }
    } else {
        // User email is not set in the session
        echo '<script>alert("You must be logged in to book a tour.");<script>';
    }
} else {
    // Tour ID not provided in the GET request
    echo '<script>alert("Tour ID not provided!");<alert>';
}
?>
