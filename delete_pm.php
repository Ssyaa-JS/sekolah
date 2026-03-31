<?php
// Cukup pakai satu config yang sudah kita sepakati
include_once("config.php");

// Ambil ID peminjaman dari URL
// Pastikan namanya sesuai dengan yang dikirim dari index (id_peminjaman)
if (isset($_GET['id_peminjaman'])) {
    $id = $_GET['id_peminjaman'];

    // Hapus data berdasarkan ID Peminjaman
    $result = mysqli_query($mysqli, "DELETE FROM peminjaman WHERE id_peminjaman=$id");

    // Balik ke halaman rekap/keranjang
    header("Location: keranjang.php");
} else {
    // Kalau ID gak ada, balik aja ke index
    header("Location: index_pmn.php");
}
