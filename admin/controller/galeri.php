<?php

require '../../conn.php';

$location = "../../assets/img/lapangan/";


// print_r($_POST);


$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'tambah':

        $id = $_POST['id'];

        $newfilename = uploadFoto($location);

        $sql = "INSERT INTO `tb_galeri` (`id_galeri`, `id_lapangan`, `foto`) VALUES (NULL, '$id', '$newfilename');";

        if (mysqli_query($conn, $sql)) {
            exit("sukses");
        } else {
            exit("gagal");
        }
        break;

    case 'edit':
        $nmFoto = $_POST['nmfoto'];
        $id = $_POST['id'];
        $tbName = "tb_galeri";
        $fotoField = "foto";
        $idField = "id_galeri";
        try {
            updateFoto($nmFoto, $tbName, $id, $idField, $location);
        } catch (Exception $e) {
            exit('gagal');
        };

        exit('sukses');


        break;
    case 'hapus':
        $id = $_POST['id'];

        hapusFoto($location, $id, "tb_galeri", "id_galeri");

        if (mysqli_query($conn, "DELETE FROM tb_galeri WHERE `tb_galeri`.`id_galeri` = $id")) {
            exit('sukses');
        } else {
            exit('gagal');
        }


        break;



        // echo "sukses";


}
