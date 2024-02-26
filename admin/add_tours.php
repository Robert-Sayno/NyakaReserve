<!-- add_tours.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Nyakabale Safaris</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../tugume.jpeg'); /* Add your background image URL */
            background-size: cover;
            color: #fff; /* Set text color to white for better readability on the background */
        }

        header {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        h1 {
            color: #fff;
        }

        nav {
            display: flex;
            justify-content: center;
            position: relative;
        }

        nav a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: #555;
            transition: background-color 0.3s;
            z-index: 1; /* Ensure links are above the form */
        }

        nav a:hover {
            background-color: #777;
        }

        form {
            max-width: 400px;
            margin: 90px auto 20px; /* Adjusted margin-top to make space below header links */
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-in-out;
            position: relative;
            z-index: 0; /* Ensure the form is behind the links */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #555;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">Tours</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
            <!-- Add more links as needed -->
        </nav>
    </header>

    <form action="process_add_tour.php" method="post">
        <h1>Add Tour</h1>

        <label for="activity">Activity:</label>
        <input type="text" id="activity" name="activity" required>

        <label for="days">Days:</label>
        <input type="number" id="days" name="days" required>

        <label for="place">Place:</label>
        <input type="text" id="place" name="place" required>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required>

        <label for="courtesyPhoto">Courtesy Photo:</label>
        <input type="file" id="courtesyPhoto" name="courtesyPhoto" accept="image/*" required>

        <button type="submit">Add Tour</button>
    </form>
</body>
</html>
