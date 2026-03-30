<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjam - Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-6">
            <a href="index_pm.php" class="text-purple-100 text-sm hover:text-white transition flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg> Kembali ke Beranda
            </a>
            <h2 class="text-2xl font-bold text-white leading-tight">Tambah Peminjam Baru</h2>
            <p class="text-purple-100 text-sm">Isi data diri peminjam dengan lengkap.</p>
        </div>

        <form action="add_pm.php" method="post" name="form1" class="p-8 space-y-5">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_peminjam" required 
                    class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition" 
                    placeholder="Contoh: Budi Santoso">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Jumlah</label>
                    <input type="number" name="jumlah" required 
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                        placeholder="0">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Tingkat/Kelas</label>
                    <input type="text" name="tingkat" required 
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                        placeholder="X RPL 1">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Terdaftar</label>
                <input type="date" name="tanggal_peminjam" required 
                    class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition">
            </div>

            <button type="submit" name="Submit" 
                class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold py-3 rounded-lg hover:shadow-lg hover:opacity-90 transition transform active:scale-[0.98]">
                Simpan Data Peminjam
            </button>

            <?php
            if(isset($_POST['Submit'])) {
                $nama_peminjam = $_POST['nama_peminjam'];
                $jumlah = $_POST['jumlah'];
                $tingkat = $_POST['tingkat'];
                $tanggal_peminjam = $_POST['tanggal_peminjam'];
                
                include_once("config_pm.php");
                $result = mysqli_query($mysqli, "INSERT INTO peminjam(nama_peminjam, jumlah, tingkat, tanggal_peminjam) VALUES('$nama_peminjam', '$jumlah', '$tingkat', '$tanggal_peminjam')");
                
                if($result) {
                    echo "<div class='mt-4 p-3 bg-green-50 text-green-700 border border-green-200 rounded-lg text-sm text-center font-medium'>
                            ✅ Berhasil! <a href='index_pm.php' class='underline'>Lihat Data</a>
                          </div>";
                } else {
                    echo "<div class='mt-4 p-3 bg-red-50 text-red-700 border border-red-200 rounded-lg text-sm text-center'>
                            ❌ Gagal: " . mysqli_error($mysqli) . "
                          </div>";
                }
            }
            ?>
        </form>
    </div>

</body>
</html>