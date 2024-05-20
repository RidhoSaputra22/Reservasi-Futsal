<?php

require '../../conn.php';
session_start();



// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'reservasi':
        if (isset($_SESSION['id'])) {
            $id_user = $_SESSION['id'];
        } else {
            exit("NOT-LOGIN");
        }
        
        $id_lapangan = $_POST['id_lapangan'];
        $nama = $_POST['nama'];
        $hp = $_POST['hp'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $lama = $_POST['lama'];
        $role = "user";

        $jam_keluar = date('H:i', strtotime('+' . $lama . ' hour', strtotime($jam)));

        $harga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM tb_lapangan WHERE id_lapangan = '$id_lapangan'"))['harga'];

        $total_harga = $harga * $lama;

        // CEK RESERVASI
        $isReservasi = mysqli_query($conn, "SELECT * FROM tb_reservasi WHERE tanggal = '$tanggal' AND ((masuk <= '$jam' AND keluar >= '$jam') OR (masuk <= '$jam_keluar' AND keluar >= '$jam_keluar')) AND id_lapangan = '$id_lapangan';");

        if (mysqli_num_rows($isReservasi) > 0) {
            exit("terisi");
        } else {
            $sql = "INSERT INTO `tb_reservasi` (`id_reservasi`, `id_user`, `id_lapangan`, `nama`, `hp`, `tanggal`, `masuk`, `keluar`,`total_harga`, `status`) VALUES (NULL, '$id_user', '$id_lapangan', '$nama', '$hp', '$tanggal', '$jam', '$jam_keluar', '$total_harga', 'Selesai')";

            if (mysqli_query($conn, $sql)) {
                exit("sukses");
            } else {
                exit("gagal");
            }
        }


        break;

    case 'confirm':
        $id = $_POST['id'];

        $sql = "UPDATE `tb_reservasi` SET `status` = 'Selesai' WHERE `tb_reservasi`.`id_reservasi` = $id";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        

        break;


    case 'hapus':
        $id = $_POST['id'];

        hapusFoto($location, $id, "tb_users", "id_user");

        if (mysqli_query($conn, "DELETE FROM tb_users WHERE `tb_users`.`id_user` = $id")) {
            exit('sukses');
        } else {
            exit('gagal');
        }


        break;



        // echo "sukses";


}
