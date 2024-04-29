<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVEN Lost & Found</title>
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
        .container-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap; /* Allow containers to wrap to the next line if needed */
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto; /* Center the containers horizontally */
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
            width: calc(50% - 40px); /* Each container takes 50% of the container-wrapper width */
            max-width: 400px; /* Limit the max width of each container */
        }
        .report-container {
            background-color: #f8f8f8;
        }
        .find-container {
            background-color: #ebebeb;
        }
        h1 {
            color: #025e8d;
            margin-bottom: 15px;
        }
        p {
            color: #333;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #025e8d;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: inline-block; /* Align the button horizontally */
        }
        .btn:hover {
            background-color: #3f9cff;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
        <div class="nav-links">
            <a href="Explore.php" class="nav-link">Explore Lost Items</a>
        </div>
        <a href="INDEX.php"><img class="logout-icon" src="img/icons8-logout-48.png" alt="Logout"></a>

    </div>
    <div class="container-wrapper">
        <div class="container report-container">
            <h1>Report Lost Item</h1>
            <p>Use this section to report any lost items.</p>
            <a href="Report.php" class="btn">Report Lost Item</a>
        </div>
        <div class="container find-container">
            <h1>Find Lost Item</h1>
            <p>Use this section to find any lost items that have been reported.</p>
            <a href="Find.php" class="btn">Find Lost Item</a>
        </div>
    </div>
</body>
</html>


