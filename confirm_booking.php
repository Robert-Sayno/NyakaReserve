<?php
// Database connection parameters
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'NyakaReserve';

// Create a new mysqli connection using the provided parameters
$conn = new mysqli($server, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    // If the connection fails, terminate the script and display the MySQL error.
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST and if the tour ID is set
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tour_id'])) {
    // Get the tour ID from the POST data
    $tourId = $_POST['tour_id'];

    // Generate a random tracking number
    $trackingNumber = generateTrackingNumber();

    // Insert the booking details into the database
    $insertQuery = "INSERT INTO bookings (tour_id, tracking_number) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("is", $tourId, $trackingNumber);

    if ($stmt->execute()) {
        echo "Tour booked successfully! Your tracking number is: " . $trackingNumber;
    } else {
        echo "Error booking tour: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();

// Function to generate a random tracking number
function generateTrackingNumber()
{
    // Define characters that can be used in the tracking number
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Generate a random tracking number of length 8
    $trackingNumber = '';
    for ($i = 0; $i < 8; $i++) {
        $trackingNumber .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $trackingNumber;
}
?>
