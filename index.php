<?php
include './user/config.php';
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>

<html>

<head>
    <title>TPB Needs</title>
    <link href="style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/760cd49c8e.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <script>
        window.onload = function() {
            let isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;
            loadGuestModeMain(isLoggedIn);
            handleGuestAccessMain(isLoggedIn);
        };
    </script>
</head>

<body>
    <header>
        <div id="upper-header">
            <div id="left" class="h-container">
                <img src="./images/logo.png" id="logo">
                <h2><a href="./">TPBNeeds</a></h2>
            </div>
            <div id="right" class="h-container">
                <a href="./user/login.php" id="login-or-logout">Log In</a>
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
                    <li><a class="user-only-link" href="./cart/"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li><a class="user-only-link"><i class="fa-solid fa-bell"></i></a></li>
                    <li><a class="user-only-link"><i class="fa-solid fa-envelope"></i></a></li>
                    <li><a class="user-only-link" href="./user/topup.php"><i class="fa-solid fa-money-bill"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="store-section">
            <div id="section-header">
                <h3>Daftar Toko</h3>
                <button class="show-all">Lihat Semua</button>
            </div>
            <div id="store-list" class="item-list">
                <?php
                
                $sql = "SELECT * FROM store";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card store-card">';
                    echo '<img src="./images/store/' . $row['store_img'] . '">';
                    echo '<h3>' . $row['store_name'] . '</h3>';
                    echo '<a href="./store?id=' . $row['store_id'] .  '">Kunjungi Toko</a>';
                    echo '</div>';              
                }
                ?>
            </div>
        </section>

        <section id="product-section">
            <div id="section-header">
                <h3>Daftar Produk</h3>
                <button class="show-all">Lihat Semua</button>
            </div>
            <div id="product-list" class="item-list">
                <?php
                
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card product-card">';
                    echo '<img src="./images/product/' . $row['product_img'] . '">';
                    echo '<h3>' . $row['product_name'] . '</h3>';
                    echo '<a href="./product?id=' . $row['product_id'] .  '">Lihat Produk</a>';
                    echo '</div>';              
                }
                ?>
            </div>
        </section>
    </main>

    <footer>

    </footer>
</body>

</html>