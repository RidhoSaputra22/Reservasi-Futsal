<?php

require '../../conn.php';

$aksi = $_POST['aksi'];
switch ($aksi) {
    case 'get-data':

        $sql = mysqli_query($conn,"SELECT * FROM view_reservasi");

        $data = array();
        if (mysqli_num_rows($sql)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        // Menutup koneksi
        $conn->close();

        // Mengembalikan data dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);

        break;
}
