<?php
session_start();
    include("connections.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            //save in d
            $user_id = random_num(20);
            $query = "insert into users (user_id, username, password) values ('$user_id', '$username', '$password')";
            mysqli_query($con,$query);

            // header("Location: login.php");
            // die;
        }else {
            echo "Enter correct Info";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftTasks - Signup</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        #svgelem {
            position: relative;
            left: 48.9%;
            -webkit-transform: translateX(-20%);
            -ms-transform: translateX(-20%);
            transform: translateX(-20%);
        }
        /* Style the logo image */
        #logo {
            display: block;
            margin: 0 auto; /* Center the logo horizontally */
            width: 100px; /* Adjust the width as needed */
            height: auto; /* Maintain aspect ratio */
        }
        </style>
</head>
<body>
    <header>
        <svg id="svgelem" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"/><line x1="96" y1="128" x2="160" y2="128" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="96" y1="160" x2="160" y2="160" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><path d="M56,40H200a8,8,0,0,1,8,8V200a24,24,0,0,1-24,24H72a24,24,0,0,1-24-24V48A8,8,0,0,1,56,40Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="80" y1="24" x2="80" y2="56" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="128" y1="24" x2="128" y2="56" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/><line x1="176" y1="24" x2="176" y2="56" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="8"/></svg>
    </header>
    <h1>SwiftTasks</h1>
    <div class="container">
        <h2>Welcome!</h2>
        <h3>Create a new account</h3>
        <form method="POST" id="signup-form">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Minimum 8 letters" required>
            </div>
            <div class="form-group">
                <label for="re-password">Confirm Your Password:</label>
                <input type="password" id="re-password" name="re-password" placeholder="Enter the Same Password as above" required>
            </div>
            <!-- <div class="form-group custom-checkbox">
                <label for="checkbox"><input type="checkbox" required>I Agree the <a href="tos.html">Terms Of Services</a></label>
            </div> -->
            <div class="form-group">
                <button type="submit" class="btn" value="signup">Create</button>
            </div>
        </form>
        <p class="login-link">Already Have an account? <a href="login.php">Log in</a>.</p>
    </div>
</body>
</html>
