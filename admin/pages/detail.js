console.log("Detail.js Called");

const url = "controller/galeri.php";
const page = "index.php?page=detail";
let img = "../assets/img/produk/";


function tambah() {
    let id = $('#tid').val()
    let files = $('#tfoto')[0].files[0]


    let aksi = "tambah"
    
    if (id == "" || files == null) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');
        }
    } else {
        let fd = new FormData();
        fd.append('id', id)
        fd.append('foto', files)
        
        fd.append('aksi', aksi)

        $.ajax({
            url: url,
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
                            window.location.replace(page+"&id="+id);
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

// Edit
$(document).on("click", "#edit-btn", function() {
   

    let id = $(this).attr("data-id");
    let foto = $(this).attr("data-foto");
  

    $('#uid').val(id)
    // $('#ufoto').val(foto)


    img += foto

    document.getElementById('pratinjauGambar0').innerHTML = '<img class="img-thumbnail" src="'+img+'" width="100px" height="100px"/>';

})


function edit() {
    let id_produk = $('#tid').val()

    let id = $('#uid').val()
    let files = $('#ufoto')[0].files[0]
    let foto = $('#ufoto').val()

    // console.log(foto);
    let aksi = "edit"

    if (files == null) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');

        }
    } else {
        let fd = new FormData();
        fd.append('id', id)
        fd.append('nmfoto', foto)
        fd.append('foto', files)



        fd.append('aksi', aksi)

        $.ajax({
            url: url,
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
                            window.location.replace(page+"&id="+id_produk);
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
    console.log(id);
    
    $('#did').val(id)
})

function hapus() {
    let id_produk = $('#tid').val()

    console.log($('#did').val())
    let id = $('#did').val();
    let aksi = 'hapus'

    let fd = new FormData();
        fd.append('id', id)
        fd.append('aksi', aksi)

    $.ajax({
        url:url,
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
                            window.location.replace(page+"&id="+id_produk);
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