<?php
session_start();
require "../conn.php";

// print_r($_POST);




if (isset($_SESSION['id'])) {
    $id_user = $_SESSION['id'];
    /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
    composer require midtrans/midtrans-php
                                  
    Alternatively, if you are not using **Composer**, you can download midtrans-php library 
    (https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
    
    the file manually.   
    
    require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
    require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';
    //SAMPLE REQUEST START HERE

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-fqa_Ds0oLnNqC6Ti00ir6dMT';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;
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

    $isReservasi = mysqli_query($conn, "SELECT * FROM tb_reservasi WHERE tanggal = '$tanggal' AND ((masuk <= '$jam' AND keluar >= '$jam') OR (masuk <= '$jam_keluar' AND keluar >= '$jam_keluar')) AND id_lapangan = '$id_lapangan';");

    if (mysqli_num_rows($isReservasi) > 0) {
        exit("terisi");
    } else {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total_harga,
            ),

        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        echo $snapToken;
    }
} else {
    exit("NOT-LOGIN");
}
