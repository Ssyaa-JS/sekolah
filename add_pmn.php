<!DOCTYPE html>
<html>

<head>
    <title>Add Data Peminjaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        .card-3d {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
        }
    </style>
</head>

<body class="flex min-h-screen items-center justify-center p-6">

    <div class="w-full max-w-2xl card-3d rounded-[2rem] p-10">
        <a href="index_pmn.php" style="text-decoration: none; color: #64748b; font-weight: bold; font-size: 14px;">⬅️ Kembali</a>
        <h3 class="text-2xl font-bold text-slate-800 mt-4">Tambah Peminjaman</h3>
        <hr class="my-4 border-slate-100">

        <form method="post">
            <table width="100%" cellpadding="10">
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Peminjam (Id Peminjam)</td>
                    <td>
                        <select name="id_peminjam" required class="w-full p-3 rounded-xl border border-slate-200 outline-none focus:border-indigo-500">
                            <option value="">-- Pilih Peminjam --</option>
                            <?php
                            include_once("config.php");
                            $res_peminjam = mysqli_query($mysqli, "SELECT id_peminjam, nama_peminjam FROM peminjam");
                            while ($p = mysqli_fetch_assoc($res_peminjam)) {
                                echo "<option value='" . $p['id_peminjam'] . "'>" . $p['id_peminjam'] . " - " . $p['nama_peminjam'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="font-bold text-slate-600 text-sm">Alat (Id Alat)</td>
                    <td>
                        <select name="id_alat" required class="w-full p-3 rounded-xl border border-slate-200 outline-none focus:border-indigo-500">
                            <option value="">-- Pilih Alat --</option>
                            <?php
                            $res_alat = mysqli_query($mysqli, "SELECT id_alat, nama_alat FROM alat");
                            while ($a = mysqli_fetch_assoc($res_alat)) {
                                echo "<option value='" . $a['id_alat'] . "'>" . $a['id_alat'] . " - " . $a['nama_alat'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="font-bold text-slate-600 text-sm">Tanggal Pinjam</td>
                    <td><input type="date" name="tanggal_pinjam" required class="w-full p-3 rounded-xl border border-slate-200 outline-none"></td>
                </tr>

                <tr>
                    <td class="font-bold text-slate-600 text-sm">Tanggal Kontrak</td>
                    <td><input type="date" name="tanggal_kontrak" required class="w-full p-3 rounded-xl border border-slate-200 outline-none"></td>
                </tr>

                <tr>
                    <td class="font-bold text-slate-600 text-sm">Stok (Jumlah)</td>
                    <td><input type="number" name="stok" required min="1" class="w-full p-3 rounded-xl border border-slate-200 outline-none"></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Simpan Data" class="w-full bg-slate-900 text-white font-bold py-3 rounded-xl cursor-pointer hover:bg-indigo-600 transition-all shadow-lg"></td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id_peminjam = $_POST['id_peminjam'];
            $id_alat     = $_POST['id_alat'];
            $tanggal_pinjam  = $_POST['tanggal_pinjam'];
            $tanggal_kontrak = $_POST['tanggal_kontrak'];
            $stok        = $_POST['stok'];

            $query = "INSERT INTO peminjaman (id_peminjam, id_alat, tanggal_pinjam, tanggal_kontrak, stok) 
                  VALUES ('$id_peminjam', '$id_alat', '$tanggal_pinjam', '$tanggal_kontrak', '$stok')";

            $result = mysqli_query($mysqli, $query);

            if ($result) {
                echo "<p class='mt-4 text-center font-bold text-green-600'>✅ Data berhasil ditambahkan!</p>";
            } else {
                echo "<p class='mt-4 text-center font-bold text-red-600'>❌ Gagal: " . mysqli_error($mysqli) . "</p>";
            }
        }
        ?>
    </div>

</body>

</html>