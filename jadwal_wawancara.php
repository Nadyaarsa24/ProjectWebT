<?php
// session_start(); // Jika Anda menggunakan session, pastikan ini ada di paling atas
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     header('Location: login.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Wawancara - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { primary: "#000000", secondary: "#ffcc00" }, // Primer: Hitam, Sekunder: Kuning
                    borderRadius: {
                        none: "0px",
                        sm: "4px",
                        DEFAULT: "8px",
                        md: "12px",
                        lg: "16px",
                        xl: "20px",
                        "2xl": "24px",
                        "3xl": "32px",
                        full: "9999px",
                        button: "8px",
                    },
                },
            },
        };
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        input[type="checkbox"] {
            @apply appearance-none w-5 h-5 border-2 border-gray-500 rounded cursor-pointer relative checked:bg-secondary checked:border-secondary;
        }
        input[type="checkbox"]:checked::after {
            content: '';
            @apply absolute w-[5px] h-[10px] border-primary border-r-2 border-b-2 top-[2px] left-[6px] rotate-45;
        }
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1f2937; 
        }
        ::-webkit-scrollbar-thumb {
            background: #4b5563; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280; 
        }
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0.8); 
        }
    </style>
</head>

<body class="bg-primary text-gray-300">
    <header class="bg-primary shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
            <a href="dashboard.php" class="text-2xl font-['Pacifico'] text-secondary">BANSUSS</a>
            <div class="flex items-center space-x-3 sm:space-x-4">
                <div class="relative">
                    <button id="notifications-btn"
                        class="w-10 h-10 flex items-center justify-center text-gray-300 hover:text-secondary relative">
                        <i class="ri-notification-3-line ri-lg"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                </div>
                <div class="relative hidden md:flex">
                    <button id="admin-menu-btn" class="flex items-center space-x-2 text-gray-100 hover:text-secondary">
                        <div class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center">
                             <i class="ri-user-line text-secondary"></i> </div>
                        <span class="font-medium">Admin</span>
                        <i class="ri-arrow-down-s-line"></i>
                    </button>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" title="Buka Menu" aria-label="Buka Menu" class="p-2 text-gray-200 hover:text-secondary focus:outline-none">
                        <i class="ri-menu-line ri-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div class="flex min-h-screen pt-[68px] sm:pt-[72px]">
        <aside class="w-0 md:w-64 bg-primary border-r border-gray-700 fixed h-full hidden md:block pt-4">
            <nav class="p-4 space-y-1">
                <a href="dashboard.php"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg"> 
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-dashboard-line"></i>
                    </div>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="pendaftar.php"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg"> 
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-user-3-line"></i>
                    </div>
                    <span>Pendaftar</span>
                </a>
                <a href="jadwal_wawancara.php"
                    class="flex items-center space-x-3 px-4 py-3 text-secondary bg-gray-700 rounded-lg"> 
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-calendar-2-line"></i>
                    </div>
                    <span>Jadwal Wawancara</span>
                </a>
                <a href="pengumuman_admin.php" 
                    class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-megaphone-line"></i>
                    </div>
                    <span>Pengumuman</span>
                </a>
                <a href="pengaturan_admin.php"
                    class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-settings-3-line"></i>
                    </div>
                    <span>Pengaturan</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-6 sm:p-8 bg-gray-900 md:ml-64">
            <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-100 mb-4 sm:mb-0">Jadwal Wawancara</h1>
                    <div class="flex space-x-3">
                        <button class="bg-secondary text-primary px-4 py-2 rounded-button hover:bg-yellow-500 font-medium flex items-center space-x-2">
                            <i class="ri-calendar-event-line"></i>
                            <span>Buat Jadwal Baru</span>
                        </button>
                    </div>
                </div>

                <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
                    <div>
                        <label for="filter-tanggal" class="block text-xs font-medium text-gray-400 mb-1">Tanggal Wawancara</label>
                        <input type="date" id="filter-tanggal" name="filter-tanggal"
                            class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary">
                    </div>
                    <div>
                        <label for="filter-status-wawancara" class="block text-xs font-medium text-gray-400 mb-1">Status Wawancara</label>
                        <select id="filter-status-wawancara" name="filter-status-wawancara" class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary">
                            <option value="">Semua Status</option>
                            <option value="terjadwal">Terjadwal</option>
                            <option value="selesai">Selesai</option>
                            <option value="dibatalkan">Dibatalkan</option>
                            <option value="menunggu">Menunggu Konfirmasi</option>
                        </select>
                    </div>
                     <button class="bg-gray-600 hover:bg-gray-500 text-gray-200 px-4 py-2.5 rounded-lg font-medium flex items-center justify-center space-x-2 h-[46px]">
                        <i class="ri-filter-3-line"></i>
                        <span>Filter Jadwal</span>
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[800px]"> <thead>
                            <tr class="bg-gray-700/50 text-left">
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider rounded-tl-lg">Tanggal & Waktu</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Calon Asisten</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Pewawancara</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Lokasi/Link</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php 
                            $jadwal_list = [
                                ["id" => 1, "tanggal" => "2025-06-10", "waktu_mulai" => "09:00", "waktu_selesai" => "09:30", "nama_calon" => "Ahmad Fauzi", "nim_calon" => "201011400001", "pewawancara" => "Dr. Indah Permatasari", "lokasi" => "Ruang R.301", "status" => "Terjadwal"],
                                ["id" => 2, "tanggal" => "2025-06-10", "waktu_mulai" => "10:00", "waktu_selesai" => "10:30", "nama_calon" => "Bunga Citra Lestari", "nim_calon" => "211011400002", "pewawancara" => "Prof. Budi Santoso", "lokasi" => "Online (Zoom)", "status" => "Selesai"],
                                ["id" => 3, "tanggal" => "2025-06-11", "waktu_mulai" => "13:00", "waktu_selesai" => "13:45", "nama_calon" => "Eko Patrio", "nim_calon" => "201011400005", "pewawancara" => "Prof. Budi Santoso", "lokasi" => "GMeet Link", "status" => "Menunggu Konfirmasi"],
                                ["id" => 4, "tanggal" => "2025-06-12", "waktu_mulai" => "11:00", "waktu_selesai" => "11:30", "nama_calon" => "Siti Aminah", "nim_calon" => "221011400007", "pewawancara" => "Dr. Rina Kusumawati", "lokasi" => "Ruang R.302", "status" => "Dibatalkan"],
                            ];

                            foreach ($jadwal_list as $jadwal): 
                                $status_color = 'text-gray-400 bg-gray-600/30'; 
                                if ($jadwal['status'] == 'Terjadwal') $status_color = 'text-blue-400 bg-blue-500/20';
                                if ($jadwal['status'] == 'Selesai') $status_color = 'text-green-400 bg-green-500/20';
                                if ($jadwal['status'] == 'Dibatalkan') $status_color = 'text-red-400 bg-red-500/20';
                                if ($jadwal['status'] == 'Menunggu Konfirmasi') $status_color = 'text-yellow-400 bg-yellow-500/20';
                            ?>
                            <tr class="hover:bg-gray-700/50">
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-100"><?= date('d M Y', strtotime($jadwal['tanggal'])) ?></div>
                                    <div class="text-xs text-gray-400"><?= htmlspecialchars($jadwal['waktu_mulai']) ?> - <?= htmlspecialchars($jadwal['waktu_selesai']) ?> WIB</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-100"><?= htmlspecialchars($jadwal['nama_calon']) ?></div>
                                    <div class="text-xs text-gray-400">NIM: <?= htmlspecialchars($jadwal['nim_calon']) ?></div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-200"><?= htmlspecialchars($jadwal['pewawancara']) ?></td>
                                <td class="px-6 py-4 text-sm text-gray-300">
                                    <?php if (filter_var($jadwal['lokasi'], FILTER_VALIDATE_URL)): ?>
                                        <a href="<?= htmlspecialchars($jadwal['lokasi']) ?>" target="_blank" class="text-secondary hover:underline"><?= htmlspecialchars(parse_url($jadwal['lokasi'], PHP_URL_HOST) ?: "Link Meeting") ?></a>
                                    <?php else: ?>
                                        <?= htmlspecialchars($jadwal['lokasi']) ?>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $status_color ?>">
                                        <?= htmlspecialchars($jadwal['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-1">
                                        <button title="Lihat Detail" class="text-gray-400 hover:text-secondary p-1"><i class="ri-eye-line ri-lg"></i></button>
                                        <button title="Edit Jadwal" class="text-gray-400 hover:text-blue-400 p-1"><i class="ri-edit-line ri-lg"></i></button>
                                        <?php if ($jadwal['status'] == 'Terjadwal' || $jadwal['status'] == 'Menunggu Konfirmasi'): ?>
                                        <button title="Batalkan Jadwal" class="text-gray-400 hover:text-red-400 p-1"><i class="ri-close-circle-line ri-lg"></i></button>
                                        <button title="Tandai Selesai" class="text-gray-400 hover:text-green-400 p-1"><i class="ri-checkbox-circle-line ri-lg"></i></button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex flex-col sm:flex-row justify-between items-center">
                    <div class="text-sm text-gray-400 mb-4 sm:mb-0">
                        Menampilkan <span class="font-medium text-gray-200">1</span> sampai <span class="font-medium text-gray-200"><?= count($jadwal_list) ?></span> dari <span class="font-medium text-gray-200"><?= count($jadwal_list) ?></span> hasil
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

    <div id="notifications-dropdown" class="hidden absolute right-4 top-16 mt-1 w-80 bg-gray-800 rounded-lg shadow-xl border border-gray-700 z-[70]">
        <div class="p-4 border-b border-gray-700"><h3 class="font-semibold text-gray-100">Notifikasi</h3></div>
        <div class="max-h-96 overflow-y-auto">
            <div class="p-4 border-b border-gray-700 hover:bg-gray-700"><div class="flex items-start space-x-3"><div class="w-8 h-8 bg-blue-500/30 rounded-full flex items-center justify-center text-blue-300 shrink-0"><i class="ri-user-add-line"></i></div><div><p class="text-sm text-gray-200">Pendaftar baru</p><p class="text-xs text-gray-400">2 min lalu</p></div></div></div>
            <div class="p-4 border-b border-gray-700 hover:bg-gray-700"><div class="flex items-start space-x-3"><div class="w-8 h-8 bg-green-500/30 rounded-full flex items-center justify-center text-green-300 shrink-0"><i class="ri-check-line"></i></div><div><p class="text-sm text-gray-200">Wawancara selesai</p><p class="text-xs text-gray-400">1 jam lalu</p></div></div></div>
        </div>
        <div class="p-4 border-t border-gray-700"><a href="#" class="text-secondary hover:text-yellow-500 text-sm font-medium w-full block text-center">Lihat Semua</a></div>
    </div>
    <div id="admin-menu-dropdown" class="hidden absolute right-4 top-16 mt-1 w-48 bg-gray-800 rounded-lg shadow-xl border border-gray-700 z-[70]">
        <div class="py-1">
            <a href="#profile" class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-secondary"><div class="w-4 h-4 flex items-center justify-center"><i class="ri-user-line"></i></div><span>Profile</span></a>
            <a href="pengaturan_admin.php" class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-secondary"><div class="w-4 h-4 flex items-center justify-center"><i class="ri-settings-3-line"></i></div><span>Settings</span></a>
            <hr class="my-1 border-gray-700">
            <a href="login.php?action=logout" class="flex items-center space-x-3 px-4 py-2 text-sm text-red-400 hover:bg-gray-700 hover:text-red-300"><div class="w-4 h-4 flex items-center justify-center"><i class="ri-logout-box-line"></i></div><span>Logout</span></a>
        </div>
    </div>
    <div id="mobile-menu" class="fixed inset-0 bg-primary z-[60] hidden flex-col pt-0 md:hidden">
        <div class="flex justify-between items-center p-4 border-b border-gray-700">
            <a href="dashboard.php" class="text-xl font-['Pacifico'] text-secondary">BANSUSS</a>
            <button id="close-mobile-menu-button" title="Tutup Menu" aria-label="Tutup Menu" class="p-2 text-gray-200 hover:text-secondary focus:outline-none">
                <i class="ri-close-line ri-xl"></i>
            </button>
        </div>
        <div class="container mx-auto px-4 py-4 flex-1 overflow-y-auto">
            <a href="dashboard.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Dashboard</a>
            <a href="pendaftar.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pendaftar</a>
            <a href="jadwal_wawancara.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-secondary bg-gray-700/50 rounded">Jadwal Wawancara</a> 
            <a href="pengumuman_admin.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pengumuman</a>
            <a href="pengaturan_admin.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pengaturan</a>
            <div class="mt-4 border-t border-gray-700 pt-4">
                 <a href="#profile" class="flex items-center space-x-3 px-0 py-3 text-lg text-gray-200 hover:text-secondary">
                    <div class="w-5 h-5 flex items-center justify-center"><i class="ri-user-line"></i></div>
                    <span>Profile</span>
                </a>
                <a href="login.php?action=logout" class="flex items-center space-x-3 px-0 py-3 text-lg text-red-400 hover:text-red-300">
                    <div class="w-5 h-5 flex items-center justify-center"><i class="ri-logout-box-line"></i></div>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>

    <script id="dropdown-mobile-menu-script">
        document.addEventListener('DOMContentLoaded', function () {
            const notificationsBtn = document.getElementById('notifications-btn');
            const notificationsDropdown = document.getElementById('notifications-dropdown');
            const adminMenuBtn = document.getElementById('admin-menu-btn');
            const adminMenuDropdown = document.getElementById('admin-menu-dropdown');
            
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const closeMobileMenuButton = document.getElementById('close-mobile-menu-button');

            function toggleDropdown(button, dropdown) {
                if (!dropdown) return;
                const isVisible = !dropdown.classList.contains('hidden');
                if (dropdown !== notificationsDropdown && notificationsDropdown) notificationsDropdown.classList.add('hidden');
                if (dropdown !== adminMenuDropdown && adminMenuDropdown) adminMenuDropdown.classList.add('hidden');
                
                if (isVisible) {
                    dropdown.classList.add('hidden');
                } else {
                    dropdown.classList.remove('hidden');
                }
            }

            function hideAllDropdowns() {
                if (notificationsDropdown) notificationsDropdown.classList.add('hidden');
                if (adminMenuDropdown) adminMenuDropdown.classList.add('hidden');
            }

            if (notificationsBtn) {
                notificationsBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    toggleDropdown(notificationsBtn, notificationsDropdown);
                });
            }

            if (adminMenuBtn) {
                adminMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    toggleDropdown(adminMenuBtn, adminMenuDropdown);
                });
            }

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.add('flex');
                });
            }
            if (closeMobileMenuButton && mobileMenu) {
                 closeMobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                });
            }

            document.addEventListener('click', (e) => {
                let clickedInsideADropdown = false;
                if (notificationsDropdown && notificationsDropdown.contains(e.target)) clickedInsideADropdown = true;
                if (adminMenuDropdown && adminMenuDropdown.contains(e.target)) clickedInsideADropdown = true;
                
                let clickedOnAButton = false;
                if (notificationsBtn && notificationsBtn.contains(e.target)) clickedOnAButton = true;
                if (adminMenuBtn && adminMenuBtn.contains(e.target)) clickedOnAButton = true;
                if (mobileMenuButton && mobileMenuButton.contains(e.target)) clickedOnAButton = true;


                if (!clickedInsideADropdown && !clickedOnAButton) {
                    hideAllDropdowns();
                }
            });

            if (mobileMenu) {
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function (event) {
                        const href = link.getAttribute('href');
                        if (href && href.startsWith('#') && href.length > 1 && !href.startsWith('#!')) {
                        } else if (href && !href.startsWith('#')) { 
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('flex');
                        }
                        if(href === '#profile' || href === '#logout') {
                             mobileMenu.classList.add('hidden');
                             mobileMenu.classList.remove('flex');
                        }
                    });
                });
            }
        });
    </script>
    <script id="smooth-scroll-script"> 
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
                anchor.addEventListener("click", function (e) {
                    const targetId = this.getAttribute("href");
                    if (targetId === "#" || targetId.startsWith("#!") || targetId === "#profile" || targetId === "#settings" || targetId === "#logout" ) return; 
                    
                    if (this.closest('#notifications-dropdown') || this.closest('#admin-menu-dropdown')) {
                        return; 
                    }
                    e.preventDefault(); 
                    let targetElement;
                    try {
                        targetElement = document.querySelector(targetId);
                    } catch (error) {
                        console.warn("Smooth scroll target not found or invalid selector:", targetId);
                        return;
                    }

                    if (targetElement) {
                        const adminHeader = document.querySelector("header.fixed");
                        const headerHeight = adminHeader ? adminHeader.offsetHeight : 0;
                        const targetPosition = targetElement.offsetTop - headerHeight - 20; 

                        window.scrollTo({
                            top: targetPosition,
                            behavior: "smooth",
                        });
                        const mobileMenu = document.getElementById('mobile-menu');
                        if(mobileMenu && mobileMenu.classList.contains('flex')){
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('flex');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>