<html>
<head>
    <title>Add Data Alat</title>
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form action="add.php" method="post" name="form1" enctype="multipart/form-data">
        <table width="25%" border="0">
            <tr> 
                <td>kode_alat</td>
                <td><input type="text" name="kode_alat"></td>
            </tr>
            <tr> 
                <td>nama_alat</td>
                <td><input type="text" name="nama_alat"></td>
            </tr>
            <tr> 
                <td>id_kategori</td>
                <td><input type="number" name="id_kategori"></td>
            </tr>   
            <tr> 
                <td>merk</td>
                <td><input type="text" name="merk"></td>
            </tr>
            <tr> 
                <td>spesifikasi</td>
                <td><input type="text" name="spesifikasi"></td>
            </tr>
            <tr> 
                <td>jumlah</td>
                <td><input type="number" name="jumlah"></td>
            </tr>
            
            <tr>
                <td>kondisi</td>
                <td>
                <select name="kondisi">
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
                </select>
                </td>
            </tr>
            <tr> 
                <td>id_ruangan</td>
                <td><input type="number" name="id_ruangan"></td>
            </tr>   
            <tr> 
                <td>tanggal_perolehan</td>
                <td><input type="date" name="tanggal_perolehan"></td>
            </tr>
            <tr> 
                <td>sumber_dana</td>
                <td><input type="text" name="sumber_dana"></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="number" name="harga"></td>
            </tr>
            <tr> 
                <td>Foto Alat</td>
                <td><input type="file" name="foto_alat"></td> </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    <?php
    if(isset($_POST['Submit'])) {
        $kode_alat = $_POST['kode_alat'];
        $nama_alat = $_POST['nama_alat'];
        $id_kategori = $_POST['id_kategori'];
        $merk = $_POST['merk'];
        $spesifikasi = $_POST['spesifikasi'];
        $jumlah = $_POST['jumlah'];
        $kondisi = $_POST['kondisi'];   
        $id_ruangan= $_POST['id_ruangan'];
        $tanggal_perolehan = $_POST['tanggal_perolehan'];
        $sumber_dana = $_POST['sumber_dana'];
        $harga = $_POST['harga'];       

        include_once("config.php");

        // Logika Upload Foto BLOB
        $foto_alat = null;
        if(!empty($_FILES['foto_alat']['tmp_name'])) {
            // Membaca file gambar menjadi biner
            $foto_alat = file_get_contents($_FILES['foto_alat']['tmp_name']);
            // Mengamankan data biner agar tidak merusak query SQL
            $foto_alat = mysqli_real_escape_string($mysqli, $foto_alat);
        }
                
        // Query Insert (Ditambah kolom foto_alat)
        $query = "INSERT INTO alat(kode_alat, nama_alat, id_kategori, merk, spesifikasi, jumlah, kondisi, id_ruangan, tanggal_perolehan, sumber_dana, harga, foto_alat) 
                  VALUES('$kode_alat', '$nama_alat', '$id_kategori', '$merk', '$spesifikasi', '$jumlah', '$kondisi', '$id_ruangan', '$tanggal_perolehan', '$sumber_dana', '$harga', '$foto_alat')";
        
        $result = mysqli_query($mysqli, $query);
        
        if($result) {
            echo "Data added successfully. <a href='index.php'>View Users</a>";
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
    ?>
</body>
</html>