<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Property</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #f4f4f4;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Edit Property</h2>

    <form action="update_property.php" method="post">
        <input type="hidden" name="property_id" value="<?php echo $property_details['id']; ?>">

        <!-- Display property details in input fields for editing -->
        <label for="property_name">Property Name:</label>
        <input type="text" name="property_name" value="<?php echo $property_details['property_name']; ?>" required><br>

        <label for="property_description">Description:</label>
        <textarea name="property_description" rows="4" required><?php echo $property_details['property_description']; ?></textarea><br>

        <label for="found_location">Location:</label>
        <input type="text" name="found_location" value="<?php echo $property_details['found_location']; ?>" required><br>

        <label for="contact_info">Contact Info:</label>
        <input type="text" name="contact_info" value="<?php echo $property_details['contact_info']; ?>" required><br>

        <label for="status">Status:</label>
        <select name="status">
            <option value="pending" <?php echo ($property_details['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="published" <?php echo ($property_details['status'] == 'published') ? 'selected' : ''; ?>>Published</option>
        </select><br>

        <input type="submit" value="Update">
    </form>
</body>

</html>
