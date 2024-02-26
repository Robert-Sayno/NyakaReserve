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

        video {
            position: fixed;
            z-index: -1;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        #landing-container {
            text-align: center;
            color: white;
            padding: 100px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 20px;
            z-index: 1;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            animation: fadeInUp 1.5s ease-out;
        }

        #links {
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
    <video autoplay muted loop>
        <!-- Replace 'your-video.mp4' with the path to your video file -->
        <source src="video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div id="landing-container">
        <h1>Welcome to Nyakabale Safaris</h1>
        <div id="links">
            <a href="#">Home</a>
            <a href="#">Tours</a>
            <a href="#">About Us</a>
            <a href="#">Log out</a>
            <!-- Add more links as needed -->
        </div>
    </div>
</body>
</html>
