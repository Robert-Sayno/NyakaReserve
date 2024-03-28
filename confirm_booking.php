<?php
// Set error reporting to display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Include the database connection file
include_once('auth/connection.php');
if (isset($user['username'])) {
    // 'username' key exists, so it's safe to access
    $userName = $user['username'];
} else {
    // 'username' key does not exist or is NULL
    // Handle this case appropriately, such as setting a default value or displaying an error message
    $userName = "Unknown"; // Example of setting a default value
    // You can also log an error message or take other appropriate action
}

// Check if the tour ID is provided in the GET request
if (isset($_GET['id'])) {
    $tourId = $_GET['id'];

    // Check if the user email is set in the session
    if (isset($_SESSION['username'])) {
        $userEmail = $_SESSION['username']; // Get user email from the session

        // Query the database to get the user ID and other details based on the email
        $getUserSql = "SELECT id, username FROM tbl_user WHERE username = ?";
        $stmt = $conn->prepare($getUserSql);
        $stmt->bind_param("s", $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, retrieve user details
            $user = $result->fetch_assoc();
            $userId = $user['id'];
            $userName = $user['username'];

            // Generate a random reference tracing number
            $referenceNumber = uniqid('REF') . mt_rand(1000, 9999);

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
        echo '<script>alert("You must be logged in to book a tour.");</script>';
    }
} else {
    // Tour ID not provided in the GET request
    echo '<script>alert("Tour ID not provided!");</script>';
}
?>




