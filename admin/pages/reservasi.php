<?php
require "../conn.php"

?>
<div class="main-content">
    <div class="title">Reservasi</div>
    <div class="subtitle">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At ducimus, omnis blanditiis,
        aliquam modi eum exercitationem corrupti atque rerum quam mollitia quasi, eaque magnam qui fuga laboriosam
        pariatur nulla? Ducimus.
        <br>
        <div class="mt-3 py-2 px-3"></div>
    </div>
    <div class="tables">
        <table id="myTable" class="row-border hover compact" width=" 100%">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama User</th>
                    <th>Kode Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk </th>
                    <th>Jam Keluar</th>
                    <th>Status </th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $q = "SELECT * FROM view_reservasi";
                 $res = mysqli_query($conn, $q);
                 $count = 1;
                 while($data = mysqli_fetch_assoc($res)){
                
                ?>

                <tr>
                    <td><?= $count++?>.</td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['id_reservasi']?></td>
                    <td><?= $data['tanggal']?></td>
                    <td><?= $data['masuk']?></td>
                    <td><?= $data['keluar']?></td>
                    <td>
                        <!-- CONFIRM BTN -->
                        <button type="button" id="confirm-btn"
                            class="btn btn-<?= ($data['status'] == "Selesai") ? "primary":"warning"?>" style="width: 100px;"
                            data-bs-toggle="modal" data-bs-target="#confirm" data-id="<?= $data['id_reservasi']?>">
                            <i class="m-1">
                            </i><?= $data['status']?>
                        </button>
                    </td>
                    


                    <!-- MODAL DELETE -->


                </tr>
                <?php
                 }
                ?>


            </tbody>
        </table>

    </div>
</div>
<!-- CONFIRM -->
<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLabel">Konfirmasi Reservasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="post">
                <input type="text" value="1" name="id" style="display: none">

                <div class="modal-body">
                 <h5>Anda yakin ingin konfirmasi</h5>
                 <input type="num" id="cid" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" onclick="confirm()">Iya</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="pages/reservasi.js"></script>