<?php
session_start(); // Mulai session jika belum dimulai

// // Cek autentikasi (contoh, Anda mungkin sudah punya ini di file terpisah)
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header('Location: login.php');
//     exit;
// }

// Definisikan variabel khusus untuk halaman ini
$pageTitle = "Admin Dashboard";
$currentPage = "dashboard"; // Untuk menandai menu aktif di sidebar & mobile menu

// 1. Include Komponen Head HTML
require 'components/html_head.php';
?>

<body class="bg-primary text-gray-300">

    <?php
    // 2. Include Komponen Header Admin
    require 'components/admin_header.php';
    ?>

    <div class="flex min-h-screen pt-[68px] sm:pt-[72px]">

        <?php
        // 3. Include Komponen Sidebar Admin
        require 'components/admin_sidebar.php';
        ?>

        <main class="flex-1 p-6 sm:p-8 bg-gray-900 md:ml-64">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div
                    class="bg-gray-800 p-6 rounded-2xl shadow-xl hover:shadow-secondary/30 transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between min-h-[160px]">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-400 text-base font-medium">Total Pendaftar</h3>
                        <div
                            class="w-12 h-12 bg-secondary/10 rounded-xl flex items-center justify-center text-secondary">
                            <i class="ri-group-2-fill ri-xl"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-5xl font-bold text-gray-50 mt-3">248</p>
                        <p class="text-xs text-gray-500 mt-1">Mahasiswa telah mendaftar.</p>
                    </div>
                </div>

                <div
                    class="bg-gray-800 p-6 rounded-2xl shadow-xl hover:shadow-green-500/30 transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between min-h-[160px]">
                    <div class="flex items-center justify-between">
                        <h3 class="text-gray-400 text-base font-medium">Lolos Seleksi</h3>
                        <div
                            class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center text-green-400">
                            <i class="ri-user-follow-fill ri-xl"></i>
                        </div>
                    </div>
                    <div>
                        <p class="text-5xl font-bold text-gray-50 mt-3">156</p>
                        <p class="text-xs text-gray-500 mt-1">Pendaftar memenuhi kriteria awal.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-lg mb-8">
                <div class="p-6 border-b border-gray-700">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <h2 class="text-xl font-semibold text-gray-100 mb-2 sm:mb-0">Pendaftar Terbaru</h2>
                        <a href="pendaftar.php"
                            class="text-secondary hover:text-yellow-500 font-medium text-sm inline-flex items-center">
                            Lihat Semua Pendaftar <i class="ri-arrow-right-s-line ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-700/50 text-left">
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Nama
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Status
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal
                                    Daftar</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img class="h-10 w-10 rounded-full object-cover mr-3"
                                            src="https://i.pravatar.cc/150?u=olivia" alt="Olivia Anderson">
                                        <div>
                                            <div class="text-sm font-medium text-gray-100">Olivia Anderson</div>
                                            <div class="text-xs text-gray-400">olivia.a@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-secondary/20 text-secondary rounded-full">Dalam
                                        Review</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-400">2 Juni 2025</td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="text-secondary hover:text-yellow-500 font-medium text-sm">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img class="h-10 w-10 rounded-full object-cover mr-3"
                                            src="https://i.pravatar.cc/150?u=marcus" alt="Marcus Chen">
                                        <div>
                                            <div class="text-sm font-medium text-gray-100">Marcus Chen</div>
                                            <div class="text-xs text-gray-400">marcus.c@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-400 rounded-full">Diterima</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-400">1 Juni 2025</td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="text-secondary hover:text-yellow-500 font-medium text-sm">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-4 text-center <?php echo (2 > 0) ? 'hidden' : ''; ?>">
                    <p class="text-gray-500">Belum ada pendaftar terbaru.</p>
                </div>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-lg">
                <div class="p-6 border-b border-gray-700">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <h2 class="text-xl font-semibold text-gray-100 mb-2 sm:mb-0">Jadwal Wawancara Hari Ini</h2>
                        <a href="jadwal_wawancara.php"
                            class="text-secondary hover:text-yellow-500 font-medium text-sm inline-flex items-center">
                            Lihat Semua Jadwal <i class="ri-arrow-right-s-line ml-1"></i>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div
                            class="flex items-center justify-between p-4 bg-gray-700/70 rounded-lg hover:bg-gray-700 transition-colors duration-150">
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-10 h-10 bg-secondary/20 rounded-full flex items-center justify-center text-secondary shrink-0">
                                    <i class="ri-calendar-check-line ri-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-100">Wawancara dengan Emily Watson</h3>
                                    <p class="text-xs text-gray-400">Pewawancara: Dr. Indah P.</p>
                                </div>
                            </div>
                            <div class="text-right shrink-0 ml-4">
                                <p class="text-sm font-semibold text-gray-100">09:00 WIB</p>
                                <p class="text-xs text-gray-400">30 menit</p>
                            </div>
                        </div>
                        <div
                            class="flex items-center justify-between p-4 bg-gray-700/70 rounded-lg hover:bg-gray-700 transition-colors duration-150">
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-10 h-10 bg-secondary/20 rounded-full flex items-center justify-center text-secondary shrink-0">
                                    <i class="ri-calendar-check-line ri-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-100">Wawancara dengan David Kim</h3>
                                    <p class="text-xs text-gray-400">Pewawancara: Prof. Budi S.</p>
                                </div>
                            </div>
                            <div class="text-right shrink-0 ml-4">
                                <p class="text-sm font-semibold text-gray-100">11:00 WIB</p>
                                <p class="text-xs text-gray-400">45 menit</p>
                            </div>
                        </div>
                        <div class="pt-4 text-center <?php echo (2 > 0) ? 'hidden' : ''; ?>">
                            <p class="text-gray-500">Tidak ada jadwal wawancara lain untuk hari ini.</p>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div> <?php
    // 4. Include Komponen Dropdown Notifikasi
    require 'components/notifications_dropdown.php';

    // 5. Include Komponen Dropdown Menu Admin
    require 'components/admin_menu_dropdown.php';

    // 6. Include Komponen Menu Mobile
    require 'components/mobile_menu.php';

    // 7. Include Komponen Skrip Footer
    require 'components/footer_scripts.php';
    ?>
</body>

</html>