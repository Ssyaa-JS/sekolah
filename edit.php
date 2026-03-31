<?php
include_once("config.php");

// Logika Update
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($mysqli, $_POST['id_alat']);
    $kode_alat = mysqli_real_escape_string($mysqli, $_POST['kode_alat']);
    $nama_alat = mysqli_real_escape_string($mysqli, $_POST['nama_alat']);
    $id_kategori = mysqli_real_escape_string($mysqli, $_POST['id_kategori']);
    $merk = mysqli_real_escape_string($mysqli, $_POST['merk']);
    $spesifikasi = mysqli_real_escape_string($mysqli, $_POST['spesifikasi']);
    $jumlah = mysqli_real_escape_string($mysqli, $_POST['jumlah']);
    $kondisi = mysqli_real_escape_string($mysqli, $_POST['kondisi']);
    $id_ruangan = mysqli_real_escape_string($mysqli, $_POST['id_ruangan']);
    $tanggal_perolehan = mysqli_real_escape_string($mysqli, $_POST['tanggal_perolehan']);
    $sumber_dana = mysqli_real_escape_string($mysqli, $_POST['sumber_dana']);
    $harga = mysqli_real_escape_string($mysqli, $_POST['harga']);

    if (!empty($_FILES['foto_alat']['tmp_name'])) {
        $foto_alat = file_get_contents($_FILES['foto_alat']['tmp_name']);
        $foto_alat = mysqli_real_escape_string($mysqli, $foto_alat);
        $query = "UPDATE alat SET kode_alat='$kode_alat', nama_alat='$nama_alat', id_kategori='$id_kategori', merk='$merk', spesifikasi='$spesifikasi', jumlah='$jumlah', kondisi='$kondisi', id_ruangan='$id_ruangan', tanggal_perolehan='$tanggal_perolehan', sumber_dana='$sumber_dana', harga='$harga', foto_alat='$foto_alat' WHERE id_alat=$id";
    } else {
        $query = "UPDATE alat SET kode_alat='$kode_alat', nama_alat='$nama_alat', id_kategori='$id_kategori', merk='$merk', spesifikasi='$spesifikasi', jumlah='$jumlah', kondisi='$kondisi', id_ruangan='$id_ruangan', tanggal_perolehan='$tanggal_perolehan', sumber_dana='$sumber_dana', harga='$harga' WHERE id_alat=$id";
    }

    mysqli_query($mysqli, $query);
    header("Location: index.php");
    exit();
}

// Ambil Data
$id = $_GET['id_alat'];
$result = mysqli_query($mysqli, "SELECT * FROM alat WHERE id_alat=$id");
while ($user_data = mysqli_fetch_array($result)) {
    $kode_alat = $user_data['kode_alat'];
    $nama_alat = $user_data['nama_alat'];
    $id_kategori = $user_data['id_kategori'];
    $merk = $user_data['merk'];
    $spesifikasi = $user_data['spesifikasi'];
    $jumlah = $user_data['jumlah'];
    $kondisi = $user_data['kondisi'];
    $id_ruangan = $user_data['id_ruangan'];
    $tanggal_perolehan = $user_data['tanggal_perolehan'];
    $sumber_dana = $user_data['sumber_dana'];
    $harga = $user_data['harga'];
    $foto_lama = $user_data['foto_alat'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Alat - SekolahApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        .card-3d-clean {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow:
                0 10px 20px -5px rgba(0, 0, 0, 0.04),
                0 25px 40px -10px rgba(0, 0, 0, 0.07);
        }
    </style>
</head>

<body class="flex min-h-screen items-center justify-center p-8">

    <div class="w-full max-w-4xl">

        <div class="mb-6 flex justify-between items-center px-2">
            <h1 class="text-2xl font-bold text-slate-800">SekolahApp</h1>
            <a href="index.php" class="text-sm font-bold text-slate-500 hover:text-indigo-600 transition-all flex items-center gap-2">
                <span class="bg-white border border-slate-200 px-2 py-1 rounded-md shadow-sm">←</span> Kembali ke Home
            </a>
        </div>

        <div class="card-3d-clean rounded-[2.5rem] p-10 md:p-12">

            <div class="mb-10">
                <h2 class="text-xl font-bold text-slate-700 uppercase tracking-widest">Edit Data Alat</h2>
                <div class="h-1 w-12 bg-indigo-600 mt-2 rounded-full"></div>
            </div>

            <form action="edit.php" method="post" enctype="multipart/form-data" class="space-y-6">
                <input type="hidden" name="id_alat" value="<?php echo $id; ?>">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Kode Alat</label>
                        <input type="text" name="kode_alat" value="<?php echo $kode_alat; ?>" required class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Nama Alat</label>
                        <input type="text" name="nama_alat" value="<?php echo $nama_alat; ?>" required class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">ID Kategori</label>
                        <input type="number" name="id_kategori" value="<?php echo $id_kategori; ?>" required class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Merk</label>
                        <input type="text" name="merk" value="<?php echo $merk; ?>" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Jumlah</label>
                        <input type="number" name="jumlah" value="<?php echo $jumlah; ?>" required class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">ID Ruangan</label>
                        <input type="number" name="id_ruangan" value="<?php echo $id_ruangan; ?>" required class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Kondisi</label>
                        <select name="kondisi" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white outline-none transition-all">
                            <option value="Baik" <?php if ($kondisi == "Baik") echo "selected"; ?>>Baik</option>
                            <option value="Rusak Ringan" <?php if ($kondisi == "Rusak Ringan") echo "selected"; ?>>Rusak Ringan</option>
                            <option value="Rusak Berat" <?php if ($kondisi == "Rusak Berat") echo "selected"; ?>>Rusak Berat</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Tgl Perolehan</label>
                        <input type="date" name="tanggal_perolehan" value="<?php echo $tanggal_perolehan; ?>" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Sumber Dana</label>
                        <input type="text" name="sumber_dana" value="<?php echo $sumber_dana; ?>" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Harga (Rp)</label>
                        <input type="number" name="harga" value="<?php echo $harga; ?>" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Foto Alat</label>
                        <div class="flex items-center gap-4">
                            <?php if ($foto_lama): ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($foto_lama); ?>" class="w-14 h-14 object-cover rounded-xl border border-slate-200">
                            <?php endif; ?>
                            <input type="file" name="foto_alat" class="flex-1 text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-slate-200 file:text-slate-700 file:font-bold hover:file:bg-slate-300">
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Spesifikasi</label>
                    <textarea name="spesifikasi" rows="3" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none resize-none transition-all"><?php echo $spesifikasi; ?></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" name="update" class="w-full bg-slate-900 text-white font-bold py-4 rounded-2xl shadow-xl hover:bg-indigo-600 active:scale-[0.98] transition-all tracking-widest text-sm">
                        SIMPAN PERUBAHAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>