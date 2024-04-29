<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVEN Lost & Found</title>
   
</head>
<body>
    <div class="navbar">
        <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
        <div class="nav-links">
            <a href="Landin.php" class="nav-link">Report/Find</a>
        </div>
        <a href="INDEX.php"><img class="logout-icon" src="img/icons8-logout-48.png" alt="Logout"></a>
    </div>
    <div class="container">
    <?php
// Include database connection file
include 'connect.php';

// Check if the database connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Define the cutoff date (30 days ago)
$cutoff_date = date('Y-m-d', strtotime('-30 days'));

// Fetch reported items from the database, ordering by newest first and excluding posts older than 30 days
$sql = "SELECT * FROM reported_items WHERE created_at >= '$cutoff_date' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if any reported items are found
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Output item details as card-like elements
            echo '<div class="card">';
            echo '<h2>' . $row['itemName'] . '</h2>';
            echo '<p><strong>Date Found:</strong> ' . $row['dateFound'] . '</p>';
            echo '<p><strong>Found by:</strong> ' . $row['contactName'] . '</p>';
            echo '<p><strong>Contact:</strong> ' . $row['contactPhone'] . '</p>';
            echo '<p><strong>Description:</strong> ' . $row['itemDescription'] . '</p>';

            // Check if imagePath is available
            //if (!empty($row['imagePath'])) {
            // Display image
            // echo '<img src="' . $row['imagePath'] . '" alt="Item Image">';
            //} else {
            // Display placeholder image if no image path is available
            //echo '<img src="img/UNI.png" alt="No Image">';
            //}

            echo '</div>';
        }
    } else {
        echo "No reported items found.";
    }
} else {
    echo "Error: " . mysqli_error($conn); // Display error if query fails
}

// Close database connection
mysqli_close($conn);
?>

    </div>
</body>
</html>

<style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #025e8d;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        .logo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 20px;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }
        .nav-link {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: #3f9cff;
        }
        .logout-icon {
            font-size: 1.5em;
            cursor: pointer;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            margin-top: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }
        .card p {
            margin: 10px 0;
        }
        h2{
            color:  #025e8d;
        }
        
    </style>
