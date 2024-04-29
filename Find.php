<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Lost Items</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #025e8d;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar img {
            height: 40px;
            width: auto;
        }

        .search-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-container input[type="text"] {
            width: calc(100% - 100px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-right: 10px;
        }

        .search-container button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-container button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .search-results {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-results h2 {
            color: #025e8d;
            margin-bottom: 20px;
        }

        .search-item {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="Landin.php">
            <img src="img/home.png" alt="Home Icon">
        </a>
        <a href="Landin.php" class="home-link"> </a>
        <div class="search-container">
            <form action=" " method="post">
                <input type="text" name="search" placeholder="Search for lost items...">
                <button type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="search-results">
        <h2>Search Results</h2>
        <?php
        // Include database connection file
        include 'connect.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
            // Get search query from form
            $searchQuery = mysqli_real_escape_string($conn, $_POST['search']);

            // Search for items in the database based on the search query
            $sql = "SELECT * FROM reported_items WHERE itemName LIKE '%$searchQuery%' OR locationFound LIKE '%$searchQuery%' OR itemDescription LIKE '%$searchQuery%'";
            $result = mysqli_query($conn, $sql);

            // Display search results
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Output search results here (e.g., item details)
                    echo '<div class="search-item">';
                    echo '<h3>' . $row['itemName'] . '</h3>';
                    echo '<p>Date Found: ' . $row['dateFound'] . '</p>';
                    echo '<p>Location Found: ' . $row['locationFound'] . '</p>';
                    echo '<p>Contact Name: ' . $row['contactName'] . '</p>';
                    // Add more details if needed
                    echo '</div>';
                }
            } else {
                echo 'No results found.';
            }
        }
        ?>
    </div>

</body>
</html>

