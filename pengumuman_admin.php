<?php
session_start(); // Mulai session jika belum dimulai

// // Cek autentikasi (aktifkan jika sudah ada sistem login yang berfungsi)
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header('Location: login.php');
//     exit;
// }

// Definisikan variabel khusus untuk halaman ini
$pageTitle = "Kelola Pengumuman";
$currentPage = "pengumuman"; // Untuk menandai menu aktif

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
                    <h1 class="text-2xl sm:text-3xl font-semibold text-gray-100 mb-4 sm:mb-0">Kelola Pengumuman</h1>
                    <div class="flex space-x-3">
                        <button class="bg-secondary text-primary px-4 py-2 rounded-button hover:bg-yellow-500 font-medium flex items-center space-x-2">
                            <i class="ri-add-circle-line"></i>
                            <span>Buat Pengumuman Baru</span>
                        </button>
                    </div>
                </div>

                <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
                    <div class="relative">
                        <input type="text" placeholder="Cari judul pengumuman..."
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary placeholder-gray-400">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <div>
                        <select id="filter-status-pengumuman" name="filter-status-pengumuman" class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-1 focus:ring-secondary focus:border-secondary">
                            <option value="">Semua Status</option>
                            <option value="dipublikasikan">Dipublikasikan</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                     <button class="bg-gray-600 hover:bg-gray-500 text-gray-200 px-4 py-2.5 rounded-lg font-medium flex items-center justify-center space-x-2 h-[46px] sm:h-auto sm:self-end">
                        <i class="ri-filter-3-line"></i>
                        <span>Filter</span>
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php 
                    $pengumuman_list = [
                        ["id" => 1, "judul" => "Hasil Seleksi Administrasi Asisten Dosen Ganjil 2025", "tanggal" => "2025-06-23", "status" => "Dipublikasikan", "excerpt" => "Selamat kepada para pendaftar yang telah lolos seleksi administrasi! Tahap selanjutnya adalah tes tertulis yang akan dilaksanakan pada tanggal..."],
                        ["id" => 2, "judul" => "Jadwal Tes Tertulis Calon Asisten Dosen", "tanggal" => "2025-06-20", "status" => "Dipublikasikan", "excerpt" => "Berikut adalah jadwal pelaksanaan tes tertulis untuk calon asisten dosen semester Ganjil 2025. Pastikan Anda memperhatikan jadwal dan mempersiapkan diri dengan baik."],
                        ["id" => 3, "judul" => "Panduan Pendaftaran Open Recruitment", "tanggal" => "2025-06-01", "status" => "Dipublikasikan", "excerpt" => "Simak panduan lengkap pendaftaran open recruitment asisten dosen untuk semester Ganjil 2025. Pastikan semua persyaratan terpenuhi."],
                        ["id" => 4, "judul" => "Draft: Pengumuman Libur Semester", "tanggal" => "2025-07-01", "status" => "Draft", "excerpt" => "Pengumuman terkait jadwal libur akhir semester Ganjil dan awal semester Genap akan segera diinformasikan lebih lanjut. Mohon untuk menunggu informasi resmi."],
                    ];

                    if (empty($pengumuman_list)): ?>
                        <div class="md:col-span-2 lg:col-span-3 py-12 text-center text-gray-500">
                             <div class="flex flex-col items-center">
                                <i class="ri-inbox-unarchive-line text-4xl mb-2"></i>
                                <span>Tidak ada pengumuman yang ditemukan.</span>
                            </div>
                        </div>
                    <?php else:
                        foreach ($pengumuman_list as $pengumuman): 
                            $status_color = 'text-gray-400 bg-gray-600/30'; 
                            $status_icon = 'ri-draft-line';
                            if ($pengumuman['status'] == 'Dipublikasikan') {
                                $status_color = 'text-green-400 bg-green-500/20';
                                $status_icon = 'ri-checkbox-circle-line';
                            }
                            if ($pengumuman['status'] == 'Draft') {
                                $status_color = 'text-yellow-400 bg-yellow-500/20';
                                $status_icon = 'ri-edit-box-line';
                            }
                        ?>
                        <div class="bg-gray-700/60 p-5 rounded-xl shadow-lg flex flex-col justify-between hover:shadow-lg hover:shadow-secondary/20 transition-all duration-300 transform hover:-translate-y-1">
                            <div>
                                <div class="flex justify-between items-start mb-2">
                                    <h2 class="text-lg font-semibold text-gray-100 hover:text-secondary transition-colors cursor-pointer flex-1 pr-2"><?= htmlspecialchars($pengumuman['judul']) ?></h2>
                                    <span class="px-2 py-0.5 text-xs font-semibold rounded-full <?= $status_color ?> flex items-center shrink-0">
                                        <i class="<?= $status_icon ?> mr-1"></i><?= htmlspecialchars($pengumuman['status']) ?>
                                    </span>
                                </div>
                                <p class="text-xs text-gray-400 mb-3">
                                    <i class="ri-calendar-todo-line mr-1"></i>Dipublikasikan: <?= date('d M Y', strtotime($pengumuman['tanggal'])) ?>
                                </p>
                                <p class="text-sm text-gray-300 line-clamp-3 mb-4">
                                    <?= htmlspecialchars($pengumuman['excerpt']) ?>
                                </p>
                            </div>
                            <div class="border-t border-gray-600 pt-3 mt-auto flex justify-end space-x-2">
                                <button title="Lihat Pengumuman" class="text-gray-400 hover:text-secondary p-1.5 rounded-md hover:bg-gray-600/50 transition-colors"><i class="ri-eye-line ri-lg"></i></button>
                                <button title="Edit Pengumuman" class="text-gray-400 hover:text-blue-400 p-1.5 rounded-md hover:bg-gray-600/50 transition-colors"><i class="ri-pencil-line ri-lg"></i></button>
                                <button title="Hapus Pengumuman" class="text-gray-400 hover:text-red-400 p-1.5 rounded-md hover:bg-gray-600/50 transition-colors"><i class="ri-delete-bin-line ri-lg"></i></button>
                            </div>
                        </div>
                        <?php endforeach; 
                    endif; ?>
                </div>

                <div class="mt-8 flex flex-col sm:flex-row justify-between items-center">
                    <div class="text-sm text-gray-400 mb-4 sm:mb-0">
                        Menampilkan <span class="font-medium text-gray-200">1</span> sampai <span class="font-medium text-gray-200"><?= count($pengumuman_list) ?></span> dari <span class="font-medium text-gray-200"><?= count($pengumuman_list) ?></span> hasil
                    </div>
                    <div class="inline-flex rounded-button shadow-sm">
                        <button class="px-3 py-2 border border-gray-600 bg-gray-700 text-gray-400 rounded-l-lg hover:bg-gray-600 disabled:opacity-50" disabled>
                            <i class="ri-arrow-left-s-line"></i>
                        </button>
                        <button class="pagination-btn px-4 py-2 border-y border-l border-gray-600 bg-secondary text-primary">1</button>
                        <button class="pagination-btn px-4 py-2 border-y border-l border-gray-600 bg-gray-700 text-gray-300 hover:bg-gray-600">2</button>
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