<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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

        .payment-section {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }

        .payment-methods {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .payment-methods img {
            width: 50px;
            height: auto;
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
    </style>
    <title>Nyakabale Safaris - Payment</title>
</head>
<body>
    <header>
        <nav>
            <div class="logo">Nyakabale Safaris</div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Tours</a></li>
                <li><a href="#">About Us</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <section class="payment-section">
        <h1>Payment Confirmation</h1>
        <p>Your booking is confirmed! Thank you for choosing Nyakabale Safaris.</p>
        
        <div class="payment-methods">
            <div>
                <img src="mtn_icon.png" alt="MTN Mobile Money">
                <p>MTN Mobile Money</p>
            </div>
            <div>
                <img src="visa_icon.png" alt="VISA Card">
                <p>VISA Card</p>
            </div>
            <div>
                <img src="paypal_icon.png" alt="PayPal">
                <p>PayPal</p>
            </div>
        </div>

        <button onclick="goHome()">Back to Home</button>

        <script>
            function goHome() {
                // Redirect to the home page
                window.location.href = 'index.php';
            }
        </script>
    </section>
</body>
</html>
