<?php
require 'koneksi.php';

// Ambil data dari form
$nim   = $_POST['nim'];
$nama  = $_POST['nama'];
$nilai = $_POST['nilai'];

// Simpan ke database (prepared statement supaya aman dari SQL injection)
$stmt = $db->prepare("INSERT INTO mahasiswa (nim, nama, nilai) VALUES (?, ?, ?)");
$stmt->execute([$nim, $nama, $nilai]);

// Kembali ke halaman utama
header('Location: Index.php');
exit;