<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update
if(isset($_POST['update']))
{   
    $id = $_POST['id_alat'];
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

    // Cek apakah user mengunggah foto baru
    if(!empty($_FILES['foto_alat']['tmp_name'])) {
        $foto_alat = file_get_contents($_FILES['foto_alat']['tmp_name']);
        $foto_alat = mysqli_real_escape_string($mysqli, $foto_alat);
        
        // Update dengan foto baru
        $query = "UPDATE alat SET 
            kode_alat='$kode_alat', nama_alat='$nama_alat', id_kategori='$id_kategori', 
            merk='$merk', spesifikasi='$spesifikasi', jumlah='$jumlah', kondisi='$kondisi', 
            id_ruangan='$id_ruangan', tanggal_perolehan='$tanggal_perolehan', 
            sumber_dana='$sumber_dana', harga='$harga', foto_alat='$foto_alat' 
            WHERE id_alat=$id";
    } else {
        // Update tanpa mengubah foto yang sudah ada
        $query = "UPDATE alat SET 
            kode_alat='$kode_alat', nama_alat='$nama_alat', id_kategori='$id_kategori', 
            merk='$merk', spesifikasi='$spesifikasi', jumlah='$jumlah', kondisi='$kondisi', 
            id_ruangan='$id_ruangan', tanggal_perolehan='$tanggal_perolehan', 
            sumber_dana='$sumber_dana', harga='$harga' 
            WHERE id_alat=$id";
    }

    $result = mysqli_query($mysqli, $query);
    header("Location: index.php");
}
?>

<?php
// Ambil ID dari URL
$id = $_GET['id_alat']; 
$result = mysqli_query($mysqli, "SELECT * FROM alat WHERE id_alat=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $kode_alat = $user_data['kode_alat'];
    $nama_alat = $user_data['nama_alat'];
    $id_kategori = $user_data['id_kategori'];
    $merk = $user_data['merk'];
    $spesifikasi = $user_data['spesifikasi'];
    $jumlah = $user_data['jumlah'];
    $kondisi = $user_data['kondisi'];   
    $id_ruangan= $user_data['id_ruangan'];
    $tanggal_perolehan = $user_data['tanggal_perolehan'];
    $sumber_dana = $user_data['sumber_dana'];
    $harga = $user_data['harga'];
    $foto_lama = $user_data['foto_alat'];
}
?>

<html>
<head>  
    <title>Edit Data Alat</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit.php" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td>kode_alat</td>
                <td><input type="text" name="kode_alat" value="<?php echo $kode_alat;?>"></td>
            </tr>
            <tr> 
                <td>nama_alat</td>
                <td><input type="text" name="nama_alat" value="<?php echo $nama_alat;?>"></td>
            </tr>
            <tr> 
                <td>id_kategori</td>
                <td><input type="number" name="id_kategori" value="<?php echo $id_kategori;?>"></td>
            </tr>   
            <tr> 
                <td>merk</td>
                <td><input type="text" name="merk" value="<?php echo $merk;?>"></td>
            </tr>
            <tr> 
                <td>spesifikasi</td>
                <td><input type="text" name="spesifikasi" value="<?php echo $spesifikasi;?>"></td>
            </tr>
            <tr> 
                <td>jumlah</td>
                <td><input type="number" name="jumlah" value="<?php echo $jumlah;?>"></td>
            </tr>
            <tr>
                <td>kondisi</td>
                <td>
                    <select name="kondisi">
                        <option value="Baik" <?php if($kondisi=="Baik") echo "selected";?>>Baik</option>
                        <option value="Rusak Ringan" <?php if($kondisi=="Rusak Ringan") echo "selected";?>>Rusak Ringan</option>
                        <option value="Rusak Berat" <?php if($kondisi=="Rusak Berat") echo "selected";?>>Rusak Berat</option>
                    </select>
                </td>
            </tr>
            <tr> 
                <td>id_ruangan</td>
                <td><input type="number" name="id_ruangan" value="<?php echo $id_ruangan;?>"></td>
            </tr>   
            <tr> 
                <td>tanggal_perolehan</td>
                <td><input type="date" name="tanggal_perolehan" value="<?php echo $tanggal_perolehan;?>"></td>
            </tr>
            <tr> 
                <td>sumber_dana</td>
                <td><input type="text" name="sumber_dana" value="<?php echo $sumber_dana;?>"></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="number" name="harga" value="<?php echo $harga;?>"></td>
            </tr>
            <tr> 
                <td>Foto Alat (Baru)</td>
                <td>
                    <?php if($foto_lama): ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($foto_lama); ?>" width="50"><br>
                    <?php endif; ?>
                    <input type="file" name="foto_alat">
                </td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_alat" value="<?php echo $_GET['id_alat'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>