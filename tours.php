<!-- tours.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Tours - Nyakabale Safaris</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        nav a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: #555;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #777;
        }

        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 20px auto;
        }

        .card {
            flex: 0 1 calc(33.33% - 20px);
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            margin: 10px;
            overflow: hidden;
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .card h2 {
            margin: 10px;
        }

        .card p {
            margin: 5px 10px;
        }

        .book-btn {
            display: block;
            margin: 10px;
            padding: 10px;
            background-color: #333;
            color: white;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .book-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>Available Tours</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Tours</a>
            <a href="#">About Us</a>
        </nav>
    </header>

    <section>
        <?php
        // Database connection details
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
                $tour_id = $row['tour_id'];
                $activity = $row['activity'];
                $days = $row['days'];
                $place = $row['place'];
                $amount = $row['amount'];

                // Display tour information in a card layout
                echo '<div class="card">';
                echo "<h2>$activity</h2>";
                echo "<p><strong>Days:</strong> $days</p>";
                echo "<p><strong>Place:</strong> $place</p>";
                echo "<p><strong>Amount:</strong> $amount</p>";

                // Booking button with a link to the booking page for each tour
                echo "<a class='book-btn' href='booking.php?tour_id=$tour_id'>Book Now</a>";

                echo '</div>';
            }
        } else {
            echo "No tours available.";
        }

        $conn->close();
        ?>
    </section>
</body>
</html>
