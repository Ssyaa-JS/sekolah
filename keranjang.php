<?php
// Memanggil koneksi database
include_once("config_pmn.php");

$query = "SELECT 
            peminjaman.id_peminjaman,
            peminjam.nama_peminjam, 
            peminjam.tingkat,
            alat.nama_alat, 
            alat.merk,
            peminjaman.tanggal_pinjam,
            peminjaman.tanggal_kontrak,
            peminjaman.stok 
          FROM peminjaman
          LEFT JOIN alat ON peminjaman.id_alat = alat.id_alat
          LEFT JOIN peminjam ON peminjaman.id_peminjam = peminjam.id_peminjam
          ORDER BY peminjaman.id_peminjaman DESC";

$result = mysqli_query($mysqli, $query);

// Cek error untuk membantu debug
if (!$result) {
    die("Error Database: " . mysqli_error($mysqli));
}
?>

<html>
<head>    
    <title>Keranjang Rekap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
  <div class="nav-brand">SEKOLAH</div>

  <ul class="nav-menu">
    <li><a href="index.php">Alat</a></li>
    <li><a href="index_pm.php">Peminjam</a></li>
    <li><a href="index_pmn.php">Peminjaman</a></li>
    <li><a href="keranjang.php">Keranjang</a></li>
  </ul>
</nav>
    <br>

    <h2>Keranjang Peminjaman</h2>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr bgcolor="#f2f2f2">
            <th>No</th>
            <th>Nama Peminjam</th> 
            <th>Tingkat</th>
            <th>Nama Alat</th> 
            <th>Merk</th>
            <th>Tgl Pinjam</th> 
            <th>Tgl Kontrak</th>
            <th>Jumlah (Stok)</th>
            <th>Aksi</th>
        </tr>

        <?php  
        $no = 1;
        // Cek apakah ada data yang ditemukan
        if(mysqli_num_rows($result) > 0) {
            while($data = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo "<td>".($data['nama_peminjam'] ?? "<i>Data Hilang</i>")."</td>";
                echo "<td>".$data['tingkat']."</td>";
                echo "<td>".($data['nama_alat'] ?? "<i>Data Hilang</i>")."</td>";
                echo "<td>".$data['merk']."</td>";
                echo "<td>".$data['tanggal_pinjam']."</td>";
                echo "<td>".$data['tanggal_kontrak']."</td>";
                echo "<td>".$data['stok']."</td>";
                echo "<td>
                        <a href='edit_pmn.php?id_peminjaman=".$data['id_peminjaman']."'>Edit</a> | 
                        <a href='delete_pmn.php?id_peminjaman=".$data['id_peminjaman']."' onclick='return confirm(\"Hapus?\")'>Hapus</a>
                      </td>";
                echo "</tr>";        
            }
        } else {
            echo "<tr><td colspan='9' align='center'>Data tidak ditemukan di tabel peminjaman.</td></tr>";
        }
        ?>
    </table>

</body>
</html>