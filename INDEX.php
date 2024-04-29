<?php
session_start(); // Start session to store user authentication status

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include 'connect.php';

    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch user from database based on username or email
    $sql = "SELECT * FROM users WHERE username_email = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // User found, verify password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                // Password is correct, set session variables
                $_SESSION['username'] = $row['username_email'];
                $_SESSION['full_name'] = $row['full_name'];

                // Redirect to home page or dashboard
                header("Location: Landin.php");
                exit();
            } else {
                // Password is incorrect, set error message
                $error_message = "Invalid password";
            }
        } else {
            // User not found, set error message
            $error_message = "User not found";
        }
    } else {
        // Error in query
        echo "Error: " . mysqli_error($conn);
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
    <title>UNIVEN Lost & Found - Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/Back.png'); /* Set background image */
            background-size: cover;
            background-position: center;
        }
        .container {
            display: flex;
            align-items: center;
            width: 80%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8); /* Added a semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .left-side {
            flex: 1;
            padding: 30px;
            text-align: center;
            background-color: #025e8d;
            color: #fff;
        }
        .logo {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
            border-radius: 50%;
        }
        .left-side h1 {
            font-size: 2.5em;
            line-height: 1.2;
            margin-bottom: 30px;
        }
        .right-side {
            flex: 1;
            padding: 30px;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #025e8d;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .login-container input[type="submit"] {
            width: 100%;
            background-color: #025e8d;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-container input[type="submit"]:hover {
            background-color: #025e8d;
        }
        .register-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
            color: #025e8d;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .register-link:hover {
            color: #3f9cff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
            <h1>UNIVEN <br> LOST & FOUND</h1>
        </div>
        <div class="right-side">
        <div class="login-container">
    <h2>Please login below</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
        <a href="Register.php" class="register-link">Don't have an account? Register here</a>
        <!-- Error message container -->
       
        <?php if(isset($error_message)) { ?>
                    <p style="color: red;"><?php echo $error_message; ?></p>
                <?php } ?>
    </form>
</div>

        </div>
    </div>
</body>
</html>

