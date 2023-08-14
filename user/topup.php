<?php

include '../config.php';
session_start();

if (isset($_POST['submit'])) {
    $amount = intval($_POST['amount']);
    $password = $_POST['password'];
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($row['password'] === $password) {
            if (!preg_match('/^[0-9]+$/', ($_POST['amount']))) {
                $error_msg_amount = "Invalid topup value. Please only inlcude numbers.";
            } 
            else {
                $_SESSION['balance'] = $row['balance'] + $amount;
                $sql = "UPDATE users SET balance = '{$_SESSION['balance']}' WHERE username='{$_SESSION['username']}'";
                mysqli_query($conn, $sql);
                $success_msg = "Balance successfully updated!";
            }

        } else {
            $error_msg_pw = "Wrong password.";
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
    <title>Top Up</title>
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
                    <h3>Top up so you can continue buying our amazing products</h3>
                </div>
                <div class="people">
                    <img src="./images/registerimg.png" id="auth-img">
                </div>
            </div>

            <div id="right" class="container">
                <h3>Top Up Your Balance</h3>
                <p>Current balance : <?php echo $_SESSION['balance'];?></p>

                <form method="POST" action="">
                    <div class="input-container">
                        <label for="username">Amount</label>
                        <input type="text" id="amount" name="amount" placeholder="Amount" required>
                        <div class="error-msg"><?php echo isset($error_msg_amount) ? $error_msg_amount : ''; ?></div>
                    </div>

                    <div class="input-container">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <div class="error-msg"><?php echo isset($error_msg_pw) ? $error_msg_pw : ''; ?></div>
                    </div>

                    <button name="submit">Top Up</button>
                </form>
                <div class="success-msg"><?php echo isset($success_msg) ? $success_msg : ''; ?></div>

                <p>All done? Click <a href='../'>here</a> to go back to the home page.</p>
            </div>
        </div>
    </div>
</body>

</html>