<?php
include '../user/config.php';
session_start();
$isLoggedIn = isset($_SESSION['username']);

$product_id = $_GET['id'];
$sql = "SELECT * FROM product WHERE product_id = $product_id";
$result = mysqli_query($conn, $sql);
$product_row = mysqli_fetch_assoc($result);
$product_price = $product_row['price'];

if (isset($_POST['add-to-cart'])) {
    if (!$isLoggedIn) {
        $error_msg_auth = "Please log in first!";
    } else {
        if (isset($_SESSION['cart'])) {
            $in_cart = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['product_id'] === $product_id) {
                    $in_cart = true;
                    $item['amount'] += 1;
                }
            }

            if (!$in_cart) {
                $_SESSION['cart'][] = array("product_id" => $product_id, "product_name" => $product_row['product_name'],
                "product_price" => $product_price, "amount" => 1);
            }

            unset($item);

        } else {
            $_SESSION['cart'] = array(array("product_id" => $product_id, "product_name" => $product_row['product_name'],
            "product_price" => $product_price, "amount" => 1));
        }
        $success_msg = "Successfully added to cart!";
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
                    <li><a class="user-only-link" href="../cart/"><i class="fa-solid fa-cart-shopping user-only-link"></i></a></li>
                    <li><a class="user-only-link"><i class="fa-solid fa-bell user-only-link"></i></a></li>
                    <li><a class="user-only-link"><i class="fa-solid fa-envelope user-only-link"></i></a></li>
                    <li><a class="user-only-link" href="../user/topup.php"><i class="fa-solid fa-money-bill user-only-link"></a></i></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div id="image-container">
            <img src="../images/product/<?php echo $product_row['product_img']?>">
        </div>
        <div id="product-info">
            <h1><?php echo $product_row['product_name']?></h1>
            <h3>Your balance: <?php echo isset($_SESSION['balance']) ? $_SESSION['balance'] : ''?></h3>
            <h3>Price: <?php echo $product_price?></h3>

            <form action="" method="POST">
                <button name="add-to-cart"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
            </form>
            <div class="error-msg"><?php echo isset($error_msg_auth) ? $error_msg_auth : ''; ?></div>
            <div class="error-msg"><?php echo isset($error_msg_amount) ? $error_msg_amount : ''; ?></div>
            <div class="success-msg"><?php echo isset($success_msg) ? $success_msg : ''; ?></div>
        </div>
    </main>

    <footer>

    </footer>
</body>

</html>