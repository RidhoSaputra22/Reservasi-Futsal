console.log("reservasi.js Called");

$(document).on("click", "#confirm-btn", function() {
    let id = $(this).attr("data-id");
    $('#cid').val(id)
   
})

function confirm(){
    console.log("Confirm");

    let id = $('#cid').val()
    let aksi = "confirm"

    let fd = new FormData()

    fd.append("id", id)
    fd.append("aksi", aksi)


    console.log(id);

    $.ajax({
        url: "controller/reservasi.php",
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,

        success: function(res) {
            console.log(res);
            $('#tambah-modal').modal('hide')
            if (res === "sukses") {
                swal.fire({
                    title: "Berhasil",
                    text: "Berhasil Menyimpan Data",
                    icon: "success",
                    showConfirmButton: true,
                }).then(function(isConfirm) {
                    if (isConfirm) {
                        window.location.replace("index.php?page=reservasi");
                    }
                });
            } else if (res === "gagal") {
                Swal.fire('', 'merek telah terdaftar', 'error');
            } else {
                alert("Gagal input !");
            }
        }
    })
}