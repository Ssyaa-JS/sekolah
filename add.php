<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Alat - SekolahApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        /* Efek Card 3D dengan Stroke halus */
        .card-3d-clean {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            /* Stroke/Garis tepi */
            box-shadow:
                0 10px 20px -5px rgba(0, 0, 0, 0.04),
                0 25px 40px -10px rgba(0, 0, 0, 0.07);
            /* Shadow tebal */
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
                <h2 class="text-xl font-bold text-slate-700 uppercase tracking-widest">Input Data Alat</h2>
                <div class="h-1 w-12 bg-indigo-600 mt-2 rounded-full"></div>
            </div>

            <form action="add.php" method="post" name="form1" enctype="multipart/form-data" class="space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Kode Alat</label>
                        <input type="text" name="kode_alat" required placeholder="TIK-001" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Nama Alat</label>
                        <input type="text" name="nama_alat" required placeholder="Laptop" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-50 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">ID Kategori</label>
                        <input type="number" name="id_kategori" required placeholder="1" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Merk</label>
                        <input type="text" name="merk" placeholder="Asus/Lenovo" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Jumlah</label>
                        <input type="number" name="jumlah" required placeholder="0" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">ID Ruangan</label>
                        <input type="number" name="id_ruangan" required placeholder="10" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Kondisi</label>
                        <select name="kondisi" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white outline-none transition-all">
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Tgl Perolehan</label>
                        <input type="date" name="tanggal_perolehan" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Sumber Dana</label>
                        <input type="text" name="sumber_dana" placeholder="BOS / Komite" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Harga (Rp)</label>
                        <input type="number" name="harga" placeholder="0" class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Foto Alat</label>
                        <input type="file" name="foto_alat" class="w-full text-xs text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-slate-200 file:text-slate-700 file:font-bold hover:file:bg-slate-300">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-[11px] font-bold text-slate-400 uppercase tracking-wider ml-1">Spesifikasi</label>
                    <textarea name="spesifikasi" rows="3" placeholder="Detail teknis..." class="w-full px-4 py-3.5 bg-slate-50 rounded-2xl border border-slate-200 outline-none resize-none transition-all"></textarea>
                </div>

                <div class="pt-4">
                    <button type="submit" name="Submit" class="w-full bg-slate-900 text-white font-bold py-4 rounded-2xl shadow-xl hover:bg-indigo-600 active:scale-[0.98] transition-all tracking-widest text-sm">
                        SIMPAN DATA ALAT
                    </button>
                </div>
            </form>

            <?php
            if (isset($_POST['Submit'])) {
                include_once("config.php");

                $kode_alat = $_POST['kode_alat'];
                $nama_alat = $_POST['nama_alat'];
                $id_kategori = $_POST['id_kategori'];
                $merk = $_POST['merk'];
                $spesifikasi = $_POST['spesifikasi'];
                $jumlah = $_POST['jumlah'];
                $kondisi = $_POST['kondisi'];
                $id_ruangan = $_POST['id_ruangan'];
                $tanggal_perolehan = $_POST['tanggal_perolehan'];
                $sumber_dana = $_POST['sumber_dana'];
                $harga = $_POST['harga'];

                $foto_alat = null;
                if (!empty($_FILES['foto_alat']['tmp_name'])) {
                    $foto_alat = mysqli_real_escape_string($mysqli, file_get_contents($_FILES['foto_alat']['tmp_name']));
                }

                $query = "INSERT INTO alat(kode_alat, nama_alat, id_kategori, merk, spesifikasi, jumlah, kondisi, id_ruangan, tanggal_perolehan, sumber_dana, harga, foto_alat) 
                          VALUES('$kode_alat', '$nama_alat', '$id_kategori', '$merk', '$spesifikasi', '$jumlah', '$kondisi', '$id_ruangan', '$tanggal_perolehan', '$sumber_dana', '$harga', '$foto_alat')";

                if (mysqli_query($mysqli, $query)) {
                    echo "<div class='mt-6 p-4 bg-green-50 border border-green-100 rounded-2xl text-green-700 font-bold text-center animate-pulse'>Data Berhasil Ditambahkan!</div>";
                } else {
                    echo "<div class='mt-6 p-4 bg-red-50 text-red-600 rounded-2xl text-center'>Error: " . mysqli_error($mysqli) . "</div>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>