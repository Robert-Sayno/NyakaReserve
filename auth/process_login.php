<?php
session_start();
include_once('connection.php');
include_once('auth_functions.php');
error_reporting(E_ALL); ini_set('display_errors', 1);
// Check if the user is already logged in, redirect to home page
if (isset($_SESSION['name'])) {
    header('location: ../tours.php');
    exit();
}

if (isset($_POST['login'])) {
    // Check if both username and password are provided
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $_SESSION['error'] = 'Please fill both Username and Password';
        header('location: login.php');
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to select user from 'admins' table using prepared statement
    $sql = "SELECT * FROM `tbl_user` WHERE `username`=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email']; // Fetch the email from the database
        $hashedPassword = $row['password'];

        // Verify the password using password_verify
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['name'] = $name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email; // Store the email in the session

            // Redirect to tours page upon successful login
            header('location: ../tours.php');
            exit;
        } else {
            // Password verification failed, display error message
            $_SESSION['error'] = 'Invalid Password';
            header('location: login.php');
            exit;
        }
    } else {
        // User not found, display error message
        $_SESSION['error'] = 'Invalid Username';
        header('location: login.php');
        exit;
    }
}
?>
