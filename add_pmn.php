<!DOCTYPE html>
<html>
<head>
    <title>Add Data Peminjaman</title>
    
</head>
<body>

<div class="container">
    <a href="index_pmn.php">⬅️ Kembali</a>
    <h3>Tambah Peminjaman</h3>
    <hr>

    <form method="post">
        <table>
            <tr>
                <td>Peminjam (Id Peminjam)</td>
                <td>
                    <select name="id_peminjam" required>
                        <option value="">-- Pilih Peminjam --</option>
                        <?php
                        include_once("config.php");
                        $res_peminjam = mysqli_query($mysqli, "SELECT id_peminjam, nama_peminjam FROM peminjam");
                        while($p = mysqli_fetch_assoc($res_peminjam)) {
                            echo "<option value='".$p['id_peminjam']."'>".$p['id_peminjam']." - ".$p['nama_peminjam']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Alat (Id Alat)</td>
                <td>
                    <select name="id_alat" required>
                        <option value="">-- Pilih Alat --</option>
                        <?php
                        $res_alat = mysqli_query($mysqli, "SELECT id_alat, nama_alat FROM alat");
                        while($a = mysqli_fetch_assoc($res_alat)) {
                            echo "<option value='".$a['id_alat']."'>".$a['id_alat']." - ".$a['nama_alat']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Tanggal Pinjam</td>
                <td><input type="date" name="tanggal_pinjam" required></td>
            </tr>

            <tr>
                <td>Tanggal Kontrak</td>
                <td><input type="date" name="tanggal_kontrak" required></td>
            </tr>

            <tr>
                <td>Stok (Jumlah)</td>
                <td><input type="number" name="stok" required min="1"></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Simpan Data" class="btn"></td>
            </tr>
        </table>
    </form>

    <?php
if (isset($_POST['submit'])) {
    $id_peminjam = $_POST['id_peminjam']; // Diambil dari dropdown
    $id_alat     = $_POST['id_alat'];     // Diambil dari dropdown
    $tanggal_pinjam  = $_POST['tanggal_pinjam'];
    $tanggal_kontrak = $_POST['tanggal_kontrak'];
    $stok        = $_POST['stok'];

    // JANGAN masukkan id_peminjaman ke dalam kolom INSERT
    // Biarkan database mengisinya secara otomatis
    $query = "INSERT INTO peminjaman (id_peminjam, id_alat, tanggal_pinjam, tanggal_kontrak, stok) 
              VALUES ('$id_peminjam', '$id_alat', '$tanggal_pinjam', '$tanggal_kontrak', '$stok')";

    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "<p style='color:green;'>✅ Data berhasil ditambahkan!</p>";
    } else {
        echo "<p style='color:red;'>❌ Gagal: " . mysqli_error($mysqli) . "</p>";
    }
}
?>
</div>

</body>
</html>