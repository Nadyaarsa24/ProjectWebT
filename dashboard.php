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
    <title>Admin Dashboard - Open Recruitment Asisten Dosen</title>
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
                <a href="dashboard.php" class="flex items-center space-x-3 px-4 py-3 text-secondary bg-gray-700 rounded-lg"> 
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
                    class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8"> <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-400 text-sm font-medium">Total Pendaftar</h3>
                        <div class="w-10 h-10 bg-secondary/20 rounded-full flex items-center justify-center text-secondary">
                            <i class="ri-user-add-line ri-lg"></i>
                        </div>
                    </div>
                    <div class="flex items-end space-x-3">
                        <span class="text-2xl font-bold text-gray-100">248</span>
                        <span class="text-sm text-green-400 flex items-center">
                            <i class="ri-arrow-up-s-line"></i>12%
                        </span>
                    </div>
                </div>
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-400 text-sm font-medium">Lolos Seleksi</h3>
                        <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center text-green-400">
                            <i class="ri-check-line ri-lg"></i>
                        </div>
                    </div>
                    <div class="flex items-end space-x-3">
                        <span class="text-2xl font-bold text-gray-100">156</span>
                        <span class="text-sm text-green-400 flex items-center">
                            <i class="ri-arrow-up-s-line"></i>8%
                        </span>
                    </div>
                </div>
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-gray-400 text-sm font-medium">Dalam Proses</h3>
                        <div class="w-10 h-10 bg-blue-500/20 rounded-full flex items-center justify-center text-blue-400">
                            <i class="ri-time-line ri-lg"></i>
                        </div>
                    </div>
                    <div class="flex items-end space-x-3">
                        <span class="text-2xl font-bold text-gray-100">92</span>
                        <span class="text-sm text-yellow-400 flex items-center"> <i class="ri-arrow-right-s-line"></i>Stable
                        </span>
                    </div>
                </div>
                </div>

            <div class="bg-gray-800 rounded-xl shadow-lg mb-8">
                <div class="p-6 border-b border-gray-700">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-100">Pendaftar Terbaru</h2>
                        <a href="pendaftar.php" class="text-secondary hover:text-yellow-500 font-medium">Lihat Semua</a>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-700/50 text-left">
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center text-gray-300 mr-3">
                                            <i class="ri-user-line"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-100">Olivia Anderson</div>
                                            <div class="text-sm text-gray-400">olivia.a@university.edu</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium bg-secondary/20 text-secondary rounded-full">Dalam Review</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-400">2 Juni 2025</td>
                                <td class="px-6 py-4">
                                    <button class="text-secondary hover:text-yellow-500 font-medium">Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center text-gray-300 mr-3">
                                            <i class="ri-user-line"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-100">Marcus Chen</div>
                                            <div class="text-sm text-gray-400">marcus.c@university.edu</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium bg-green-500/20 text-green-400 rounded-full">Diterima</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-400">2 Juni 2025</td>
                                <td class="px-6 py-4">
                                    <button class="text-secondary hover:text-yellow-500 font-medium">Detail</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center text-gray-300 mr-3">
                                            <i class="ri-user-line"></i>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-gray-100">Sofia Rodriguez</div>
                                            <div class="text-sm text-gray-400">sofia.r@university.edu</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium bg-red-500/20 text-red-400 rounded-full">Ditolak</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-400">2 Juni 2025</td>
                                <td class="px-6 py-4">
                                    <button class="text-secondary hover:text-yellow-500 font-medium">Detail</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-gray-800 rounded-xl shadow-lg">
                <div class="p-6 border-b border-gray-700">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-semibold text-gray-100">Jadwal Wawancara Hari Ini</h2>
                        <a href="jadwal_wawancara.php" class="text-secondary hover:text-yellow-500 font-medium">Lihat Semua</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between p-4 bg-gray-700/70 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-secondary/20 rounded-full flex items-center justify-center text-secondary">
                                    <i class="ri-time-line ri-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-100">Wawancara dengan Emily Watson</h3>
                                    <p class="text-sm text-gray-400">Calon Asisten Dosen</p> 
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-100">09:00 WIB</p>
                                <p class="text-xs text-gray-400">30 menit</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-700/70 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-secondary/20 rounded-full flex items-center justify-center text-secondary">
                                    <i class="ri-time-line ri-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-100">Wawancara dengan David Kim</h3>
                                     <p class="text-sm text-gray-400">Calon Asisten Dosen</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-100">11:00 WIB</p>
                                <p class="text-xs text-gray-400">30 menit</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-gray-700/70 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-secondary/20 rounded-full flex items-center justify-center text-secondary">
                                    <i class="ri-time-line ri-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-sm font-medium text-gray-100">Wawancara dengan Sarah Johnson</h3>
                                     <p class="text-sm text-gray-400">Calon Asisten Dosen</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-100">14:00 WIB</p>
                                <p class="text-xs text-gray-400">30 menit</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="notifications-dropdown"
        class="hidden absolute right-4 top-16 mt-1 w-80 bg-gray-800 rounded-lg shadow-xl border border-gray-700 z-[70]">
        <div class="p-4 border-b border-gray-700"><h3 class="font-semibold text-gray-100">Notifikasi</h3></div>
        <div class="max-h-96 overflow-y-auto">
            <div class="p-4 border-b border-gray-700 hover:bg-gray-700"><div class="flex items-start space-x-3"><div class="w-8 h-8 bg-blue-500/30 rounded-full flex items-center justify-center text-blue-300 shrink-0"><i class="ri-user-add-line"></i></div><div><p class="text-sm text-gray-200">Pendaftar baru</p><p class="text-xs text-gray-400">2 min lalu</p></div></div></div>
            <div class="p-4 border-b border-gray-700 hover:bg-gray-700"><div class="flex items-start space-x-3"><div class="w-8 h-8 bg-green-500/30 rounded-full flex items-center justify-center text-green-300 shrink-0"><i class="ri-check-line"></i></div><div><p class="text-sm text-gray-200">Wawancara selesai</p><p class="text-xs text-gray-400">1 jam lalu</p></div></div></div>
            <div class="p-4 hover:bg-gray-700"><div class="flex items-start space-x-3"><div class="w-8 h-8 bg-yellow-500/30 rounded-full flex items-center justify-center text-yellow-300 shrink-0"><i class="ri-timer-line"></i></div><div><p class="text-sm text-gray-200">Pengingat Wawancara</p><p class="text-xs text-gray-400">2 jam lalu</p></div></div></div>
        </div>
        <div class="p-4 border-t border-gray-700"><a href="#" class="text-secondary hover:text-yellow-500 text-sm font-medium w-full block text-center">Lihat Semua Notifikasi</a></div>
    </div>

    <div id="admin-menu-dropdown"
        class="hidden absolute right-4 top-16 mt-1 w-48 bg-gray-800 rounded-lg shadow-xl border border-gray-700 z-[70]">
        <div class="py-1">
            <a href="#profile"
                class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-secondary">
                <div class="w-4 h-4 flex items-center justify-center">
                    <i class="ri-user-line"></i>
                </div>
                <span>Profile</span>
            </a>
            <a href="pengaturan_admin.php"
                class="flex items-center space-x-3 px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-secondary">
                <div class="w-4 h-4 flex items-center justify-center">
                    <i class="ri-settings-3-line"></i>
                </div>
                <span>Settings</span>
            </a>
            <hr class="my-1 border-gray-700">
            <a href="login.php?action=logout" class="flex items-center space-x-3 px-4 py-2 text-sm text-red-400 hover:bg-gray-700 hover:text-red-300">
                <div class="w-4 h-4 flex items-center justify-center">
                    <i class="ri-logout-box-line"></i>
                </div>
                <span>Logout</span>
            </a>
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
            <a href="dashboard.php"
                class="block py-3 text-lg font-medium border-b border-gray-700 text-secondary bg-gray-700/50 rounded">Dashboard</a>
            <a href="pendaftar.php"
                class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pendaftar</a>
            <a href="jadwal_wawancara.php"
                class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Jadwal Wawancara</a>
            <a href="pengumuman_admin.php"
                class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pengumuman</a>
            <a href="pengaturan_admin.php" 
                class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pengaturan</a>
            <div class="mt-4 border-t border-gray-700 pt-4">
                 <a href="#profile" 
                    class="flex items-center space-x-3 px-0 py-3 text-lg text-gray-200 hover:text-secondary">
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
                           // Smooth scroll handled by another script, menu should close there
                        } else if (href && !href.startsWith('#')) { 
                            // Normal navigation, menu should close
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('flex');
                        }
                         // For specific # links that are actions like #profile, #logout
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
                    // Exclude specific hash links that are for JS actions or dropdowns
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
                        const targetPosition = targetElement.offsetTop - headerHeight - 20; // 20px offset

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