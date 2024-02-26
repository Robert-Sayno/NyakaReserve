<!-- edit_tour.php -->
<?php
include('../aut/connection.php');

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get tour ID from the URL
$tour_id = $_GET['tour_id'];

// Fetch tour details from the database
$sql = "SELECT * FROM tours WHERE tour_id = $tour_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $activity = $row['activity'];
    $days = $row['days'];
    $place = $row['place'];
    $amount = $row['amount'];
} else {
    echo "Tour not found!";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tour - Nyakabale Safaris</title>
</head>
<body>
    <h1>Edit Tour</h1>
    <form action="update_tour.php" method="post">
        <input type="hidden" name="tour_id" value="<?php echo $tour_id; ?>">

        <label for="activity">Activity:</label>
        <input type="text" id="activity" name="activity" value="<?php echo $activity; ?>" required>

        <label for="days">Days:</label>
        <input type="number" id="days" name="days" value="<?php echo $days; ?>" required>

        <label for="place">Place:</label>
        <input type="text" id="place" name="place" value="<?php echo $place; ?>" required>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" value="<?php echo $amount; ?>" required>

        <button type="submit">Update Tour</button>
    </form>
</body>
</html>
