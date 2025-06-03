<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar - Admin Dashboard</title>
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
        /* Custom scrollbar for dark theme */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1f2937; /* bg-gray-800 */
        }
        ::-webkit-scrollbar-thumb {
            background: #4b5563; /* bg-gray-600 */
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280; /* bg-gray-500 */
        }
    </style>
</head>

<body class="bg-primary text-gray-300">
    <header class="bg-primary shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-3 flex justify-between items-center">
            <a href="dashboard.php" class="text-2xl font-['Pacifico'] text-secondary">BANSUSS</a> <div class="flex items-center space-x-3 sm:space-x-4">
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
                <a href="dashboard.php" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg"> 
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-dashboard-line"></i>
                    </div>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="pendaftar.php"
                    class="flex items-center space-x-3 px-4 py-3 text-secondary bg-gray-700 rounded-lg"> <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-user-3-line"></i>
                    </div>
                    <span>Pendaftar</span>
                </a>
                <a href="matakuliah.php" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-book-2-line"></i>
                    </div>
                    <span>Mata Kuliah</span>
                </a>
                <a href="jadwal_wawancara.php" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-calendar-2-line"></i>
                    </div>
                    <span>Jadwal Wawancara</span>
                </a>
                <a href="pengumuman_admin.php" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
                    <div class="w-5 h-5 flex items-center justify-center">
                        <i class="ri-megaphone-line"></i>
                    </div>
                    <span>Pengumuman</span>
                </a>
                <a href="pengaturan_admin.php" class="flex items-center space-x-3 px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-secondary rounded-lg">
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
                    <h1 class="text-2xl font-semibold text-gray-100 mb-4 sm:mb-0">Data Pendaftar Asisten Dosen</h1>
                    <div class="flex space-x-3">
                        <button class="bg-secondary text-primary px-4 py-2 rounded-button hover:bg-yellow-500 font-medium flex items-center space-x-2">
                            <i class="ri-add-line"></i>
                            <span>Tambah Pendaftar</span>
                        </button>
                    </div>
                </div>

                <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari nama pendaftar..."
                            class="w-full pl-10 pr-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary placeholder-gray-400">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="ri-search-line"></i>
                        </div>
                    </div>
                    <select class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary">
                        <option value="">Semua Mata Kuliah</option>
                        <option value="alp">Algoritma & Pemrograman</option>
                        <option value="basdat">Basis Data</option>
                        <option value="web">Pemrograman Web</option>
                    </select>
                    <select class="w-full px-4 py-2.5 bg-gray-700 border border-gray-600 text-gray-200 rounded-lg focus:ring-secondary focus:border-secondary">
                        <option value="">Semua Status</option>
                        <option value="review">Dalam Review</option>
                        <option value="lolos_berkas">Lolos Berkas</option>
                        <option value="wawancara">Wawancara</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                    <button class="bg-gray-600 hover:bg-gray-500 text-gray-200 px-4 py-2.5 rounded-lg font-medium flex items-center justify-center space-x-2">
                        <i class="ri-filter-3-line"></i>
                        <span>Filter</span>
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[800px]">
                        <thead>
                            <tr class="bg-gray-700/50 text-left">
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider rounded-tl-lg">
                                    <input type="checkbox" id="select-all-pendaftar">
                                </th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Kontak</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Mata Kuliah</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Tgl Daftar</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            <?php 
                            // Data dummy untuk pendaftar - Ganti dengan data dari database jika perlu
                            $pendaftar_list = [
                                ["id" => 1, "nama" => "Ahmad Fauzi", "nim" => "201011400001", "email" => "ahmad.f@example.com", "matkul" => "Algoritma & Pemrograman", "tgl_daftar" => "2025-05-28", "status" => "Dalam Review", "foto" => "https://i.pravatar.cc/150?u=ahmadfauzi"],
                                ["id" => 2, "nama" => "Bunga Citra Lestari", "nim" => "211011400002", "email" => "bunga.c@example.com", "matkul" => "Basis Data", "tgl_daftar" => "2025-05-29", "status" => "Lolos Berkas", "foto" => "https://i.pravatar.cc/150?u=bungacitra"],
                                ["id" => 3, "nama" => "Charlie Puth", "nim" => "191011400003", "email" => "charlie.p@example.com", "matkul" => "Pemrograman Web", "tgl_daftar" => "2025-05-30", "status" => "Diterima", "foto" => "https://i.pravatar.cc/150?u=charlieputh"],
                                ["id" => 4, "nama" => "Dewi Sandra", "nim" => "221011400004", "email" => "dewi.s@example.com", "matkul" => "Algoritma & Pemrograman", "tgl_daftar" => "2025-06-01", "status" => "Ditolak", "foto" => "https://i.pravatar.cc/150?u=dewisandra"],
                                ["id" => 5, "nama" => "Eko Patrio", "nim" => "201011400005", "email" => "eko.p@example.com", "matkul" => "Basis Data", "tgl_daftar" => "2025-06-02", "status" => "Wawancara", "foto" => "https://i.pravatar.cc/150?u=ekopatrio"],
                            ];

                            foreach ($pendaftar_list as $pendaftar): 
                                $status_color = 'text-gray-400 bg-gray-600/30'; // Default
                                if ($pendaftar['status'] == 'Dalam Review') $status_color = 'text-secondary bg-secondary/20';
                                if ($pendaftar['status'] == 'Lolos Berkas') $status_color = 'text-blue-400 bg-blue-500/20';
                                if ($pendaftar['status'] == 'Wawancara') $status_color = 'text-purple-400 bg-purple-500/20';
                                if ($pendaftar['status'] == 'Diterima') $status_color = 'text-green-400 bg-green-500/20';
                                if ($pendaftar['status'] == 'Ditolak') $status_color = 'text-red-400 bg-red-500/20';
                            ?>
                            <tr class="hover:bg-gray-700/50">
                                <td class="px-6 py-4">
                                    <input type="checkbox" name="pendaftar_ids[]" value="<?= $pendaftar['id'] ?>">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img class="h-10 w-10 rounded-full object-cover mr-3 shrink-0" src="<?= $pendaftar['foto'] ?>" alt="<?= $pendaftar['nama'] ?>">
                                        <div>
                                            <div class="text-sm font-medium text-gray-100"><?= $pendaftar['nama'] ?></div>
                                            <div class="text-xs text-gray-400">NIM: <?= $pendaftar['nim'] ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                     <div class="text-sm text-gray-200"><?= $pendaftar['email'] ?></div>
                                     </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-200"><?= $pendaftar['matkul'] ?></div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-400"><?= date('d M Y', strtotime($pendaftar['tgl_daftar'])) ?></td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full <?= $status_color ?>">
                                        <?= $pendaftar['status'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <button title="Lihat Detail" class="text-secondary hover:text-yellow-500 p-1"><i class="ri-eye-line ri-lg"></i></button>
                                        <button title="Edit Pendaftar" class="text-blue-400 hover:text-blue-300 p-1"><i class="ri-pencil-line ri-lg"></i></button>
                                        <button title="Hapus Pendaftar" class="text-red-400 hover:text-red-300 p-1"><i class="ri-delete-bin-line ri-lg"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
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

    <div id="notifications-dropdown" class="hidden absolute right-4 top-16 mt-1 w-80 bg-gray-800 rounded-lg shadow-xl border border-gray-700 z-[70]"> ... (Isi sama seperti sebelumnya) ... </div>
    <div id="admin-menu-dropdown" class="hidden absolute right-4 top-16 mt-1 w-48 bg-gray-800 rounded-lg shadow-xl border border-gray-700 z-[70]"> ... (Isi sama seperti sebelumnya) ... </div>
    <div id="mobile-menu" class="fixed inset-0 bg-primary z-[60] hidden flex-col pt-0 md:hidden">
        <div class="flex justify-between items-center p-4 border-b border-gray-700">
            <a href="dashboard.php" class="text-xl font-['Pacifico'] text-secondary">logo</a>
            <button id="close-mobile-menu-button" title="Tutup Menu" aria-label="Tutup Menu" class="p-2 text-gray-200 hover:text-secondary focus:outline-none">
                <i class="ri-close-line ri-xl"></i>
            </button>
        </div>
        <div class="container mx-auto px-4 py-4">
            <a href="dashboard.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Dashboard</a>
            <a href="pendaftar.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-secondary bg-gray-700/50 rounded">Pendaftar</a> <a href="matakuliah.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Mata Kuliah</a>
            <a href="jadwal_wawancara.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Jadwal Wawancara</a>
            <a href="pengumuman_admin.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pengumuman</a>
            <a href="pengaturan_admin.php" class="block py-3 text-lg font-medium border-b border-gray-700 text-gray-200 hover:text-secondary">Pengaturan</a>
            <div class="mt-4 border-t border-gray-700 pt-4">
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
                        // Cek apakah link internal ke section di halaman yang sama atau link ke halaman lain
                        if (link.getAttribute('href').startsWith('#') && link.getAttribute('href').length > 1 && !link.getAttribute('href').startsWith('#!')) {
                            // Biarkan smooth scroll menangani jika ini adalah link section
                            // mobileMenu.classList.add('hidden'); // Tutup menu setelah klik untuk smooth scroll
                            // mobileMenu.classList.remove('flex');
                        } else if (!link.getAttribute('href').startsWith('#')) { // Jika link ke halaman lain
                            mobileMenu.classList.add('hidden');
                            mobileMenu.classList.remove('flex');
                        }
                        // Untuk link seperti #profile, #logout di mobile menu, mereka juga akan menutup menu
                        if(link.getAttribute('href') === '#profile' || link.getAttribute('href') === '#logout') {
                             mobileMenu.classList.add('hidden');
                             mobileMenu.classList.remove('flex');
                        }
                    });
                });
            }

            // Select All Checkbox
            const selectAllCheckbox = document.getElementById('select-all-pendaftar');
            const pendaftarCheckboxes = document.querySelectorAll('input[name="pendaftar_ids[]"]');
            if(selectAllCheckbox && pendaftarCheckboxes.length > 0) {
                selectAllCheckbox.addEventListener('change', function() {
                    pendaftarCheckboxes.forEach(checkbox => {
                        checkbox.checked = this.checked;
                    });
                });
            }
        });
    </script>
    <script id="smooth-scroll-script"> // Script smooth scroll jika ada link #
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
                         // Tutup menu mobile jika terbuka dan link adalah untuk smooth scroll
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