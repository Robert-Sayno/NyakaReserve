<?php
include_once('../auth/connection.php');
include_once('../auth/auth_functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Check if passwords match
        if ($password !== $confirm_password) {
            $error_message = 'Passwords do not match.';
        } else {
            // Hash the password before storing it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert admin data into the database
            $sql = "INSERT INTO admins (username, password) VALUES ('$username', '$hashed_password')";

            if (mysqli_query($conn, $sql)) {
                // Redirect to the login page upon successful signup
                header('Location: login.php');
                exit();
            } else {
                $error_message = 'Error creating admin account.';
            }
        }
    } elseif (isset($_POST['login'])) {
        // Redirect to the login page
        header('Location: login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <link rel="stylesheet" href="admin-styles.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="signup-container">
        <h2>Admin Signup</h2>

        <?php if (isset($error_message)) : ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>

            <button type="submit" name="signup">Signup</button>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>
