<?php
session_start(); // Mulai session jika belum dimulai

// // Cek autentikasi (aktifkan jika sudah ada sistem login yang berfungsi)
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header('Location: login.php');
//     exit;
// }

// Definisikan variabel khusus untuk halaman ini
$pageTitle = "Data Pendaftar";
$currentPage = "pendaftar"; // Untuk menandai menu aktif

// 1. Include Komponen Head HTML
require __DIR__ . '/components/html_head.php'; 
?>

<body class="bg-primary text-gray-300">
    
    <?php 
    // 2. Include Komponen Header Admin
    require __DIR__ . '/components/admin_header.php'; 
    ?>

    <div class="flex min-h-screen pt-[68px] sm:pt-[72px]"> 
        
        <?php 
        // 3. Include Komponen Sidebar Admin
        require __DIR__ . '/components/admin_sidebar.php'; 
        ?>

        <main class="flex-1 p-6 sm:p-8 bg-gray-900 md:ml-64">
            <div class="bg-gray-800 p-6 rounded-xl shadow-lg min-h-full">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-100 mb-4 sm:mb-0">Data Pendaftar</h1>
                    <div class="flex space-x-3">
                        <button class="bg-secondary text-primary px-4 py-2 rounded-button hover:bg-yellow-500 font-medium flex items-center space-x-2">
                            <i class="ri-user-add-line"></i>
                            <span>Tambah Pendaftar</span>
                        </button>
                    </div>
                </div>

                <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
                    <div class="relative">
                        <input type="text" placeholder="Cari nama atau NIM..."
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary placeholder-gray-400">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <div>
                        <select id="filter-status-pendaftar" name="filter-status-pendaftar" class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary">
                            <option value="">Semua Status Pendaftaran</option>
                            <option value="review">Dalam Review</option>
                            <option value="lolos_berkas">Lolos Berkas</option>
                            <option value="wawancara">Wawancara</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                     <button class="bg-gray-600 hover:bg-gray-500 text-gray-200 px-4 py-2.5 rounded-lg font-medium flex items-center justify-center space-x-2 h-[46px] sm:h-auto sm:self-end">
                        <i class="ri-filter-3-line"></i>
                        <span>Filter Pendaftar</span>
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[700px]"> <thead>
                            <tr class="bg-gray-700/50 text-left">
                                <th class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider rounded-tl-lg w-12">
                                    <input type="checkbox" id="select-all-pendaftar" class="cursor-pointer">
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Kontak</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Tgl Daftar</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php 
                            $pendaftar_list = [
                                ["id" => 1, "nama" => "Ahmad Fauzi", "nim" => "201011400001", "email" => "ahmad.f@example.com", "tgl_daftar" => "2025-05-28", "status" => "Dalam Review", "foto" => "https://i.pravatar.cc/150?u=ahmadfauzi"],
                                ["id" => 2, "nama" => "Bunga Citra Lestari", "nim" => "211011400002", "email" => "bunga.c@example.com", "tgl_daftar" => "2025-05-29", "status" => "Lolos Berkas", "foto" => "https://i.pravatar.cc/150?u=bungacitra"],
                                ["id" => 3, "nama" => "Charlie Puth", "nim" => "191011400003", "email" => "charlie.p@example.com", "tgl_daftar" => "2025-05-30", "status" => "Diterima", "foto" => "https://i.pravatar.cc/150?u=charlieputh"],
                                ["id" => 4, "nama" => "Dewi Sandra", "nim" => "221011400004", "email" => "dewi.s@example.com", "tgl_daftar" => "2025-06-01", "status" => "Ditolak", "foto" => "https://i.pravatar.cc/150?u=dewisandra"],
                                ["id" => 5, "nama" => "Eko Patrio", "nim" => "201011400005", "email" => "eko.p@example.com", "tgl_daftar" => "2025-06-02", "status" => "Wawancara", "foto" => "https://i.pravatar.cc/150?u=ekopatrio"],
                            ];

                            if (empty($pendaftar_list)): ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center">
                                            <i class="ri-user-search-line text-4xl mb-2"></i>
                                            <span>Tidak ada data pendaftar yang ditemukan.</span>
                                        </div>
                                    </td>
                                </tr>
                            <?php else:
                                foreach ($pendaftar_list as $pendaftar): 
                                    $status_color = 'text-gray-400 bg-gray-600/30'; 
                                    if ($pendaftar['status'] == 'Dalam Review') $status_color = 'text-secondary bg-secondary/20';
                                    if ($pendaftar['status'] == 'Lolos Berkas') $status_color = 'text-blue-400 bg-blue-500/20';
                                    if ($pendaftar['status'] == 'Wawancara') $status_color = 'text-purple-400 bg-purple-500/20';
                                    if ($pendaftar['status'] == 'Diterima') $status_color = 'text-green-400 bg-green-500/20';
                                    if ($pendaftar['status'] == 'Ditolak') $status_color = 'text-red-400 bg-red-500/20';
                                ?>
                                <tr class="hover:bg-gray-700/50 transition-colors duration-150">
                                    <td class="px-4 py-4">
                                        <input type="checkbox" name="pendaftar_ids[]" value="<?= $pendaftar['id'] ?>" class="cursor-pointer">
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img class="h-10 w-10 rounded-full object-cover mr-3 shrink-0" src="<?= htmlspecialchars($pendaftar['foto']) ?>" alt="<?= htmlspecialchars($pendaftar['nama']) ?>">
                                            <div>
                                                <div class="text-sm font-medium text-gray-100"><?= htmlspecialchars($pendaftar['nama']) ?></div>
                                                <div class="text-xs text-gray-400">NIM: <?= htmlspecialchars($pendaftar['nim']) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                         <div class="text-sm text-gray-200"><?= htmlspecialchars($pendaftar['email']) ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-400"><?= date('d M Y', strtotime($pendaftar['tgl_daftar'])) ?></td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $status_color ?>">
                                            <?= htmlspecialchars($pendaftar['status']) ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-1">
                                            <button title="Lihat Detail" class="text-gray-400 hover:text-secondary p-1.5 rounded-md hover:bg-gray-600/50 transition-colors"><i class="ri-eye-line ri-lg"></i></button>
                                            <button title="Edit Pendaftar" class="text-gray-400 hover:text-blue-400 p-1.5 rounded-md hover:bg-gray-600/50 transition-colors"><i class="ri-pencil-line ri-lg"></i></button>
                                            <button title="Hapus Pendaftar" class="text-gray-400 hover:text-red-400 p-1.5 rounded-md hover:bg-gray-600/50 transition-colors"><i class="ri-delete-bin-line ri-lg"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; 
                            endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
                    <div class="text-sm text-gray-400 mb-4 sm:mb-0">
                        Menampilkan <span class="font-medium text-gray-200">1</span> sampai <span class="font-medium text-gray-200"><?= count($pendaftar_list) ?></span> dari <span class="font-medium text-gray-200"><?= count($pendaftar_list) ?></span> hasil
                    </div>
                    <div class="inline-flex rounded-button shadow-sm">
                        <button class="px-3 py-2 border border-gray-600 bg-gray-700 text-gray-400 rounded-l-lg hover:bg-gray-600 disabled:opacity-50" disabled>
                            <i class="ri-arrow-left-s-line"></i>
                        </button>
                        <button class="pagination-btn px-4 py-2 border-y border-l border-gray-600 bg-secondary text-primary">1</button>
                        <button class="pagination-btn px-4 py-2 border-y border-l border-gray-600 bg-gray-700 text-gray-300 hover:bg-gray-600">2</button>
                        <button class="pagination-btn px-4 py-2 border-y border-l border-gray-600 bg-gray-700 text-gray-300 hover:bg-gray-600">3</button>
                        <button class="px-3 py-2 border border-gray-600 bg-gray-700 text-gray-300 rounded-r-lg hover:bg-gray-600">
                            <i class="ri-arrow-right-s-line"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div> 

    <?php 
    require __DIR__ . '/components/notifications_dropdown.php'; 
    require __DIR__ . '/components/admin_menu_dropdown.php'; 
    require __DIR__ . '/components/mobile_menu.php'; 
    require __DIR__ . '/components/footer_scripts.php'; 
    ?>
</body>
</html>