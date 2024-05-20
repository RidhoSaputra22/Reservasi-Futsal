<?php
require "../conn.php"
?>

<style>
table {
    font-size: 12pt;
}
</style>

<div class="main-content">
    <div class="title">Laporan Reservasi</div>
    <div class="subtitle">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At ducimus, omnis blanditiis,
        aliquam modi eum exercitationem corrupti atque rerum quam mollitia quasi, eaque magnam qui fuga laboriosam
        pariatur nulla? Ducimus.
        <br>
        <button class="btn btn-outline-primary mt-3 py-2 px-3" id="download-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                <path
                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
            </svg> Download
        </button>
    </div>
    <div class="tables">
        <table id="myTable" class="row-border hover compact" width=" 100%">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Tanggal </th>
                    <th>Nama </th>
                    <th>Hp </th>
                    <th>Alamat </th>
                    <th>Kode Lapangan</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Total Harga</th>
                    <th>Status</th>

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
                    <td><?= $data['tanggal']?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['hp']?></td>
                    <td><?= $data['alamat']?></td>
                    <td><?= $data['id_lapangan']?></td>
                    <td><?= $data['masuk']?></td>
                    <td><?= $data['keluar']?></td>
                    <td>Rp. <?= number_format($data['total_harga'])?></td>
                    <td><?= ($data['status'] == 'Selesai') ? '
                    <div class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05"/>
                    </svg> Selesai</div>
                    ':'
                    <div class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg> Belum</div>'?></td>

                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


<script>

document.getElementById("download-btn").addEventListener('click', function() {


    $.ajax({
        url: "controller/laporan.php",
        type: "POST",
        data: {
            aksi: "get-data",
        },
        
        success: function(res){
            console.log(res);
            const worksheet = XLSX.utils.json_to_sheet(res);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Dates");
        
            worksheet["!cols"] = [ { wch: 15 } ];
            XLSX.writeFile(workbook, "Reservasi.xlsx", {
                compression: true
            });
        }
    })

});
</script>