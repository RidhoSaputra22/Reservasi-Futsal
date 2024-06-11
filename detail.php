<?php
session_start();
require "conn.php";

$req = mysqli_query($conn, "SELECT * FROM tb_lapangan WHERE id_lapangan = '$_GET[id]'");
$data = mysqli_fetch_assoc($req);

$now_date = Date('Y-m-d');
$now_time = Date('H:i');

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $res_user = mysqli_query($conn, "SELECT nama, hp FROM tb_users WHERE role = 'user' AND id_user = '$id'");
    $data_user = mysqli_fetch_assoc($res_user);
    
}else{
    $data_user['nama'] = '';
    $data_user['hp'] = '';

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Futsal</title>



    <!-- JQUERY -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/DataTables/datatables.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-Sh3wGKHVSP3NM6lF" async></script>
    <link rel="stylesheet" href="assets/DataTables/datatables.css">
    <!-- SWEETALERT -->
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>
</head>
<body>
    <?php
    include("layout/navbar.php");
    ?>
    <section id="detail-product">
        <img src="assets/img/lapangan/<?= $data['foto']?>" alt="">
        <div class="detail">
            <div class="text">
                <div class="title">Lapangan <?= $data['id_lapangan']?></div>
                <div class="subtitle">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores nesciunt
                    blanditiis mollitia totam odio voluptates repellendus facere, maxime at fuga?</div>
            </div>
            <ul>Feature
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
            </ul>
            <div class="price">
                Rp <?= number_format($data['harga'])?> / Jam
            </div>

        </div>


    </section>
    <?php
    $q_galeri = "SELECT * FROM tb_galeri WHERE id_lapangan = '$_GET[id]'";
    $res_galeri = mysqli_query($conn, $q_galeri);

    if(mysqli_num_rows($res_galeri) >= 1){

        
        
        ?>

<section class="product-slider">
    <?php
                while($data_galeri = mysqli_fetch_assoc($res_galeri)){
                    ?>
                <a href="assets/img/lapangan/<?=$data_galeri['foto']?>">
                    
                <img src="assets/img/lapangan/<?=$data_galeri['foto']?>" alt="" srcset="">
            </a>
            
            <?php
        }
        }?>
    </section>

    <section id="jadwal">
        <p class="header">Jadwal Reservasi</p>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $q_l = "SELECT * FROM tb_reservasi WHERE id_lapangan = '$_GET[id]'";
                $res_l = mysqli_query($conn, $q_l);
                while($data_l = mysqli_fetch_assoc($res_l)){
                ?>

                <tr>
                    <td><?= $data_l['tanggal']?></td>
                    <td><?= $data_l['nama']?></td>
                    <td><?= $data_l['masuk']?></td>
                    <td><?= $data_l['keluar']?></td>
                </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

    </section>

    <section id="reservasi">

        <div>
            <div class="input-form">
                <p>Nama</p>
                <input type="text" id="nama" value="<?= $data_user['nama']?>">
            </div>

            <div class="input-form">
                <p>No. Hp</p>
                <input type="text" id="hp" value="<?= $data_user['hp']?>">
            </div>

            <div class="divide-input">
                <div class="input-form">
                    <p>Tanggal</p>
                    <input type="date" id="tanggal" min="<?= $now_date?>" value="<?= $now_date?>">
                </div>
                <div class="input-form">
                    <p>Jam Masuk</p>
                    <input type="time" id="jam" value="<?= $now_time?>">
                </div>
                <div class="input-form">
                    <p>Lama Main (Jam)</p>
                    <input type="number" id="lama" min="1" max="3" value="1" onchange="hitungHarga()">
                </div>
            </div>
            <div class="input-form">
                <p>Total Harga</p>
                <input type="text" id="harga" value="<?=number_format($data['harga'])?>" readonly>
            </div>

            <div class="input-form">
                <button onclick="reserve()" id="reservasi-btn" data-id="<?= $data['id_lapangan']?>">Submit</button>
            </div>


        </div>

        <img src="assets/soccer.png" alt="">


    </section>



    <script type="text/javascript">
    let table = new DataTable('#myTable', {
        // options
        lengthChange: false,
        pageLength: 6,
        responsive: true,
    });

    function hitungHarga() {
        let harga = <?= $data['harga']?>;
        let jam = $('#lama').val()

        document.getElementById('harga').value = (harga * jam).toLocaleString()


    }
    </script>
    <script src="reservasi.js"></script>

</body>

</html>