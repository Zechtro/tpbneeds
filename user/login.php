<?php

include 'config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../index.php"); 
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] === $password) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['balance'] = $row['balance'];
            header("Location: ../");
        } else { 
            $error_msg_pw = "Wrong password.";
        }
    } else {  
        $error_msg_uname = "Username doesn't exist";
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">    
    <title>Login</title>
</head>

<body>
    <div id="main-container">
        <div id="main-window">
            <div id="left" class="container">
                <img src="./images/cloud.png" id="cloud">
                <div id="header">
                    <img src="../images/logo.png" id="logo">
                    <h3>TPBNeeds</h3>
                </div>
                <div id="welcome-text">
                    <h1>Hey There!</h1>
                    <h3>Welcome to TPBNeeds</h3>
                </div>
                <div class="people">
                    <img src="./images/registerimg.png" id="auth-img">
                </div>
            </div>

            <div id="right" class="container">
                <h3>Log in to Your Account</h3>
                <p>Log in to your account so you can continue shopping</p>

                <form method="POST" action="">
                    <div class="input-container">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                        <div class="error-msg"><?php echo isset($error_msg_uname) ? $error_msg_uname : ''; ?></div>
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <div class="error-msg"><?php echo isset($error_msg_pw) ? $error_msg_pw : ''; ?></div>
                    </div>

                    <button name="submit">Log In</button>
                </form>

                <p>Don't have an account? Sign up <a href="./register.php">here</a>.</p>
            </div>
        </div>
    </div>
</body>

</html>