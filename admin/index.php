<?php
session_start();

if ($_SESSION['login'] != "admin") {
	// header("Location: dashboard.php");
	echo '<script>window.location="../login.php"</script>';
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <?php
    include("../assets/assets.php")

    ?>

</head>

<body>


    <section class="contents">
        <?php
            require_once "layouts/sidebar.php"
        ?>
        <div>
            <?php
        require_once "layouts/navbar.php";

        if(isset($_GET['page'])){
            $page = $_GET['page'];

            switch($page){
                case 'anggota':
                    include "pages/anggota.php";
                break;
                case 'reservasi':
                    include "pages/reservasi.php";
                    break;
                case 'detail':
                    include "pages/detail.php";
                break;
                case 'lapangan':
                    include "pages/lapangan.php";
                break;
                case 'rekap':
                    include "pages/rekap.php";
                break;
            }

        }else{
            include "pages/anggota.php";
        }
        ?>
        </div>
    </section>



<script type="text/javascript" src="functions.js"></script>

</body>
<script>
let table = new DataTable('#myTable', {
    // options
    lengthChange: false,
    pageLength: 6,
    responsive: true,
});
</script>

</html>