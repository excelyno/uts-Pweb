// Validasi: nilai harus 0 - 100 sebelum form dikirim
document.getElementById('formNilai').addEventListener('submit', function (e) {
    var nilai = parseFloat(this.nilai.value);
    if (nilai < 0 || nilai > 100) {
        alert('Nilai harus antara 0 sampai 100!');
        e.preventDefault();
    }
});

// Konfirmasi sebelum menghapus data
var tombolHapus = document.querySelectorAll('.btn-hapus');
tombolHapus.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
        if (!confirm('Yakin hapus data ini?')) {
            e.preventDefault();
        }
    });
});