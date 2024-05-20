console.log("reservasi.js called");

function reserve() {
  console.log("reserve");
  let id_lapangan = $("#reservasi-btn").attr("data-id");

  let nama = $("#nama").val();
  
  let hp = $("#hp").val();

  let tanggal = $("#tanggal").val();
  let jam = $("#jam").val();
  let lama = $("#lama").val();

  let aksi = "reservasi";

  if (nama == "" || hp == "" || tanggal == "" || jam == "" || lama == "") {
    {
      Swal.fire("", "field tidak boleh kosong", "error");
    }
  } else {
    // GET TOKEN

    let fd = new FormData();
    fd.append("id_lapangan", id_lapangan);
    fd.append("nama", nama);
    fd.append("tanggal", tanggal);
    fd.append("jam", jam);
    fd.append("lama", lama);
    fd.append("hp", hp);
    fd.append("aksi", aksi);

    $.ajax({
      url: "midtrans/token.php",
      type: "POST",
      data: fd,
      contentType: false,
      processData: false,

      success: function (token) {
        console.log("TOKEN: " + token);

        if (token === "NOT-LOGIN") {
          swal
            .fire({
              title: "Anda Belum Login",
              text: "Anda harus login untuk melanjutkan reservasi",
              icon: "error",
              showConfirmButton: true,
            })
            .then(function (isConfirm) {
              if (isConfirm) {
                window.location.replace("login.php");
              }
            });
        }else if (token === "terisi") {
            swal
              .fire({
                title: "Lapangan telah di-Boking",
                text: "Coba di jam lainnya",
                icon: "error",
                showConfirmButton: true,
              })
              .then(function (isConfirm) {});
          }  else {
          window.snap.pay(token, {
            onSuccess: function (result) {
              console.log(result);

              $.ajax({
                url: "admin/controller/reservasi.php",
                type: "POST",
                data: fd,
                contentType: false,
                processData: false,

                success: function (res) {
                  console.log(res);
                  // $('#tambah-modal').modal('hide')
                  if (res === "sukses") {
                    swal
                      .fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                      })
                      .then(function (isConfirm) {
                        if (isConfirm) {
                          window.location.replace("index.php");
                        }
                      });
                  } else if (res === "gagal") {
                    Swal.fire("", "merek telah terdaftar", "error");
                  } else if (res === "NOT-LOGIN") {
                    swal
                      .fire({
                        title: "Anda Belum Login",
                        text: "Anda harus login untuk melanjutkan reservasi",
                        icon: "error",
                        showConfirmButton: true,
                      })
                      .then(function (isConfirm) {
                        if (isConfirm) {
                          window.location.replace("login.php");
                        }
                      });
                  } else if (res === "terisi") {
                    swal
                      .fire({
                        title: "Lapangan telah di-Boking",
                        text: "Coba di jam lainnya",
                        icon: "error",
                        showConfirmButton: true,
                      })
                      .then(function (isConfirm) {});
                  } else {
                    alert("Gagal input !");
                  }
                },
              });
            },
            onPending: function (result) {
              console.log("pending");
              console.log(result);
            },
            onError: function (result) {
              console.log("error");
              console.log(result);
            },
            onClose: function () {
              console.log(
                "customer closed the popup without finishing the payment"
              );
            },
          });
        }
      },
    });
    // console.log(fd);
  }
}
