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
        <section class="carousel">
            <div class="carousel-container">
                <div class="slide">
                    <div class="slide-text">
                        <p class="carousel__populer">Populer</p>
                        <p class="carousel__buku">Kalkulus Jilid 1</p>
                        <p class="carousel__toko">Ganesha Goods</p>
                        <p class="carousel__deskripsi">*Deskripsi Produk* </p>
                    </div>
                    <section class="masukkan-beli">
                        <button class="btn-masukkan">
                            <p>Masukkan Keranjang</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26" viewBox="0 0 34 32" fill="none">
                                <path d="M8.51415 21.5147L5.8664 5.33334H4.24998C3.87426 5.33334 3.51392 5.19286 3.24825 4.94281C2.98257 4.69276 2.83331 4.35362 2.83331 4C2.83331 3.64638 2.98257 3.30724 3.24825 3.05719C3.51392 2.80714 3.87426 2.66667 4.24998 2.66667H7.06206C7.40383 2.66073 7.73619 2.77211 7.99706 2.98C8.26482 3.19192 8.43949 3.48982 8.48723 3.816L8.9519 6.66667H19.8333V9.33334H9.38823L11.1307 20H24.446L26.571 13.3333H29.529L26.8571 21.716C26.7697 21.9908 26.5904 22.2317 26.3459 22.4029C26.1014 22.5742 25.8048 22.6667 25.5 22.6667H9.93931C9.58786 22.6728 9.24672 22.5548 8.98306 22.336C8.7261 22.1246 8.55904 21.8329 8.51273 21.5147H8.51415ZM14.1666 26.6667C14.1666 27.3739 13.8681 28.0522 13.3368 28.5523C12.8054 29.0524 12.0848 29.3333 11.3333 29.3333C10.5819 29.3333 9.8612 29.0524 9.32984 28.5523C8.79849 28.0522 8.49998 27.3739 8.49998 26.6667C8.49998 25.9594 8.79849 25.2811 9.32984 24.7811C9.8612 24.281 10.5819 24 11.3333 24C12.0848 24 12.8054 24.281 13.3368 24.7811C13.8681 25.2811 14.1666 25.9594 14.1666 26.6667ZM26.9166 26.6667C26.9166 27.3739 26.6181 28.0522 26.0868 28.5523C25.5554 29.0524 24.8348 29.3333 24.0833 29.3333C23.3319 29.3333 22.6112 29.0524 22.0798 28.5523C21.5485 28.0522 21.25 27.3739 21.25 26.6667C21.25 25.9594 21.5485 25.2811 22.0798 24.7811C22.6112 24.281 23.3319 24 24.0833 24C24.8348 24 25.5554 24.281 26.0868 24.7811C26.6181 25.2811 26.9166 25.9594 26.9166 26.6667ZM26.9166 2.66667C27.2924 2.66667 27.6527 2.80714 27.9184 3.05719C28.1841 3.30724 28.3333 3.64638 28.3333 4V5.33334H29.75C30.1257 5.33334 30.486 5.47381 30.7517 5.72386C31.0174 5.97391 31.1666 6.31305 31.1666 6.66667C31.1666 7.02029 31.0174 7.35943 30.7517 7.60948C30.486 7.85953 30.1257 8 29.75 8H28.3333V9.33334C28.3333 9.68696 28.1841 10.0261 27.9184 10.2761C27.6527 10.5262 27.2924 10.6667 26.9166 10.6667C26.5409 10.6667 26.1806 10.5262 25.9149 10.2761C25.6492 10.0261 25.5 9.68696 25.5 9.33334V8H24.0833C23.7076 8 23.3473 7.85953 23.0816 7.60948C22.8159 7.35943 22.6666 7.02029 22.6666 6.66667C22.6666 6.31305 22.8159 5.97391 23.0816 5.72386C23.3473 5.47381 23.7076 5.33334 24.0833 5.33334H25.5V4C25.5 3.64638 25.6492 3.30724 25.9149 3.05719C26.1806 2.80714 26.5409 2.66667 26.9166 2.66667Z" fill="black"/>
                            </svg>
                            <img class="logo-keranjang">
                        </button>
                        <button class="btn-beli">
                            <p>Beli Sekarang</p>
                        </button>
                    </section>
                    <img class="carousel-img" src="images/Calc-book.png">
                </div>
            </div>
        </section>
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