<?php
// Create database connection using config file
include_once("config_pmn.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM peminjaman ORDER BY id_peminjaman DESC");
?>

<html>
<head>    
    <title>Database Sekolah</title>
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
    
<a href="add_pmn.php">Add New Data</a><br/><br/>
    <table width='90%' border=1>
 
    <tr>      
        <th>id_alat</th> 
        <th>id_peminjam</th> 
        <th>tanggal_pinjam</th> 
        <th>tanggal_kontrak</th> 
        <th>stok</th> 
        <th>Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_alat']."</td>";
        echo "<td>".$user_data['id_peminjam']."</td>";
        echo "<td>".$user_data['tanggal_pinjam']."</td>";
        echo "<td>".$user_data['tanggal_kontrak']."</td>";
        echo "<td>".$user_data['stok']."</td>";
        echo "<td><a href='edit_pmn.php?id_peminjaman=$user_data[id_peminjaman]'>Edit</a> | <a href='delete_pmn.php?id_peminjaman=$user_data[id_peminjaman]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>