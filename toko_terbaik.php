<?php
    include_once("config.php");
    $result = mysqli_query($conn, "SELECT * FROM store ORDER BY rating DESC")
?>

<section class="toko_terbaik">
    <header class="header-toko-terbaik" aria-label="Toko Terbaik Kamu">
        <h2>Toko Terbaik Untuk Kamu</h2>
        <p>Lihat Semua</p>
    </header>
    <div class="toko__container">
        <?php 
            for ($i = 0; $i<4; $i++){
                $row = mysqli_fetch_array($result);
        ?>
                <div class="toko" style="background-image: url(<?php echo $row['store_img']; ?>);">
                    <div class="toko-info">
                        <div class="toko__nama">
                            <h3> <?php echo $row['store_name']; ?> </h3>
                        </div>
                        <section class="toko-rating">
                            <div class="toko__rating">
                                <div class="logo_rating"></div>
                                <h6> <?php echo $row['rating']; ?> </h6>
                                <h6>Rating</h6>
                            </div>
                            <div class="toko__chat">
                                <h6>> <?php echo $row['balas_chat']. " jam"; ?> </h6>
                                <h6>Balas Chat</h6>
                            </div>
                            <div class="toko__operasi">
                                <h6> <?php echo $row['jam_operasi']; ?> </h6>
                                <h6>Jam Operasi</h6>
                            </div>
                        </section>
                        <div class="btn-kunjungi">
                            <button class="btn__kunjungi">Kunjungi Toko</button>
                        </div>
                    </div>
                </div>
        <?php        
            }
        ?>
    </div>
</section>