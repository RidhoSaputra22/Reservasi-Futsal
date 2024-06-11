<?php
session_start();
require "conn.php";


$now_date = Date('Y-m-d');
$now_time = Date('H:i');

if ($_SESSION['id']) {
    $id = $_SESSION['id'];
    $res_user = mysqli_query($conn, "SELECT * FROM tb_users WHERE role = 'user' AND id_user = '$id'");
    $data_user = mysqli_fetch_assoc($res_user);
} else {
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


    <link rel="stylesheet" href="assets/DataTables/datatables.css">

    <!-- SWEETALERT -->
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>
</head>

<body>



    <?php
    include("layout/navbar.php");

    ?>

    <section id="detail-user">
        <img src="assets/img/users/<?= $data_user['foto']?>" alt="">
        <div class="detail">

            <div class="text">
                <div class="title">Selamat Datang, <?= $data_user['nama']?> </div>
                <div class="subtitle">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores nesciunt
                    blanditiis mollitia totam odio voluptates repellendus facere, maxime at fuga?</div>
            </div>
            <ul>Data Pribadi
                <li>
                    <div>Alamat:</div>
                    <div><?= $data_user['nama']?></div>
                </li>
                <li>
                    <div>Hp:</div>
                    <div><?= $data_user['hp']?></div>
                </li>
                <li>
                    <div>Username:</div>
                    <div><?= $data_user['username']?></div>
                </li>
                <li>
                    <div>Password:</div>
                    <div><?= $data_user['password']?></div>
                </li>

            </ul>


        </div>

    </section>


   
    <section id="jadwal">
        <p class="header">History Reservasi</p>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
            <?php
                $q_l = "SELECT * FROM tb_reservasi WHERE id_user = '$_SESSION[id]'";
                $res_l = mysqli_query($conn, $q_l);
                $count_l = 1;
                while($data_l = mysqli_fetch_assoc($res_l)){
                ?>

                <tr>
                    <td><?= $count_l++?>.</td>
                    <td><?= $data_l['tanggal']?></td>
                    <td><?= $data_l['nama']?></td>
                    <td><?= $data_l['masuk']?></td>
                    <td><?= $data_l['keluar']?></td>
                    <td><?= $data_l['status']?></td>

                </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

    </section>

    <script type="text/javascript">
    
    
    let table = new DataTable('#myTable', {
        // options
        lengthChange: false,
        pageLength: 6,
        responsive: true,
    });

   
    </script>

</body>

</html>