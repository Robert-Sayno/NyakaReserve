<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Your existing styles go here */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
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

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        .booking-section {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
        }

        input, select {
            margin-bottom: 15px;
            padding: 8px;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        label {
            margin-top: 10px;
        }

        input, select {
            margin-bottom: 15px;
            padding: 8px;
        }

        /* Styles for tour display section */
        .tour-section {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;
        }

        .tour-card {
            width: calc(33.33% - 20px);
            margin-bottom: 30px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .tour-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .tour-card-content {
            padding: 20px;
        }

        .tour-card-content h3 {
            margin-top: 0;
        }

        .tour-card-content p {
            margin-bottom: 0;
        }
    </style>
    <title>Nyakabale Safaris - Home</title>
</head>
<body>
    <header>
        <nav>
            <!-- Your navigation bar goes here -->
            <div class="logo">Nyakabale Safaris</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Tours</a></li>
                <li><a href="#">About Us</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <section class="booking-section">
        <h1>Book Your Safari Adventure</h1>
        <form action="booking.php" method="post">
            <!-- Your existing form fields go here -->
            <label for="tour">Select Tour:</label>
            <select name="tour" id="tour" required>
                <option value="tour1">Tour 1</option>
                <option value="tour2">Tour 2</option>
                <!-- Add more options based on available tours -->
            </select>

            <label for="date">Select Date:</label>
            <input type="date" name="date" id="date" required>

            <label for="participants">Number of Participants:</label>
            <input type="number" name="participants" id="participants" required>

            <!-- New input fields for contact phone number and customer email -->
            <label for="phone">Contact Phone Number:</label>
            <input type="tel" name="phone" id="phone" required>

            <label for="email">Customer Email:</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Book Now</button>
        </form>
    </section>

    <!-- Display tours section as cards -->
    <section class="tour-section">
        <h2>Available Tours</h2>
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
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch tour data
        $sql = "SELECT tour_name, tour_description, tour_price, tour_duration, tour_location, tour_guide, tour_image FROM tours";

        // Execute the SQL query
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="tour-card">';
                echo '<img src="admin/home/uploads' . $row['tour_image'] . '" alt="' . $row['tour_name'] . '">';
                echo '<div class="tour-card-content">';
                echo '<h3>' . $row['tour_name'] . '</h3>';
                echo '<p>Description: ' . $row['tour_description'] . '</p>';
                echo '<p>Price: ' . $row['tour_price'] . '</p>';
                echo '<p>Duration: ' . $row['tour_duration'] . '</p>';
                echo '<p>Location: ' . $row['tour_location'] . '</p>';
                echo '<p>Guide: ' . $row['tour_guide'] . '</p>';
                echo '</div></div>';
            }
        } else {
            echo "<p>No tours found</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </section>
</body>
</html>
