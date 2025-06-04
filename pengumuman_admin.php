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
    <title>Kelola Pengumuman - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'], // Poppins sebagai font sans-serif default
                    },
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
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan Poppins sebagai font utama */
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
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
                    class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg"> 
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-calendar-2-line"></i>
                    </div>
                    <span>Jadwal Wawancara</span>
                </a>
                <a href="pengumuman_admin.php" 
                    class="flex items-center space-x-3 px-4 py-3 text-secondary bg-gray-700 rounded-lg"> 
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
            <div class="bg-gray-800 p-6 rounded-xl shadow-lg min-h-full">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-100 mb-4 sm:mb-0">Kelola Pengumuman</h1>
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
                     <button class="bg-gray-600 hover:bg-gray-500 text-gray-200 px-4 py-2.5 rounded-lg font-medium flex items-center justify-center space-x-2 h-[46px]">
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
                                <h2 class="text-lg font-semibold text-gray-100 hover:text-secondary transition-colors cursor-pointer"><?= htmlspecialchars($pengumuman['judul']) ?></h2>
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full <?= $status_color ?> flex items-center shrink-0 ml-2">
                                    <i class="<?= $status_icon ?> mr-1"></i><?= htmlspecialchars($pengumuman['status']) ?>
                                </span>
                            </div>
                            <p class="text-xs text-gray-400 mb-3">
                                <i class="ri-calendar-todo-line mr-1"></i>Dipublikasikan pada: <?= date('d M Y', strtotime($pengumuman['tanggal'])) ?>
                            </p>
                            <p class="text-sm text-gray-300 line-clamp-3 mb-4">
                                <?= htmlspecialchars($pengumuman['excerpt']) ?>
                            </p>
                        </div>
                        <div class="border-t border-gray-600 pt-3 mt-auto flex justify-end space-x-2">
                            <button title="Lihat Pengumuman" class="text-gray-400 hover:text-secondary p-1.5 rounded-md hover:bg-gray-600 transition-colors"><i class="ri-eye-line ri-lg"></i></button>
                            <button title="Edit Pengumuman" class="text-gray-400 hover:text-blue-400 p-1.5 rounded-md hover:bg-gray-600 transition-colors"><i class="ri-pencil-line ri-lg"></i></button>
                            <button title="Hapus Pengumuman" class="text-gray-400 hover:text-red-400 p-1.5 rounded-md hover:bg-gray-600 transition-colors"><i class="ri-delete-bin-line ri-lg"></i></button>
                        </div>
                    </div>
                    <?php endforeach; ?>
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
            <a href="jadwal_wawancara.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Jadwal Wawancara</a> 
            <a href="pengumuman_admin.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-secondary bg-gray-700/50 rounded">Pengumuman</a> 
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