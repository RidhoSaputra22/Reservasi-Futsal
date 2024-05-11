<?php
$URL = "index.php"


?>
<link rel="stylesheet" href="style.css">

<nav>
    <div class="logo">
        <a href="<?= $URL?>">Reservasi Futsal</a>
    </div>
    <div class="navbar">
        <ul>
            <a href="<?= $URL?>#banner">Home</a>
            <a href="<?= $URL?>#about-us">Tentang Kami</a>
            <a href="<?= $URL?>#layanan">Lapangan</a>
        </ul>
    </div>
    <div class="actions">
        <?= (isset($_SESSION['id'])) ? '<a href="akun.php">Akun</a>':'<a href="logout.php">Masuk</a>'?>
        <a href="logout.php">Logout</a>
        
    </div>
</nav>


