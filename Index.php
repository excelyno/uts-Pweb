<?php
require 'koneksi.php';

// Ambil semua data mahasiswa
$data = $db->query("SELECT * FROM mahasiswa ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);

// Hitung rata-rata nilai dari seluruh data (pakai fungsi AVG milik SQL)
$rata = $db->query("SELECT AVG(nilai) FROM mahasiswa")->fetchColumn();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input & Rekap Nilai Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="container my-4">
    <h3 class="mb-4">Input & Rekap Nilai Mahasiswa</h3>

    <!-- FORM INPUT -->
    <div class="card mb-4">
        <div class="card-header">Input Nilai</div>
        <div class="card-body">
            <form action="Simpan.php" method="post" id="formNilai">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="nim" class="form-control" placeholder="NIM" required>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="nilai" class="form-control" placeholder="Nilai" step="0.01" required>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- REKAP -->
    <div class="card">
        <div class="card-header">Rekap Nilai</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (count($data) == 0): ?>
                    <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
                <?php endif; ?>

                <?php foreach ($data as $i => $row): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($row['nim']) ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= $row['nilai'] ?></td>
                        <td>
                            <a href="Hapus.php?id=<?= $row['id'] ?>"
                               class="btn btn-sm btn-danger btn-hapus">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="alert alert-info mb-0">
                Rata-rata nilai seluruh data:
                <strong><?= $rata !== null ? number_format($rata, 2) : '0' ?></strong>
            </div>
        </div>
    </div>
</div>

<script src="./Script.js"></script>
</body>
</html>