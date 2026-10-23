<?php
// Koneksi ke SQLite. File database (nilai.db) otomatis dibuat kalau belum ada.
$db = new PDO('sqlite:' . __DIR__ . '/nilai.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Buat tabel kalau belum ada
$db->exec("CREATE TABLE IF NOT EXISTS mahasiswa (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nim TEXT NOT NULL,
    nama TEXT NOT NULL,
    nilai REAL NOT NULL
)");