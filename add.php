<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat - Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen p-4 md:p-8">

    <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold">Registrasi Alat Baru</h1>
                    <p class="text-blue-100 mt-1">Masukkan spesifikasi teknis dan foto alat secara detail.</p>
                </div>
                <a href="index.php" class="bg-white/20 hover:bg-white/30 px-4 py-2 rounded-xl transition backdrop-blur-sm text-sm">
                    ⬅️ Dashboard
                </a>
            </div>
        </div>

        <form action="add.php" method="post" enctype="multipart/form-data" class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="space-y-4">
                    <h3 class="font-semibold text-slate-800 border-b pb-2">Informasi Dasar</h3>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Kode Alat</label>
                        <input type="text" name="kode_alat" placeholder="Contoh: ALT-001" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Nama Alat</label>
                        <input type="text" name="nama_alat" placeholder="Nama Perangkat" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Kategori (ID)</label>
                            <input type="number" name="id_kategori" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Jumlah</label>
                            <input type="number" name="jumlah" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Kondisi</label>
                        <select name="kondisi" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="font-semibold text-slate-800 border-b pb-2">Detail Teknis & Foto</h3>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Merk / Brand</label>
                        <input type="text" name="merk" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Spesifikasi</label>
                        <textarea name="spesifikasi" rows="2" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition"></textarea>
                    </div>
                    
                    <div class="bg-blue-50 p-4 rounded-2xl border-2 border-dashed border-blue-200">
                        <label class="block text-sm font-semibold text-blue-700 mb-2 italic">Foto Alat (Maks 2MB)</label>
                        <input type="file" name="foto_alat" class="text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition cursor-pointer">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-600 mb-1">Tanggal Perolehan</label>
                        <input type="date" name="tanggal_perolehan" class="w-full px-4 py-2 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none transition">
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t flex flex-col items-center">
                <button type="submit" name="Submit" class="w-full md:w-64 bg-indigo-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all active:scale-95">
                    🚀 Daftarkan Alat
                </button>
            </div>

            <?php
            if(isset($_POST['Submit'])) {
                // ... (Logika PHP kamu tetap sama, hanya ganti variabel koneksi jika perlu)
                include_once("config.php");
                
                $kode_alat = $_POST['kode_alat'];
                $nama_alat = $_POST['nama_alat'];
                $id_kategori = $_POST['id_kategori'];
                $merk = $_POST['merk'];
                $spesifikasi = $_POST['spesifikasi'];
                $jumlah = $_POST['jumlah'];
                $kondisi = $_POST['kondisi'];   
                $id_ruangan= $_POST['id_ruangan'] ?? 0;
                $tanggal_perolehan = $_POST['tanggal_perolehan'];
                $sumber_dana = $_POST['sumber_dana'] ?? '-';
                $harga = $_POST['harga'] ?? 0;

                $foto_alat = null;
                if(!empty($_FILES['foto_alat']['tmp_name'])) {
                    $foto_alat = mysqli_real_escape_string($mysqli, file_get_contents($_FILES['foto_alat']['tmp_name']));
                }

                $query = "INSERT INTO alat(kode_alat, nama_alat, id_kategori, merk, spesifikasi, jumlah, kondisi, id_ruangan, tanggal_perolehan, sumber_dana, harga, foto_alat) 
                          VALUES('$kode_alat', '$nama_alat', '$id_kategori', '$merk', '$spesifikasi', '$jumlah', '$kondisi', '$id_ruangan', '$tanggal_perolehan', '$sumber_dana', '$harga', '$foto_alat')";
                
                $result = mysqli_query($mysqli, $query);
                
                if($result) {
                    echo "<div class='mt-6 p-4 bg-green-50 text-green-700 rounded-2xl text-center border border-green-100 font-medium animate-bounce'>✅ Alat berhasil ditambahkan!</div>";
                } else {
                    echo "<div class='mt-6 p-4 bg-red-50 text-red-700 rounded-2xl text-center border border-red-100'>❌ Error: " . mysqli_error($mysqli) . "</div>";
                }
            }
            ?>
        </form>
    </div>

</body>
</html>