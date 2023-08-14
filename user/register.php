<?php

include '../config.php';
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $_SESSION['balance'] = 0;
    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {
        $error_msg_uname = "Don't start with a number and include 6-32 alphanumeric characters .";
    } 
    elseif (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $password)) {
        $error_msg_pw = 'Password has to have at least 8 characters, a lowercase and an uppercase letter, a digit, and a special character.';
    }
    else {
        if (!($result->num_rows > 0)) {
            $sql = "INSERT INTO users (username, password, balance) VALUES ('$username', '$password', 0)";
            $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Registration successful!')</script>";
        } else {
            echo "<script>alert('Something went wrong.')</script>";
        }
        $_SESSION['username'] = $username;
        
        header ("Location: ../");
    } else {
        $error_msg_uname = 'Username already taken!';
    }
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
    <title>Sign Up</title>
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
                    <img src="./images/loginimg.png" id="auth-img">
                </div>
            </div>

            <div id="right" class="container">
                <h3>Sign Up for an Account</h3>
                <p>Let's get you all set up so you can set up your first onboarding experience</p>

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

                    <button name="submit">Sign Up</button>
                </form>

                <p>Already have an account? Log in <a href="./login.php">here</a>.</p>
            </div>
        </div>
    </div>
</body>

</html>