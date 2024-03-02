<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Tours - Nyakabale Safaris</title>
    <style>
        /* Your existing styles remain unchanged */
        /* Additional styles for card layout */
        body {
            font-family: Arial, sans-serif;
        }
        
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            flex-basis: calc(50% - 20px); /* Set the width to 50% minus the margin */
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            background-color: #fff;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .card-content {
            padding: 20px;
        }

        .book-btn {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .book-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">Tours</a>
            <a href="#">About Us</a>
            <!-- Add more links as needed -->
        </nav>
    </header>

    <div class="container">
        <?php
        // Database connection parameters
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'NyakaReserve';

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch available tours from the database
        $sql = "SELECT * FROM tours";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo "<img src='uploads/{$row['tour_image']}' alt='{$row['tour_name']}'>";
                echo '<div class="card-content">';
                echo "<h2>{$row['tour_name']}</h2>";
                echo "<p><strong>Description:</strong> {$row['tour_description']}</p>";
                echo "<p><strong>Price:</strong> {$row['tour_price']}</p>";
                echo "<p><strong>Duration:</strong> {$row['tour_duration']}</p>";
                echo "<p><strong>Location:</strong> {$row['tour_location']}</p>";
                echo "<p><strong>Guide:</strong> {$row['tour_guide']}</p>";
                echo "<a class='book-btn' href='booking.php?tour_id={$row['tour_id']}'>Book Now</a>";
                echo '</div></div>';
            }
        } else {
            echo "No tours available.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
