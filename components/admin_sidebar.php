<?php
// Variabel $currentPage harus didefinisikan di file yang meng-include sidebar ini.
// Contoh: $currentPage = 'dashboard';
// Jika tidak diset, kita bisa set default atau tidak ada yang aktif.
if (!isset($currentPage)) {
    $currentPage = ''; // Atau bisa juga halaman default misal 'dashboard'
}

// Fungsi untuk memeriksa apakah link adalah halaman saat ini
function isActive($pageName, $currentPage) {
    return ($pageName === $currentPage) ? 'text-secondary bg-gray-700' : 'text-gray-300 hover:bg-gray-700 hover:text-secondary';
}
?>
<aside class="w-0 md:w-64 bg-primary border-r border-gray-700 fixed h-full hidden md:block pt-4">
    <nav class="p-4 space-y-1">
        <a href="dashboard.php"
            class="flex items-center space-x-3 px-4 py-3 <?php echo isActive('dashboard', $currentPage); ?> rounded-lg"> 
            <div class="w-5 h-5 flex items-center justify-center">
                <i class="ri-dashboard-line"></i>
            </div>
            <span class="font-medium">Dashboard</span>
        </a>
        <a href="pendaftar.php"
            class="flex items-center space-x-3 px-4 py-3 <?php echo isActive('pendaftar', $currentPage); ?> rounded-lg"> 
            <div class="w-5 h-5 flex items-center justify-center">
                <i class="ri-user-3-line"></i>
            </div>
            <span>Pendaftar</span>
        </a>
        <a href="jadwal_wawancara.php"
            class="flex items-center space-x-3 px-4 py-3 <?php echo isActive('jadwal_wawancara', $currentPage); ?> rounded-lg"> 
            <div class="w-5 h-5 flex items-center justify-center">
                <i class="ri-calendar-2-line"></i>
            </div>
            <span>Jadwal Wawancara</span>
        </a>
        <a href="pengumuman_admin.php" 
            class="flex items-center space-x-3 px-4 py-3 <?php echo isActive('pengumuman', $currentPage); ?> rounded-lg">
            <div class="w-5 h-5 flex items-center justify-center">
                <i class="ri-megaphone-line"></i>
            </div>
            <span>Pengumuman</span>
        </a>
        <a href="pengaturan_admin.php"
            class="flex items-center space-x-3 px-4 py-3 <?php echo isActive('pengaturan', $currentPage); ?> rounded-lg">
            <div class="w-5 h-5 flex items-center justify-center">
                <i class="ri-settings-3-line"></i>
            </div>
            <span>Pengaturan</span>
        </a>
    </nav>
</aside>