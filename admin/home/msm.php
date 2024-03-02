<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send SMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
        .success-message {
            color: green;
            font-size: 14px;
            margin-top: 5px;
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successMessage = document.querySelector('.success-message');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000); // Adjust the timeout (in milliseconds) as needed
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Send SMS</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="receiver">Receiver:</label>
            <input type="text" id="receiver" name="receiver" required>
            
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact">
            
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject">
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <label for="sent_at">Sent At:</label>
            <input type="text" id="sent_at" name="sent_at" placeholder="YYYY-MM-DD HH:MM:SS" required>
            
            <input type="submit" value="Send">
            
            <?php
            // Paste the provided PHP code here
            // Database connection parameters
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'NyakaReserve';

            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $receiver = isset($_POST['receiver']) ? $_POST['receiver'] : '';
                $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
                $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
                $message = isset($_POST['message']) ? $_POST['message'] : '';
                $sent_at = isset($_POST['sent_at']) ? $_POST['sent_at'] : '';

                // Create connection
                $conn = new mysqli($server, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Prepare SQL statement
                $sql = "INSERT INTO sms_messages (receiver, type, contact, subject, message, sent_at, status)
                        VALUES (?, 'outgoing', ?, ?, ?, ?, 'sent')";
                
                // Prepare and bind parameters
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $receiver, $contact, $subject, $message, $sent_at);

                // Execute SQL statement
                if ($stmt->execute() === TRUE) {
                    echo "<p class='success-message'>SMS sent successfully!</p>";
                } else {
                    echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }

                // Close statement and connection
                $stmt->close();
                $conn->close();
            }
            ?>
        </form>
    </div>
</body>
</html>
