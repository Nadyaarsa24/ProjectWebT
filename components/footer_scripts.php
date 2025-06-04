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
            // Sembunyikan dropdown lain dulu
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

        // Mobile Menu Toggle
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                if (mobileMenu) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.classList.add('flex');
                }
            });
        }
        if (closeMobileMenuButton && mobileMenu) {
             closeMobileMenuButton.addEventListener('click', function() {
                if (mobileMenu) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('flex');
                }
            });
        }

        // Menutup dropdown jika klik di luar
        document.addEventListener('click', (e) => {
            let clickedInsideADropdown = false;
            if (notificationsDropdown && notificationsDropdown.contains(e.target)) clickedInsideADropdown = true;
            if (adminMenuDropdown && adminMenuDropdown.contains(e.target)) clickedInsideADropdown = true;
            
            let clickedOnAButton = false;
            if (notificationsBtn && notificationsBtn.contains(e.target)) clickedOnAButton = true;
            if (adminMenuBtn && adminMenuBtn.contains(e.target)) clickedOnAButton = true;
            // Jangan sertakan mobileMenuButton di sini karena itu hanya membuka menu, bukan dropdown
            // if (mobileMenuButton && mobileMenuButton.contains(e.target)) clickedOnAButton = true; 

            if (!clickedInsideADropdown && !clickedOnAButton) {
                hideAllDropdowns();
            }
        });

        // Close mobile menu when clicking on a link inside it
        if (mobileMenu) {
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    const href = link.getAttribute('href');
                    // Hanya tutup menu jika itu bukan link smooth scroll di halaman yang sama (kecuali untuk #profile, #logout)
                    if (href && href.startsWith('#') && href.length > 1 && !href.startsWith('#!')) {
                        if(href === '#profile' || href === '#logout') { // Aksi khusus yang menutup menu
                             mobileMenu.classList.add('hidden');
                             mobileMenu.classList.remove('flex');
                        }
                        // Untuk link section lain, biarkan smooth-scroll yang menutupnya
                    } else if (href && !href.startsWith('#')) { // Jika link ke halaman lain
                        mobileMenu.classList.add('hidden');
                        mobileMenu.classList.remove('flex');
                    }
                });
            });
        }

        // Select All Checkbox (jika ada di halaman)
        const selectAllCheckbox = document.getElementById('select-all-pendaftar');
        const pendaftarCheckboxes = document.querySelectorAll('input[name="pendaftar_ids[]"]'); // Sesuaikan name jika perlu
        if(selectAllCheckbox && pendaftarCheckboxes.length > 0) {
            selectAllCheckbox.addEventListener('change', function() {
                pendaftarCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
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
                // Abaikan hash link yang hanya "#" atau untuk aksi JS (seperti dropdown, dll)
                if (targetId === "#" || targetId.startsWith("#!") || targetId === "#profile" || targetId === "#settings" || targetId === "#logout" ) return; 
                
                // Jangan prevent default jika link ada di dalam dropdown yang sudah ditangani JS lain
                if (this.closest('#notifications-dropdown') || this.closest('#admin-menu-dropdown')) {
                    return; 
                }
                
                let targetElement;
                try {
                    targetElement = document.querySelector(targetId);
                } catch (error) {
                    // Jika targetId bukan selector CSS yang valid, abaikan agar link bisa berfungsi normal jika itu link eksternal/lain
                    console.warn("Smooth scroll target not found or invalid selector:", targetId);
                    return;
                }

                if (targetElement) {
                    e.preventDefault(); // Hanya prevent default jika target elemen ada untuk smooth scroll
                    const adminHeader = document.querySelector("header.fixed");
                    const headerHeight = adminHeader ? adminHeader.offsetHeight : 0;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20; // 20px offset

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

<script id="slider-script">
    // CATATAN: Script slider ini mungkin tidak relevan untuk semua halaman admin.
    // Pastikan elemen dengan kelas .slider, .slide, dan .slider-dot ada di HTML halaman yang memuat script ini agar berfungsi.
    document.addEventListener("DOMContentLoaded", function () {
        const slider = document.querySelector(".slider");
        if (!slider) return; 
        const slides = slider.querySelectorAll(".slide");
        const dots = document.querySelectorAll(".slider-dot");
        if (slides.length === 0 || dots.length === 0) return;

        let currentSlide = 0;
        const slideCount = slides.length;

        function goToSlide(index) {
            slider.style.transform = `translateX(-${index * 100}%)`;
            dots.forEach((dot) => dot.classList.remove("active", "bg-secondary")); // Gunakan warna tema
            dots.forEach((dot) => dot.classList.add("bg-white/50"));
            if (dots[index]) {
                dots[index].classList.add("active", "bg-secondary");
                dots[index].classList.remove("bg-white/50");
            }
            currentSlide = index;
        }

        dots.forEach((dot, index) => {
            dot.addEventListener("click", () => {
                goToSlide(index);
            });
        });

        function nextSlide() {
            let next = currentSlide + 1;
            if (next >= slideCount) {
                next = 0;
            }
            goToSlide(next);
        }

        const slideInterval = setInterval(nextSlide, 5000);
        slider.addEventListener("mouseenter", () => {
            clearInterval(slideInterval);
        });
        // Inisialisasi slide pertama jika ada slide
        if (slideCount > 0) {
            goToSlide(0);
        }
    });
</script>

<script id="search-filter-script">
    // CATATAN: Script filter ini mungkin spesifik untuk halaman tertentu seperti pendaftar.php atau matakuliah.php.
    // Pastikan elemen yang direferensikan (input search, checkbox filter, tombol pagination) ada di HTML agar berfungsi.
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search-matkul") || document.querySelector('input[placeholder^="Cari"]'); // Lebih generik
        const filterAll = document.getElementById("filter-all"); // Mungkin tidak ada di semua halaman
        
        const paginationButtonsContainer = document.querySelector(".inline-flex.rounded-button.shadow-sm"); // Lebih spesifik ke kontainer pagination
        
        // Hanya lanjutkan jika ada elemen yang relevan
        if (!searchInput && !filterAll && !paginationButtonsContainer) {
            // console.log("Elemen untuk search/filter/pagination tidak ditemukan di halaman ini.");
            return;
        }

        const filters = Array.from(document.querySelectorAll('input[type="checkbox"][id^="filter-"]')).filter(cb => cb.id !== 'filter-all');

        if (paginationButtonsContainer) {
            const paginationButtons = paginationButtonsContainer.querySelectorAll(".pagination-btn");
            const nextPageButton = paginationButtonsContainer.querySelector(".ri-arrow-right-s-line")?.parentElement;
            const prevPageButton = paginationButtonsContainer.querySelector(".ri-arrow-left-s-line")?.parentElement;
            let currentPage = 1;

            function updatePaginationState(newPage) {
                if (paginationButtons.length === 0) return;
                currentPage = newPage;
                paginationButtons.forEach((btn, index) => {
                    const pageNumber = parseInt(btn.textContent) || (index + 1); // Ambil nomor dari teks atau index
                    if (pageNumber === currentPage) {
                        btn.classList.remove("bg-gray-700", "text-gray-300", "hover:bg-gray-600");
                        btn.classList.add("bg-secondary", "text-primary");
                    } else {
                        btn.classList.remove("bg-secondary", "text-primary");
                        btn.classList.add("bg-gray-700", "text-gray-300", "hover:bg-gray-600");
                    }
                });
            }

            if (nextPageButton) {
                nextPageButton.addEventListener("click", () => {
                    if (currentPage < paginationButtons.length) { // Asumsi jumlah tombol = jumlah halaman
                        updatePaginationState(currentPage + 1);
                    }
                });
            }

            if (prevPageButton) {
                prevPageButton.addEventListener("click", () => {
                    if (currentPage > 1) {
                        updatePaginationState(currentPage - 1);
                    }
                });
            }

            paginationButtons.forEach((btn) => {
                btn.addEventListener("click", () => {
                    const pageNumber = parseInt(btn.textContent);
                    if (!isNaN(pageNumber)) {
                        updatePaginationState(pageNumber);
                    }
                });
            });
            
            if (paginationButtons.length > 0) {
                 updatePaginationState(1); 
            }
        }

        if (searchInput) {
            searchInput.addEventListener("input", function () {
                // Implementasi logika pencarian di sini
                console.log("Mencari:", this.value);
            });
        }

        if (filterAll) {
            filterAll.addEventListener("change", function () {
                if (this.checked) {
                    filters.forEach(f => f.checked = false );
                }
            });
        }

        filters.forEach((filter) => {
            filter.addEventListener("change", function () {
                if (this.checked && filterAll) {
                    filterAll.checked = false;
                }
                let anySpecificFilterChecked = filters.some(f => f.checked);
                if (!anySpecificFilterChecked && filterAll && !filterAll.checked) { 
                    filterAll.checked = true;
                }
            });
        });
    });
</script>