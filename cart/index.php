<?php
include '../user/config.php';
session_start();
$isLoggedIn = isset($_SESSION['username']);


$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['product_price'] * $item['amount'];
}

if (isset($_POST['clear'])) {
    $_SESSION['cart'] = [];
} elseif (isset($_POST['buy'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row['balance'] < $total_price) {
        $error_msg_amount = "Insufficient balance.";
    } else {
        $_SESSION['balance'] = $row['balance'] - $total_price;
        $sql = "UPDATE users SET balance = '{$_SESSION['balance']}' WHERE username='{$_SESSION['username']}'";
        mysqli_query($conn, $sql);
        $success_msg = "Product successfully bought!";
        $_SESSION['cart'] = [];
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>TPB Needs</title>
    <link href="../style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/760cd49c8e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script.js"></script>
    <script>
        window.onload = function() {
            let isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;
            loadGuestMode(isLoggedIn);
            handleGuestAccess(isLoggedIn);
        };
    </script>
</head>

<body>
    <header>
        <div id="upper-header">
            <div id="left" class="h-container">
                <img src="../images/logo.png" id="logo">
                <h2><a href="../">TPBNeeds</a></h2>
            </div>
            <div id="right" class="h-container">
                <a href="../user/login.php" id="login-or-logout">Log In</a>
            </div>
        </div>
        <div id="lower-header">
            <nav id="text-links">
                <ul>
                    <li><a>Beranda</a></li>
                    <li><a>Komunitas</a></li>
                    <li><a>Kategori</a></li>
                    <li><a>Daftar sebagai Penjual</a></li>
                </ul>
            </nav>
            <nav id="icon-links">
                <ul>
                    <li><a class="user-only-link"><i class="fa-solid fa-cart-shopping user-only-link"></i></a></li>
                    <li><a class="user-only-link"><i class="fa-solid fa-bell user-only-link"></i></a></li>
                    <li><a class="user-only-link"><i class="fa-solid fa-envelope user-only-link"></i></a></li>
                    <li><a class="user-only-link" href="../user/topup.php"><i class="fa-solid fa-money-bill user-only-link"></a></i></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <h1>Your Cart</h1>
        <ul>
            <?php
            foreach ($_SESSION['cart'] as $item) {
                echo "<li>" . $item['product_name'] . ", Amount: " . $item['amount'] . "</li>";
            }
            ?>
        </ul>
        <h3>Total Price: <?php echo $total_price?></h3>
        <h3>Your Balance: <?php echo $_SESSION['balance']?></h3>
        <form action="" method="POST">
            <button name="buy">Buy Now</button>
            <button name="clear">Clear Cart</button>
        </form>
        <div class="error-msg"><?php echo isset($error_msg_amount) ? $error_msg_amount : ''; ?></div>
        <div class="success-msg"><?php echo isset($success_msg) ? $success_msg : ''; ?></div>
    </main>

    <footer>

    </footer>
</body>

</html>