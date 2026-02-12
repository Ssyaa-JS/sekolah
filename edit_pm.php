<?php
// Memanggil file koneksi database
include_once("config_pm.php");
 
// Mengecek apakah form sudah disubmit untuk update
if(isset($_POST['update']))
{   
    $id = $_POST['id_peminjam'];

    $nama_peminjam = $_POST['nama_peminjam'];
    $jumlah = $_POST['jumlah'];
    $tingkat = $_POST['tingkat'];
    $tanggal_peminjam = $_POST['tanggal_peminjam'];

    // Update data peminjam
    $result = mysqli_query($mysqli, "UPDATE peminjam SET nama_peminjam='$nama_peminjam', jumlah='$jumlah', tingkat='$tingkat', tanggal_peminjam='$tanggal_peminjam' WHERE id_peminjam=$id");
    
    // Redirect ke halaman index setelah update
    header("Location: index_pm.php");
}
?>

<?php
// Menampilkan data yang dipilih berdasarkan id
$id = $_GET['id_peminjam'];
 
// Fetch data berdasarkan id
$result = mysqli_query($mysqli, "SELECT * FROM peminjam WHERE id_peminjam=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama_peminjam = $user_data['nama_peminjam'];
    $jumlah = $user_data['jumlah'];
    $tingkat = $user_data['tingkat'];
    $tanggal_peminjam = $user_data['tanggal_peminjam'];
}
?>

<html>
<head>  
    <title>Edit Data Peminjam</title>
</head>
 
<body>
    <a href="index_pm.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="edit_pm.php">
        <table border="0">
            <tr> 
                <td>Nama Peminjam</td>
                <td><input type="text" name="nama_peminjam" value="<?php echo $nama_peminjam;?>"></td>
            </tr>
            <tr> 
                <td>Jumlah</td>
                <td><input type="number" name="jumlah" value="<?php echo $jumlah;?>"></td>
            </tr>
            <tr> 
                <td>Tingkat</td>
                <td><input type="text" name="tingkat" value="<?php echo $tingkat;?>"></td>
            </tr>   
            <tr> 
                <td>Tanggal Peminjam</td>
                <td><input type="date" name="tanggal_peminjam" value="<?php echo $tanggal_peminjam;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_peminjam" value="<?php echo $_GET['id_peminjam'];?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>