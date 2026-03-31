<?php
include_once("config.php");

// Query JOIN untuk mengambil data lengkap dari 3 tabel
$query = "SELECT 
            peminjaman.id_peminjaman,
            peminjam.nama_peminjam, 
            peminjam.tingkat,
            alat.nama_alat, 
            alat.merk,
            peminjaman.tanggal_pinjam,
            peminjaman.tanggal_kontrak,
            peminjaman.stok 
          FROM peminjaman
          LEFT JOIN alat ON peminjaman.id_alat = alat.id_alat
          LEFT JOIN peminjam ON peminjaman.id_peminjam = peminjam.id_peminjam
          ORDER BY peminjaman.id_peminjaman DESC";

$result = mysqli_query($mysqli, $query);

if (!$result) {
    die("<div style='color:red; font-family:sans-serif; padding:20px;'><b>Error Database:</b> " . mysqli_error($mysqli) . "</div>");
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Keranjang - SekolahApp</title>
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
            padding: 15px;
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
            <li><a href="index_pm.php" class="px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-indigo-600 transition">Peminjam</a></li>
            <li><a href="index_pmn.php" class="px-4 py-2 rounded-xl text-sm font-bold text-slate-500 hover:text-indigo-600 transition">Peminjaman</a></li>
            <li><a href="keranjang.php" class="px-4 py-2 rounded-xl text-sm font-bold bg-indigo-50 text-indigo-600 border border-indigo-100">Keranjang</a></li>
        </ul>
    </nav>

    <div class="max-w-[98%] mx-auto">
        <div class="mb-6 flex justify-between items-end px-2">
            <div>
                <h2 class="text-2xl font-bold text-slate-800">Keranjang Peminjaman</h2>
                <p class="text-slate-400 text-xs">Rekapitulasi gabungan data alat dan peminjam secara real-time.</p>
            </div>
            <div class="text-right">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Record</span>
                <div class="text-2xl font-black text-indigo-600"><?php echo mysqli_num_rows($result); ?></div>
            </div>
        </div>

        <div class="card-3d rounded-[2rem] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr>
                            <th class="w-12 text-center">No</th>
                            <th>Peminjam & Tingkat</th>
                            <th>Alat & Merk</th>
                            <th class="text-center">Tgl Pinjam</th>
                            <th class="text-center">Tgl Kembali</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($data = mysqli_fetch_array($result)) {
                        ?>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="text-center font-bold text-slate-300"><?php echo $no++; ?></td>

                                    <td>
                                        <div class="font-bold text-slate-700">
                                            <?php echo ($data['nama_peminjam'] ?? "<span class='text-rose-500 italic'>Peminjam Terhapus</span>"); ?>
                                        </div>
                                        <div class="text-[10px] font-bold text-indigo-400 uppercase"><?php echo $data['tingkat'] ?? '-'; ?></div>
                                    </td>

                                    <td>
                                        <div class="font-bold text-indigo-600">
                                            <?php echo ($data['nama_alat'] ?? "<span class='text-rose-500 italic'>Alat Terhapus</span>"); ?>
                                        </div>
                                        <div class="text-[10px] text-slate-400 font-semibold uppercase"><?php echo $data['merk'] ?? '-'; ?></div>
                                    </td>

                                    <td class="text-center text-slate-500 text-[11px] font-medium">
                                        <?php echo date('d M Y', strtotime($data['tanggal_pinjam'])); ?>
                                    </td>
                                    <td class="text-center text-rose-500 text-[11px] font-bold">
                                        <?php echo date('d M Y', strtotime($data['tanggal_kontrak'])); ?>
                                    </td>

                                    <td class="text-center">
                                        <span class="bg-slate-800 text-white px-3 py-1 rounded-lg text-xs font-bold">
                                            <?php echo $data['stok']; ?>
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <div class="flex gap-2 justify-center">
                                            <a href="edit_pmn.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>"
                                                class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition shadow-sm border border-amber-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                </svg>
                                            </a>
                                            <a href="javascript:void(0)"
                                                onclick="confirmDelete(<?php echo $data['id_peminjaman']; ?>)"
                                                class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition shadow-sm border border-red-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='py-20 text-center text-slate-400 font-medium italic'>Belum ada rekap data peminjaman di sistem.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="bg-slate-50 p-4 border-t border-slate-100">
                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest text-center italic">© 2026 SekolahApp - Sistem Informasi Inventaris Terintegrasi</p>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Data Rekap?',
                text: "Tindakan ini akan menghapus riwayat peminjaman ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Ga Jadi euyyy',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "delete_pmn.php?id_peminjaman=" + id;
                }
            })
        }
    </script>

</body>

</html>