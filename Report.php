<?php
session_start(); // Start session to store user authentication status

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include 'connect.php';

    // Get form data and sanitize
    $itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
    $dateFound = mysqli_real_escape_string($conn, $_POST['dateFound']);
    $locationFound = mysqli_real_escape_string($conn, $_POST['locationFound']);
    $contactName = mysqli_real_escape_string($conn, $_POST['contactName']);
    $contactPhone = mysqli_real_escape_string($conn, $_POST['contactPhone']);
    $itemDescription = mysqli_real_escape_string($conn, $_POST['itemDescription']);

    // Insert data into database table
    $sql = "INSERT INTO reported_items (itemName, dateFound, locationFound, contactName, contactPhone, itemDescription) VALUES ('$itemName', '$dateFound', '$locationFound', '$contactName', '$contactPhone', '$itemDescription')";
    
    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully, redirect to success page
        header("Location: success.php");
        exit();
    } else {
        // Error inserting data into database
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Found Item</title>
   
</head>
<body>
    <h1>Report Found Item</h1>
    <form action=" " method="post">
        <label for="itemName">Item Name:</label>
        <input type="text" id="itemName" name="itemName" required>

        <label for="dateFound">Date Found:</label>
        <input type="date" id="dateFound" name="dateFound" required>

        <label for="locationFound">Location Found:</label>
        <input type="text" id="locationFound" name="locationFound" required>

        <label for="contactName">Your Name:</label>
        <input type="text" id="contactName" name="contactName" required>

        <label for="contactPhone">Phone Number:</label>
        <input type="tel" id="contactPhone" name="contactPhone" required>
        <small>Format: 065-800-9179</small>

        <label for="itemDescription">Description:</label>
        <textarea id="itemDescription" name="itemDescription" rows="5" required></textarea>
         
        <!-- Removed the file upload input -->
        
        <div id="imagePreview"></div>

        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='Landin.php'">Cancel</button>
    </form>

    <script>
        // Removed the previewImage function as it's no longer needed
    </script>
</body>
</html>


<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #025e8d;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: #025e8d;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #025e8d;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="date"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="tel"]:focus,
        input[type="date"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #007bff;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            margin-bottom: 30px;
        }

        small {
            display: block;
            color: #025e8d;
        }

        #imagePreview {
            margin-bottom: 20px;
        }

        #imagePreview img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background-color: #28a745;
            margin-right: 10px;
        }

        button[type="button"] {
            background-color: #dc3545;
        }

        button:hover {
            background-color: #0056b3;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        button[type="button"]:hover {
            background-color: #c82333;
        }
    </style>


