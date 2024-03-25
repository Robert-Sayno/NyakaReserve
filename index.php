<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #video-container {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.7; /* Adjust the opacity as needed */
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #landing-container {
            text-align: center;
            color: white;
            padding: 100px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
        }

        h1 {
            font-size: 4em;
            margin-bottom: 20px;
            animation: fadeInUp 1.5s ease-out;
        }

        #links {
            font-size: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            animation: fadeInUp 2s ease-out;
        }

        a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            background-color: #333;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #555;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <title>Nyakabale Safaris</title>
</head>
<body>
    <div id="video-container">
        <video autoplay muted loop>
            <source src="vidoe.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div id="landing-container">
        <h1>Welcome to Nyakabale Safaris</h1>
        <div id="links">
            <a href="index.php">Home</a>
            <a href="tours.php">Book Tour</a>
            <a href="about_us.php">About Us</a>
            <a href="contact_us.php">Contact Us</a>
            <!-- Add more links as needed -->
        </div>
    </div>
</body>
</html>
