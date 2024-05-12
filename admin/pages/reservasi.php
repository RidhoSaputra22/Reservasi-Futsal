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
                    <th>Tanggal Masuk </th>
                    <th>Tanggal Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                    <td><?= $count++?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['id_reservasi']?></td>
                    <td><?= $data['masuk']?></td>
                    <td><?= $data['keluar']?></td>
                    <td>
                        <!-- CONFIRM BTN -->
                        <button type="button" id="confirm-btn"
                            class="btn btn-<?= ($data['status'] == "Selesai") ? "primary":"warning"?> w-100"
                            data-bs-toggle="modal" data-bs-target="#confirm" data-id="<?= $data['id_reservasi']?>">
                            <i class="m-1">
                            </i><?= $data['status']?>
                        </button>
                    </td>
                    <td>
                        <!-- DELETE BTN -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DELETE1">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></i>HAPUS
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

<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLabel">Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="#" method="post">
                <input type="text" value="1" name="id" style="display: none">

                <div class="modal-body">
                    <h1 class="fs-5">Anda Yakin Ingin Menghapus?</h1>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary" name="hapus">Iya</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="pages/reservasi.js"></script>