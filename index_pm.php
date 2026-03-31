<?php
include_once("config.php");
// Ambil data peminjam diurutkan dari yang terbaru
$result = mysqli_query($mysqli, "SELECT * FROM peminjam ORDER BY id_peminjam DESC");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjam - SekolahApp</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        .card-3d {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        th {
            background-color: #f8fafc;
            color: #64748b;
            font-size: 0.7rem;
            text-transform: uppercase;
            padding: 12px 15px;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #f1f5f9;
            color: #1e293b;
            font-size: 0.8rem;
        }
    </style>
</head>

<body class="p-6 md:p-10">

    <nav class="max-w-[98%] mx-auto mb-8 flex flex-col md:flex-row justify-between items-center gap-4 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
        <div class="text-xl font-extrabold text-slate-800 uppercase">Sekolah<span class="text-indigo-600">App</span></div>
        <ul class="flex gap-2">
            <li><a href="index.php" class="px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-indigo-600 transition">Alat</a></li>
            <li><a href="index_pm.php" class="px-4 py-2 rounded-xl text-sm font-bold bg-indigo-50 text-indigo-600 border border-indigo-100">Peminjam</a></li>
            <li><a href="index_pmn.php" class="px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-indigo-600 transition">Peminjaman</a></li>
            <li><a href="keranjang.php" class="px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-indigo-600 transition">Keranjang</a></li>
        </ul>
    </nav>

    <div class="max-w-[98%] mx-auto">
        <div class="mb-6 flex justify-between items-center px-2">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Daftar Peminjam</h2>
            </div>
            <a href="add_pm.php" class="bg-slate-900 text-white px-6 py-2.5 rounded-xl font-bold text-sm hover:bg-indigo-600 transition shadow-lg flex items-center gap-2">
                <span>+</span> Add New Peminjam
            </a>
        </div>

        <div class="card-3d rounded-[2rem] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="w-20">ID</th>
                            <th>Nama Peminjam</th>
                            <th class="text-center">Total Pinjam</th>
                            <th class="text-center">Tingkat / Jabatan</th>
                            <th>Tgl Terdaftar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($result)) { ?>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="font-bold text-indigo-600 italic">#<?php echo $data['id_peminjam']; ?></td>
                                <td class="font-bold text-slate-700"><?php echo $data['nama_peminjam']; ?></td>

                                <td class="text-center">
                                    <span class="bg-slate-100 px-2.5 py-1 rounded-md font-bold text-xs text-slate-600">
                                        <?php echo $data['jumlah']; ?>
                                    </span>
                                </td>

                                <td class="text-center">
                                    <span class="px-2 py-1 rounded-lg text-[10px] font-bold bg-indigo-50 text-indigo-600 border border-indigo-100 uppercase tracking-wider">
                                        <?php echo $data['tingkat']; ?>
                                    </span>
                                </td>

                                <td class="text-slate-500 text-[11px]">
                                    <?php echo date('d M Y', strtotime($data['tanggal_peminjam'])); ?>
                                </td>

                                <td class="text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="edit_pm.php?id_peminjam=<?php echo $data['id_peminjam']; ?>"
                                            class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0)"
                                            onclick="confirmDelete(<?php echo $data['id_peminjam']; ?>)"
                                            class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="bg-slate-50 p-4 border-t border-slate-100 text-center">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Total Peminjam Terdaftar: <?php echo mysqli_num_rows($result); ?></p>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Peminjam?',
                text: "Data orang ini akan dihapus permanen dari sistem!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5', // Indigo
                cancelButtonColor: '#64748b', // Slate
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Ga Jadi euyyy',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Pastikan file delete_pm.php tersedia
                    window.location.href = "delete_pm.php?id_peminjam=" + id;
                }
            })
        }
    </script>

</body>

</html>