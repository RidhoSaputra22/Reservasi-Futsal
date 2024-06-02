<?php

require '../../conn.php';

$location = "../../assets/img/lapangan/";


// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'tambah':
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $aksi = $_POST['aksi'];

        $newfilename = uploadFoto($location);

        $sql = "INSERT INTO `tb_lapangan` (`id_lapangan`, `status`, `jenis`, `harga`, `deskripsi`, `foto`) VALUES (NULL, 'Tersedia', '$jenis', '$harga', '$deskripsi', '$newfilename')";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        break;

    case 'edit':
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $id = $_POST['id'];
        $aksi = $_POST['aksi'];

        $nmFoto = $_POST['nmfoto'];
        $id = $_POST['id'];
        $tbName = "tb_lapangan";
        $fotoField = "foto";
        $idField = "id_lapangan";

        updateFoto($nmFoto, $tbName, $id, $idField, $location);

        $sql = "UPDATE `tb_lapangan` SET `jenis` = '$jenis', `harga` = '$harga', `deskripsi` = '$deskripsi' WHERE `tb_lapangan`.`id_lapangan` = '$id'";
        if (mysqli_query($conn, $sql)) {
            exit('sukses');
        }
        break;
    case 'hapus':
        $id = $_POST['id'];

        hapusFoto($location, $id, "tb_lapangan", "id_lapangan");
        
        if(mysqli_query($conn,"DELETE FROM tb_lapangan WHERE `tb_lapangan`.`id_lapangan` = $id")){
            exit('sukses');
        }else{
            exit('gagal');
        }


        break;



        // echo "sukses";


}
