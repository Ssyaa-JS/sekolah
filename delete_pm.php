<?php
// include database connection file
include_once("config_pm.php");
 
// Mengambil id dari URL untuk menghapus data tersebut
// Diubah dari id_alat menjadi id_peminjam
$id = $_GET['id_peminjam'];
 
// Menghapus baris data dari tabel berdasarkan id yang dipilih
$result = mysqli_query($mysqli, "DELETE FROM peminjam WHERE id_peminjam=$id");
 
// Setelah berhasil menghapus, redirect kembali ke halaman utama (index.php)
header("Location:index_pm.php");
?>