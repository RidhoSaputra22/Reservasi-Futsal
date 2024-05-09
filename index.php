<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Futsal</title>
</head>

<body>

<?php
    include("layout/navbar.php");
    ?>

    <section id="banner">
        <div class="shape"></div>
        <div class="text">
            <div class="title">
                SELAMAT DATANG DI WEB FUTSAL
            </div>
            <div class="subtitle">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat id eum voluptate esse quod, officia
                consequatur aut fugit tenetur eaque.
            </div>
        </div>
    </section>

    <section id="about-us">

        <img src="assets/soccer.png" alt="">

        <div class="text">
            <div class="title">
                SELAMAT DATANG DI WEB FUTSAL
            </div>
            <div class="subtitle">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat id eum voluptate esse quod, officia
                consequatur aut fugit tenetur eaque.
            </div>
        </div>


    </section>
    <section id="layanan">
        <div class="title">Lapangan Tersedia</div>

        <div class="main">
            <a href="detail.php" class="card">
                <img src="assets/lapangan.png" alt="">
            </a>
            <a href="detail.php" class="card">
                <img src="assets/lapangan.png" alt="">
            </a>
            <a href="detail.php" class="card">
                <img src="assets/lapangan.png" alt="">
            </a>
            <a href="detail.php" class="card">
                <img src="assets/lapangan.png" alt="">
            </a>
        </div>
    </section>

    <?php
    include("layout/footer.php");
    ?>


</body>

</html>