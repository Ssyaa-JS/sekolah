<?php
include_once("config.php");

// 1. LOGIKA UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id_peminjam']; // ID lama sebagai kunci
    $nama_peminjam = $_POST['nama_peminjam'];
    $jumlah = $_POST['jumlah'];
    $tingkat = $_POST['tingkat'];
    $tanggal_peminjam = $_POST['tanggal_peminjam'];

    // Update data
    $result = mysqli_query($mysqli, "UPDATE peminjam SET nama_peminjam='$nama_peminjam', jumlah='$jumlah', tingkat='$tingkat', tanggal_peminjam='$tanggal_peminjam' WHERE id_peminjam='$id'");

    header("Location: index_pm.php");
    exit;
}

// 2. LOGIKA TAMPIL DATA (Ambil data buat dimasukin ke form)
if (isset($_GET['id_peminjam'])) {
    $id = $_GET['id_peminjam'];
    $result = mysqli_query($mysqli, "SELECT * FROM peminjam WHERE id_peminjam='$id'");

    if ($user_data = mysqli_fetch_array($result)) {
        $nama_peminjam = $user_data['nama_peminjam'];
        $jumlah = $user_data['jumlah'];
        $tingkat = $user_data['tingkat'];
        $tanggal_peminjam = $user_data['tanggal_peminjam'];
    } else {
        header("Location: index_pm.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Peminjam - SekolahApp</title>
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
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.04), 0 25px 40px -10px rgba(0, 0, 0, 0.07);
        }
    </style>
</head>

<body class="flex min-h-screen items-center justify-center p-8">

    <div class="w-full max-w-2xl card-3d-clean rounded-[2.5rem] p-10 md:p-12">
        <a href="index_pm.php" style="text-decoration: none; color: #64748b; font-weight: bold; font-size: 14px;">⬅️ Go to Home</a>
        <h3 class="text-2xl font-bold text-slate-800 mt-4 uppercase tracking-wider">Edit Peminjam</h3>
        <hr class="my-5 border-slate-100">

        <form action="edit_pm.php" method="post" name="form1">
            <table width="100%" border="0" cellpadding="10">
                <tr>
                    <td class="font-bold text-slate-600 text-sm">ID Peminjam</td>
                    <td>
                        <input type="text" name="id_peminjam" value="<?php echo $id; ?>" readonly
                            class="w-full p-3.5 bg-slate-100 rounded-2xl border border-slate-200 outline-none cursor-not-allowed font-bold text-slate-400 italic">
                    </td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Nama Peminjam</td>
                    <td>
                        <input type="text" name="nama_peminjam" value="<?php echo $nama_peminjam; ?>" required
                            class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 outline-none transition-all font-semibold">
                    </td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Jumlah</td>
                    <td>
                        <input type="number" name="jumlah" value="<?php echo $jumlah; ?>" required
                            class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 transition-all font-semibold">
                    </td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Tingkat</td>
                    <td>
                        <input type="text" name="tingkat" value="<?php echo $tingkat; ?>" required
                            class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 transition-all font-semibold">
                    </td>
                </tr>
                <tr>
                    <td class="font-bold text-slate-600 text-sm">Tanggal Peminjam</td>
                    <td>
                        <input type="date" name="tanggal_peminjam" value="<?php echo $tanggal_peminjam; ?>" required
                            class="w-full p-3.5 bg-slate-50 rounded-2xl border border-slate-200 focus:bg-white focus:border-indigo-500 transition-all font-semibold text-slate-600">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="update" value="Save Changes"
                            class="w-full bg-slate-900 text-white font-bold py-4 rounded-2xl cursor-pointer hover:bg-indigo-600 active:scale-[0.98] transition-all shadow-xl tracking-widest uppercase text-xs">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>