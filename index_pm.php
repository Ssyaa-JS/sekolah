<?php
// Memanggil file koneksi database
include_once("config_pm.php");
 
// Mengambil data dari tabel peminjam diurutkan dari yang terbaru
$result = mysqli_query($mysqli, "SELECT * FROM peminjam ORDER BY id_peminjam DESC");
?>

<html>
<head>    
    <title>Database Sekolah - Peminjam</title>
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


<a href="add_pm.php">Add New Data</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Id peminjam</th> 
        <th>nama peminjam</th> 
        <th>jumlah</th> 
        <th>tingkat</th> 
        <th>tanggal peminjam</th> 
        <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_peminjam']."</td>";
        echo "<td>".$user_data['nama_peminjam']."</td>";
        echo "<td>".$user_data['jumlah']."</td>";
        echo "<td>".$user_data['tingkat']."</td>";
        echo "<td>".$user_data['tanggal_peminjam']."</td>";
        echo "<td><a href='edit_pm.php?id_peminjam=$user_data[id_peminjam]'>Edit</a> | <a href='delete_pm.php?id_peminjam=$user_data[id_peminjam]'>Delete</a></td>";
        echo "</tr>";        
    }
    ?>
    </table>
</body>
</html>