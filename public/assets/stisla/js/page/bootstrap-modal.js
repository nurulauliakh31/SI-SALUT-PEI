"use strict";

//Modal Akun
$("#modal-akun-tambah").fireModal({
    title: 'Tambah Akun',
    body: $("#modal-create-akun"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

function modal_edit(id) {
    //console.log("#modal-update-edit"+id);
    $("#modal-user-edit"+id).fireModal({
    title: 'Edit Akun',
    body: $(`#modal-update-edit${id}`),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {
          // Tambahkan kode untuk menangani tombol Simpan jika diperlukan
        }
      }, {
        text: 'Close',
        class: 'btn btn-danger',
        handler: function () {
          // Fungsi untuk menutup modal saat tombol Close ditekan
          $.fireModal.close(); // Memanggil fungsi close dari library fireModal
        }
      }]
    });
  }

//Modal Criteria
$("#modal-criteria-tambah").fireModal({
    title: 'Tambah Akun',
    body: $("#modal-create-criteria"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

$("#modal-criteria-tampil").fireModal({
    title: 'Tambah Akun',
    body: $("#modal-show-criteria"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

//Modal Prodi
$("#modal-prodi-tambah").fireModal({
    title: 'Tambah Akun',
    body: $("#modal-create-prodi"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

function editProdi(id) {
    //console.log("#modal-update-edit"+id);
    $("#modal-prodi-edit"+id).fireModal({
    title: 'Edit Akun',
    body: $(`#modal-edit-prodi${id}`),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
    });
}

//Modal Mahasiswa
$("#modal-mahasiswa-tambah").fireModal({
    title: 'Tambah Akun',
    body: $("#modal-create-mahasiswa"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

function editMahasiswa(id) {
    //console.log("#modal-update-edit"+id);
    $("#modal-mahasiswa-edit"+id).fireModal({
    title: 'Edit Akun',
    body: $(`#modal-edit-mahasiswa${id}`),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
    });
}

//Modal Mahasiswa
$("#modal-kriteria-tambah").fireModal({
    title: 'Tambah Kriteria',
    body: $("#modal-create-kriteria"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

function editKriteria(id) {
    //console.log("#modal-update-edit"+id);
    $("#modal-kriteria-edit"+id).fireModal({
    title: 'Edit Kriteria',
    body: $(`#modal-edit-kriteria${id}`),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
    });
}

//Modal Bobot
$("#modal-bobot-tambah").fireModal({
    title: 'Tambah Bobot',
    body: $("#modal-create-bobot"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

function editBobot(id) {
    //console.log("#modal-update-edit"+id);
    $("#modal-bobot-edit"+id).fireModal({
    title: 'Edit Akun',
    body: $(`#modal-edit-bobot${id}`),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
    });
}

//Modal Mahasiswa
$("#modal-nilai-mahasiswa-tambah").fireModal({
    title: 'Tambah Kriteria',
    body: $("#modal-create-nilai-mahasiswa"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {

        }
    }]
});

function editNilaiMahasiswa(nim) {
    $("#modal-nilai-mahasiswa-edit"+ nim).fireModal({
    title: 'Edit Akun',
    body: $(`#modal-edit-nilai-mahasiswa${nim}`),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    buttons: [{
        text: 'Simpan',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function () {
        }
    }]
    });
}
