<?php
require 'Koneksi.php';

$id = $_GET['id'];

$stmt = $db->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->execute([$id]);

header('Location: Index.php');
exit;