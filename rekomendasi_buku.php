<?php
    include_once("config.php");
    $result = mysqli_query($conn, "SELECT * FROM store ORDER BY rating DESC")
?>

<header class="header-rekomendasi">
    <h2>Rekomendasi Buku Untuk Kamu</h2>
    <a href="">Lihat Semua</a>
</header>
<div class="buku-container">
    <div class="buku">
        <img class="buku__img" src="images/Calc-store-display.png">
        <div class="buku__container">
            <div class="buku__judul">
                <h3>Kalkulus Purcell Jilid 2</h3>
            </div>
            <!-- <div class="buku__kategori">
                <h6>Preloved</h6>
            </div> -->
            <section class="buku__info">
                <div class="buku__harga">
                    <p>Rp 60.000</p>
                </div>
                <div class="btn-more">
                    <button class="btn__more">More</button>
                </div>
                <div class="btn-buku__masukkan">
                    <button></button>
                </div>
            </section>
        </div>
    </div>
</div>