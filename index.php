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
</body>
</html>
