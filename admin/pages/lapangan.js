console.log("Lapangan.js Called");
function tambah(){
    let jenis = $("#tjenis").val();
    let harga = $("#tharga").val();
    let deskripsi = $("#tdeskripsi").val();
    let files = $('#tfoto')[0].files[0]
    let aksi = "tambah"


    if (jenis == "" || harga == "" || deskripsi == "" || files == null) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');
        }
    } else {
        let fd = new FormData();
        fd.append('jenis', jenis)
        fd.append('harga', harga)
        fd.append('deskripsi', deskripsi)
        fd.append('foto', files)
        fd.append('aksi', aksi)



        $.ajax({
            url: "controller/lapangan.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,

            success: function(res) {
                console.log(res);
                $('#modal-tambah').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace("index.php?page=lapangan");
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
}

$(document).on("click", "#edit-btn", function() {
    let id = $(this).attr("data-id")
    let jenis = $(this).attr("data-jenis")
    let harga = $(this).attr("data-harga")
    let foto = $(this).attr("data-foto")
    let deskripsi = $(this).attr("data-deskripsi")

    $('#ujenis').val(jenis)
    $('#uharga').val(harga)
    $('#udeskripsi').val(deskripsi)
    $('#uid').val(id)


    let location = "../assets/img/lapangan/";
    location += foto

    document.getElementById('pratinjauGambar0').innerHTML = '<img class="img-thumbnail" src="'+location+'" width="100px" height="100px"/>';

})

function edit() {
    let jenis = $('#ujenis').val()
    let harga = $('#uharga').val()
    let deskripsi = $('#udeskripsi').val()
    let id = $('#uid').val()
    let foto = $('#ufoto').val()
    // console.log(foto);
    let files = $('#ufoto')[0].files[0]
    let aksi = "edit"

    if (jenis == "" || harga == "" || deskripsi == "") {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');

        }
    } else {
        let fd = new FormData();
        fd.append('jenis', jenis)
        fd.append('id', id)
        fd.append('harga', harga)
        fd.append('deskripsi', deskripsi)
        fd.append('foto', files)
        fd.append('nmfoto', foto)
        fd.append('aksi', aksi)

        $.ajax({
            url: "controller/lapangan.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,

            success: function(res) {
                console.log(res);
                $('#edit-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace("index.php?page=lapangan");
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
}


$(document).on('click', '#delete-btn', function() {
    let id = $(this).attr("data-id");
    
    $('#did').val(id)
})

function hapus() {
    console.log($('#did').val())
    let id = $('#did').val();
    let aksi = 'hapus'

    let fd = new FormData();
        fd.append('id', id)
        fd.append('aksi', aksi)

    $.ajax({
        url: "controller/lapangan.php",
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,

        success: function(res){
            console.log(res);
                $('#delete-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace("index.php?page=lapangan");
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