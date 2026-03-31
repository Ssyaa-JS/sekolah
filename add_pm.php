<!DOCTYPE html>
<html>

<head>
    <title>Add Peminjam</title>
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

    <div class="w-full max-w-2xl card-3d-clean rounded-[2.5rem] p-10 md:p-12">
        <a href="index_pm.php" style="text-decoration: none; color: #64748b; font-weight: bold; font-size: 14px;">⬅️ Go to Home</a>
        <h3 class="text-2xl font-bold text-slate-800 mt-4 uppercase tracking-wider">Add Peminjam</h3>
        <hr class="my-5 border-slate-100">

        <form action="add_pm.php" method="post" name="form1">
            <table width="100%" border="0" cellpadding="10">
                <tr>
                    <td class="font-bold text-slate-600 text-sm">ID Peminjam</td>
                    <td><input type="text" name="id_peminjam" placeholder="Input ID" class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all italic"></td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Nama Peminjam</td>
                    <td><input type="text" name="nama_peminjam" required class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all"></td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Jumlah</td>
                    <td><input type="number" name="jumlah" required class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 transition-all"></td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Tingkat</td>
                    <td><input type="text" name="tingkat" required class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 transition-all"></td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Tanggal Peminjam</td>
                    <td><input type="date" name="tanggal_peminjam" required class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 transition-all"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Submit" value="Add" class="w-full bg-slate-900 text-white font-bold py-4 rounded-2xl cursor-pointer hover:bg-indigo-600 active:scale-[0.98] transition-all shadow-xl tracking-widest"></td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['Submit'])) {
            $id_peminjam = $_POST['id_peminjam']; // Ambil ID
            $nama_peminjam = $_POST['nama_peminjam'];
            $jumlah = $_POST['jumlah'];
            $tingkat = $_POST['tingkat'];
            $tanggal_peminjam = $_POST['tanggal_peminjam'];

            include_once("config_pm.php");

            // Query disesuaikan: Jika ID diisi manual, masukkan ke kolom id_peminjam
            if (!empty($id_peminjam)) {
                $sql = "INSERT INTO peminjam(id_peminjam, nama_peminjam, jumlah, tingkat, tanggal_peminjam) 
                    VALUES('$id_peminjam', '$nama_peminjam', '$jumlah', '$tingkat', '$tanggal_peminjam')";
            } else {
                $sql = "INSERT INTO peminjam(nama_peminjam, jumlah, tingkat, tanggal_peminjam) 
                    VALUES('$nama_peminjam', '$jumlah', '$tingkat', '$tanggal_peminjam')";
            }

            $result = mysqli_query($mysqli, $sql);

            if ($result) {
                echo "<div class='mt-6 p-4 bg-green-50 border border-green-100 rounded-2xl text-green-700 font-bold text-center'>✅ Data added successfully. <a href='index_pm.php' class='underline ml-1'>View Data</a></div>";
            } else {
                echo "<div class='mt-6 p-4 bg-red-50 text-red-600 rounded-2xl text-center font-bold'>❌ Error: " . mysqli_error($mysqli) . "</div>";
            }
        }
        ?>
    </div>

</body>

</html>