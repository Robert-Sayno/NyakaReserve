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
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tour {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .booking-form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .booking-form label {
            margin-bottom: 5px;
        }

        .booking-form input {
            margin-bottom: 15px;
            padding: 8px;
        }

        .booking-form button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .booking-form button:hover {
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
            <a href="#">Contact Us</a>
            <!-- Add more links as needed -->
        </nav>
    </header>

    <section>
        <?php
        $host = 'your_host';
        $username = 'your_username';
        $password = 'your_password';
        $database = 'your_database';

        $conn = new mysqli($host, $username, $password, $database);

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

                echo '<div class="tour">';
                echo "<h2>$activity</h2>";
                echo "<p><strong>Days:</strong> $days</p>";
                echo "<p><strong>Place:</strong> $place</p>";
                echo "<p><strong>Amount:</strong> $amount</p>";

                // Booking form
                echo '<div class="booking-form">';
                echo "<label for='participants'>Number of Participants:</label>";
                echo "<input type='number' id='participants' name='participants' required>";
                echo "<button onclick='bookTour($tour_id)'>Book Now</button>";
                echo '</div>';

                echo '</div>';
            }
        } else {
            echo "No tours available.";
        }

        $conn->close();
        ?>
    </section>

    <script>
        function bookTour(tourId) {
            // You can add JavaScript logic to handle the booking process
            alert("Booking logic goes here for tour ID: " + tourId);
        }
    </script>
</body>
</html>
