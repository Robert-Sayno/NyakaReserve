<?php
// Include necessary files and authentication check
include_once('../auth/connection.php');
include_once('../auth/auth_functions.php');

// Fetch users from the database
$sql_users = "SELECT * FROM tbl_user";
$result_users = mysqli_query($conn, $sql_users);

// Check if the query was successful
if ($result_users) {
    $users = mysqli_fetch_all($result_users, MYSQLI_ASSOC);
} else {
    // Handle the error, you can customize this part based on your needs
    die('Error fetching users: ' . mysqli_error($conn));
}


// Fetch messages from the database
$sql_messages = "SELECT * FROM contact_messages";
$result_messages = mysqli_query($conn, $sql_messages);

// Check if the query was successful
if ($result_messages) {
    $messages = mysqli_fetch_all($result_messages, MYSQLI_ASSOC);
} else {
    // Handle the error, you can customize this part based on your needs
    die('Error fetching messages: ' . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-image: url('lost_property_bg.jpg');
            background-size: cover;
            background-position: center;
            color: #7734eb;
            font-family: Arial, sans-serif;
        }

        .dashboard-container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
        }

        .dashboard-section {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            overflow: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .property-image {
            max-width: 100%;
            max-height: 100px;
        }

        .logout-btn {
            color: #fff;
            background-color: #e74c3c;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <h2>Welcome to the Admin Dashboard</h2>

        <!-- Display users in a table -->
        <div class="dashboard-section">
            <h3>Users</h3>
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo (isset($user['active']) ? ($user['active'] ? 'Active' : 'Inactive') : 'N/A'); ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                                <a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

</div>

        <!-- Display messages in a table -->
        <div class="dashboard-section">
            <h3>Messages</h3>
            <table>
                <thead>
                    <tr>
                        <th>Message ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message) : ?>
                        <tr>
                            <td><?php echo $message['id']; ?></td>
                            <td><?php echo $message['name']; ?></td>
                            <td><?php echo $message['email']; ?></td>
                            <td><?php echo $message['message']; ?></td>
                            <td>
                                <a href="delete_message.php?id=<?php echo urlencode($message['id']); ?>" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <p><a class="logout-btn" href="logout.php">Logout</a></p>
    </div>
</body>

</html>
