<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Admin Dashboard</title>
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
        input[type="date"]::-webkit-calendar-picker-indicator,
        input[type="file"]::-webkit-file-upload-button {
            filter: invert(0.8);
        }
        input[type="file"] {
            @apply text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-600 file:text-gray-200 hover:file:bg-gray-500;
        }
    </style>
</head>

<body class="bg-primary text-gray-300">
    <header class="bg-primary shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
            <a href="dashboard.php" class="text-2xl font-['Pacifico'] text-secondary">logo</a>
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
                <a href="matakuliah.php" 
                    class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-book-2-line"></i>
                    </div>
                    <span>Mata Kuliah</span>
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
                    class="flex items-center space-x-3 px-4 py-3 text-secondary bg-gray-700 rounded-lg"> <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-settings-3-line"></i>
                    </div>
                    <span>Pengaturan</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-6 sm:p-8 bg-gray-900 md:ml-64">
            <h1 class="text-2xl sm:text-3xl font-semibold text-gray-100 mb-8">Pengaturan Akun dan Sistem</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
                        <h2 class="text-xl font-semibold text-gray-100 mb-6 border-b border-gray-700 pb-3">Profil Admin</h2>
                        <form action="#" method="POST" class="space-y-6">
                            <div>
                                <label for="admin-name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                                <input type="text" name="admin-name" id="admin-name" value="Admin Utama"
                                    class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                            </div>
                            <div>
                                <label for="admin-email" class="block text-sm font-medium text-gray-300 mb-1">Alamat Email</label>
                                <input type="email" name="admin-email" id="admin-email" value="admin@example.com"
                                    class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                            </div>
                             <div>
                                <label for="admin-avatar" class="block text-sm font-medium text-gray-300 mb-1">Foto Profil</label>
                                <div class="flex items-center space-x-4">
                                    <img class="h-16 w-16 rounded-full object-cover" src="https://i.pravatar.cc/150?u=adminutama" alt="Admin Avatar">
                                    <input type="file" name="admin-avatar" id="admin-avatar"
                                        class="block w-full">
                                </div>
                            </div>
                            <div class="border-t border-gray-700 pt-6">
                                <h3 class="text-md font-semibold text-gray-200 mb-3">Ubah Password</h3>
                                <div>
                                    <label for="current-password" class="block text-sm font-medium text-gray-300 mb-1">Password Saat Ini</label>
                                    <input type="password" name="current-password" id="current-password"
                                        class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                                </div>
                                <div class="mt-4">
                                    <label for="new-password" class="block text-sm font-medium text-gray-300 mb-1">Password Baru</label>
                                    <input type="password" name="new-password" id="new-password"
                                        class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                                </div>
                                <div class="mt-4">
                                    <label for="confirm-password" class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password Baru</label>
                                    <input type="password" name="confirm-password" id="confirm-password"
                                        class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                                </div>
                            </div>
                            <div class="flex justify-end pt-4">
                                <button type="submit" class="bg-secondary text-primary px-6 py-2.5 rounded-button hover:bg-yellow-500 font-semibold flex items-center space-x-2">
                                    <i class="ri-save-line"></i>
                                    <span>Simpan Perubahan Profil</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-xl shadow-lg">
                        <h2 class="text-xl font-semibold text-gray-100 mb-6 border-b border-gray-700 pb-3">Pengaturan Tampilan (Contoh)</h2>
                        <form action="#" method="POST" class="space-y-6">
                            <div>
                                <label for="accent-color" class="block text-sm font-medium text-gray-300 mb-1">Warna Aksen Sekunder</label>
                                <div class="flex items-center space-x-3">
                                    <input type="color" name="accent-color" id="accent-color" value="#ffcc00" class="h-10 w-10 rounded-md border border-gray-600 bg-gray-700 p-0.5">
                                    <span class="text-gray-400">(Saat ini: Kuning - #FFCC00)</span>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Fitur ini hanya contoh, perubahan warna mungkin memerlukan penyesuaian CSS/JS lebih lanjut.</p>
                            </div>
                             <div class="flex justify-end pt-4">
                                <button type="submit" class="bg-gray-600 hover:bg-gray-500 text-gray-200 px-6 py-2.5 rounded-button font-semibold flex items-center space-x-2">
                                    <i class="ri-pencil-ruler-2-line"></i>
                                    <span>Simpan Preferensi</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-gray-800 p-6 rounded-xl shadow-lg space-y-8">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-100 mb-6 border-b border-gray-700 pb-3">Pengaturan Sistem</h2>
                            <form action="#" method="POST" class="space-y-6">
                                <div>
                                    <label for="app-name" class="block text-sm font-medium text-gray-300 mb-1">Nama Aplikasi/Website</label>
                                    <input type="text" name="app-name" id="app-name" value="Open Recruitment Asdos"
                                        class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                                </div>
                                <div>
                                    <label for="notification-email" class="block text-sm font-medium text-gray-300 mb-1">Email Notifikasi Default</label>
                                    <input type="email" name="notification-email" id="notification-email" value="noreply@example.ac.id"
                                        class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="recruitment-start" class="block text-sm font-medium text-gray-300 mb-1">Pendaftaran Dibuka</label>
                                        <input type="date" name="recruitment-start" id="recruitment-start" value="2025-06-01"
                                            class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary">
                                    </div>
                                    <div>
                                        <label for="recruitment-end" class="block text-sm font-medium text-gray-300 mb-1">Pendaftaran Ditutup</label>
                                        <input type="date" name="recruitment-end" id="recruitment-end" value="2025-06-15"
                                            class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-300 mb-2">Mode Maintenance</label>
                                    <label for="maintenance-mode" class="flex items-center cursor-pointer">
                                        <div class="relative">
                                            <input type="checkbox" id="maintenance-mode" class="sr-only">
                                            <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                                            <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"></div>
                                        </div>
                                        <div class="ml-3 text-gray-300 text-sm">Aktifkan Mode Maintenance</div>
                                    </label>
                                    <style>
                                        input:checked ~ .dot { transform: translateX(100%); background-color: #FFCC00; }
                                        input:checked ~ .block { background-color: #caA500; /* slightly darker secondary */}
                                    </style>
                                </div>
                                <div class="flex justify-end pt-4">
                                    <button type="submit" class="bg-secondary text-primary px-6 py-2.5 rounded-button hover:bg-yellow-500 font-semibold flex items-center space-x-2">
                                        <i class="ri-sound-module-line"></i>
                                        <span>Simpan Pengaturan Sistem</span>
                                    </button>
                                </div>
                            </form>
                        </div>
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
            <a href="#logout" class="flex items-center space-x-3 px-4 py-2 text-sm text-red-400 hover:bg-gray-700 hover:text-red-300"><div class="w-4 h-4 flex items-center justify-center"><i class="ri-logout-box-line"></i></div><span>Logout</span></a>
        </div>
    </div>
    <div id="mobile-menu" class="fixed inset-0 bg-primary z-[60] hidden flex-col pt-0 md:hidden">
        <div class="flex justify-between items-center p-4 border-b border-gray-700">
            <a href="dashboard.php" class="text-xl font-['Pacifico'] text-secondary">logo</a>
            <button id="close-mobile-menu-button" title="Tutup Menu" aria-label="Tutup Menu" class="p-2 text-gray-200 hover:text-secondary focus:outline-none">
                <i class="ri-close-line ri-xl"></i>
            </button>
        </div>
        <div class="container mx-auto px-4 py-4">
            <a href="dashboard.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Dashboard</a>
            <a href="pendaftar.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pendaftar</a>
            <a href="matakuliah.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Mata Kuliah</a>
            <a href="jadwal_wawancara.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Jadwal Wawancara</a> 
            <a href="pengumuman_admin.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pengumuman</a> 
            <a href="pengaturan_admin.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-secondary bg-gray-700/50 rounded">Pengaturan</a> <div class="mt-4 border-t border-gray-700 pt-4">
                 <a href="#profile" class="flex items-center space-x-3 px-0 py-3 text-lg text-gray-200 hover:text-secondary">
                    <div class="w-5 h-5 flex items-center justify-center"><i class="ri-user-line"></i></div>
                    <span>Profile</span>
                </a>
                <a href="#logout" class="flex items-center space-x-3 px-0 py-3 text-lg text-red-400 hover:text-red-300">
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

                if (!clickedInsideADropdown && !clickedOnAButton) {
                    hideAllDropdowns();
                }
            });

            if (mobileMenu) {
                const mobileLinks = mobileMenu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', function () {
                        if (link.getAttribute('href').startsWith('#') && link.getAttribute('href').length > 1 && !link.getAttribute('href').startsWith('#!')) {
                           // Smooth scroll handled by another script
                        } else if (!link.getAttribute('href').startsWith('#')) { 
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('flex');
                        }
                         if(link.getAttribute('href') === '#profile' || link.getAttribute('href') === '#logout') {
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