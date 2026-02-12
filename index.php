<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id_alat DESC");
?>

<html>
<head>    
    <title>Database Sekolah</title>
    <link rel="stylesheet" href="style.css">
</head>

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
    
<a href="add.php">Add New Data</a><br/><br/>
 
    <table width='90%' border=1>
 
    <tr>
        <th>kode_alat</th> 
        <th>nama_alat</th> 
        <th>id_kategori</th> 
        <th>merk</th> 
        <th>spesifikasi</th> 
        <th>jumlah</th> 
        <th>kondisi</th> 
        <th>id_ruangan</th> 
        <th>tanggal_perolehan</th> 
        <th>sumber_dana</th> 
        <th>harga</th> 
        <th>Foto</th> <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['kode_alat']."</td>";
        echo "<td>".$user_data['nama_alat']."</td>";
        echo "<td>".$user_data['id_kategori']."</td>";
        echo "<td>".$user_data['merk']."</td>";
        echo "<td>".$user_data['spesifikasi']."</td>";
        echo "<td>".$user_data['jumlah']."</td>";
        echo "<td>".$user_data['kondisi']."</td>";
        echo "<td>".$user_data['id_ruangan']."</td>";
        echo "<td>".$user_data['tanggal_perolehan']."</td>";
        echo "<td>".$user_data['sumber_dana']."</td>";
        echo "<td>".$user_data['harga']."</td>";  
        
        // Logika untuk menampilkan gambar dari BLOB
        echo "<td>";
        if($user_data['foto_alat']){
            echo '<img src="data:image/jpeg;base64,'.base64_encode($user_data['foto_alat']).'" width="80" height="80">';
        } else {
            echo "No Photo";
        }
        echo "</td>";

        echo "<td><a href='edit.php?id_alat=$user_data[id_alat]'>Edit</a> | <a href='delete.php?id_alat=$user_data[id_alat]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>