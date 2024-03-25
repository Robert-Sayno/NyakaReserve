<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            padding: 10px;
            color: #fff;
            text-align: center;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            color: #343a40;
        }

        img {
            max-width: 20%;
            border-radius: 8px;
            margin-bottom: 50px;
        }

        p {
            margin: 0;
        }

        strong {
            font-weight: bold;
        }

        .book-link {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            margin-top: 20px;
        }

        .book-link:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            background-color: #6c757d;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            margin-top: 20px;
        }

        .back-link:hover {
            background-color: #495057;
        }

        .tour-details {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tour-details p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header>
        Tour Details
        <a href="javascript:history.back()" class="back-link">Back</a>
    </header>

    <div class="content">
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
        
        // Fetch tour details based on the tour ID from the URL
        $tourId = $_GET['id'];
        $sql = "SELECT * FROM tours WHERE tour_id = $tourId";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the tour details
            echo '<div class="tour-details">';
            echo '<h2>Tour Details</h2>';
            echo '<img src="admin/uploads/' . basename($row['tour_image']) . '" alt="Tour Image">';
            echo '<p><strong>Name:</strong> ' . $row['tour_name'] . '</p>';
            echo '<p><strong>Description:</strong> ' . $row['tour_description'] . '</p>';
            echo '<p><strong>Duration:</strong> ' . $row['tour_duration'] . '</p>';
            echo '<p><strong>Location:</strong> ' . $row['tour_location'] . '</p>';
            echo '<p><strong>Guide:</strong> ' . $row['tour_guide'] . '</p>';
            echo '<p><strong>Price:</strong> $' . $row['tour_price'] . '</p>';
            echo '<a href="#" class="book-link" onclick="confirmBooking(' . $tourId . ')">Book Now</a>';
           
            echo '</div>';
        } else {
            echo '<p>No tour found with the specified ID.</p>';
        }
        
        // Close the database connection
        $conn->close();
        ?>
    </div>

    
    <script>
        function confirmBooking(tourId) {
            if (confirm("Are you sure you want to book this tour?")) {
                // If the user confirms, send the tour ID to the server
                bookTour(tourId);
            }
        }

        function bookTour(tourId) {
            // AJAX request to book the tour
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "confirm_booking.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the response, e.g., show a success message
                    alert(xhr.responseText);
                }
            };
            // Send the tour ID to the server
            xhr.send("tour_id=" + tourId);
        }
    </script>


</body>

</html>
