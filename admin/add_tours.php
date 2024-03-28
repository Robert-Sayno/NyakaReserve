<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tour</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
        }
        nav a:hover {
            background-color: #555;
        }
        form {
            width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<header>
    <h1>Navigation Header</h1>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </nav>
</header>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <h2>Create Tour</h2>
    <label for="tour_name">Tour Name:</label>
    <input type="text" id="tour_name" name="tour_name" required><br>

    <label for="tour_description">Tour Description:</label>
    <textarea id="tour_description" name="tour_description" rows="4" required></textarea><br>

    <label for="tour_price">Tour Price:</label>
    <input type="text" id="tour_price" name="tour_price" required><br>

    <label for="tour_duration">Tour Duration:</label>
    <input type="text" id="tour_duration" name="tour_duration"><br>

    <label for="tour_location">Tour Location:</label>
    <input type="text" id="tour_location" name="tour_location"><br>

    <label for="tour_guide">Tour Guide:</label>
    <input type="text" id="tour_guide" name="tour_guide"><br>

    <label for="tour_image">Tour Image:</label>
    <input type="file" id="tour_image" name="tour_image"><br>

    <input type="submit" value="Create Tour">
</form>

<?php
// Database connection parameters
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'NyakaReserve';

// Check if there is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a new mysqli connection using the provided parameters
    $conn = new mysqli($server, $username, $password, $database);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $tour_name = $_POST['tour_name'];
    $tour_description = $_POST['tour_description'];
    $tour_price = $_POST['tour_price'];
    $tour_duration = $_POST['tour_duration'];
    $tour_location = $_POST['tour_location'];
    $tour_guide = $_POST['tour_guide'];

    // Handle image upload
    $targetDirectory = "/opt/lampp/htdocs/NyakaReserve/admin/uploads/";

    // Create the uploads directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0775, true); // Set the appropriate permission (read/write/execute for owner and group, read/execute for others)
    }

    $targetFile = $targetDirectory . basename($_FILES["tour_image"]["name"]);

    if (move_uploaded_file($_FILES["tour_image"]["tmp_name"], $targetFile)) {
        // Image uploaded successfully, now insert the tour details into the database
            // Image uploaded successfully, now insert the tour details into the database
            $tour_image = $targetFile;

            // Prepare SQL statement to insert data into the tours table
            $sql = "INSERT INTO tours (tour_name, tour_description, tour_price, tour_duration, tour_location, tour_guide, tour_image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
    
            // Use a prepared statement to prevent SQL injection
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $tour_name, $tour_description, $tour_price, $tour_duration, $tour_location, $tour_guide, $tour_image);
    
            // Execute the SQL query
            if ($stmt->execute()) {
                echo "<p>New tour created successfully</p>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
    
            // Close the statement
            $stmt->close();
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    
        // Close the database connection
        $conn->close();
    }
    ?>
    
    </body>
    </html>
    
