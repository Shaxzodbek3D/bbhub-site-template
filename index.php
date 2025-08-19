<?php include 'header.php'; ?>

<?php include 'video.php'; ?>
<!-- video headerni chaqirish -->

<?php include 'post.php'; ?>

<?php include 'post1.php'; ?>
<!-- 1-rasmli postni chaqirish -->

<?php include 'post2.php'; ?>
  
<?php include 'qollanma.php'; ?>
  
<?php include 'post4.php'; ?>

<?php include 'youtubemain.php'; ?>

<?php include 'post5mail.php'; ?>

<?php include 'post6news.php'; ?>

<!-- Footerni chaqirish uchun  -->
    <?php include 'footer.php'; ?>
    
    
  <script>
document.addEventListener('DOMContentLoaded', function() {
    // =======================================
    // Header uchun scroll effekti
    // =======================================
    const header = document.querySelector('.main-header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) { // 50px pastga aylantirilganda
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // =======================================
    // Hamburger menyu va dropdownlar uchun JS
    // =======================================
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-nav');
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    // Agar menuToggle va mainNav topilsa, tinglovchilarni qo'shamiz
    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', () => {
            mainNav.classList.toggle('open');
            menuToggle.classList.toggle('open');
            document.body.classList.toggle('no-scroll'); // Sahifani aylantirishni to'xtatish
        });
    } else {
        console.error('Hamburger menyu elementlari topilmadi. main-nav yoki menu-toggle klasslari noto\'g\'ri.');
    }

    if (dropdownToggles.length > 0) {
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) { 
                    e.preventDefault();
                    const parentItem = this.closest('.dropdown');
                    if (parentItem) { // Parent element mavjudligini tekshiramiz
                        parentItem.classList.toggle('open');
                    }
                    
                    dropdownToggles.forEach(otherToggle => {
                        const otherParent = otherToggle.closest('.dropdown');
                        if (otherParent && otherParent !== parentItem && otherParent.classList.contains('open')) {
                            otherParent.classList.remove('open');
                        }
                    });
                }
            });
        });
    }

    // =======================================
    // Ekranni o'lchami o'zgarganda funksionaliklarni yangilash
    // =======================================
    window.addEventListener('resize', () => {
        if (window.innerWidth > 991) { // Desktopga qaytganda
            if (mainNav) mainNav.classList.remove('open');
            if (menuToggle) menuToggle.classList.remove('open');
            document.body.classList.remove('no-scroll');
            dropdownToggles.forEach(toggle => {
                const parentItem = toggle.closest('.dropdown');
                if (parentItem) parentItem.classList.remove('open'); // Desktopda dropdownlar yopiq tursin
            });
        }
        // post.php slaydshouni resize bo'lganda sozlash
        updateInfoSectionSlideshow(); 
        // Yangiliklar karuselini resize bo'lganda sozlash
        updateNewsCarousel(); 
    });


    // =======================================
    // post.php - Avtomatik rasmlar almashish uchun JS
    // =======================================
    const infoSection = document.getElementById('info-section-scroll');
    let slideshowInterval; // Interval ID'sini saqlash uchun

    function updateInfoSectionSlideshow() {
        if (!infoSection) return;

        const imagesWrapper = infoSection.querySelector('.sticky-scroll-images');
        const images = infoSection.querySelectorAll('.sticky-image-item');

        if (imagesWrapper && images.length > 0) {
            let currentImageIndex = 0;
            const intervalTime = 2000; // 2 sekund

            if (slideshowInterval) clearInterval(slideshowInterval); // Oldingi intervalni tozalash

            if (window.innerWidth > 991) { // Faqat desktopda
                showImage(0); // Boshida birinchi rasmni ko'rsatamiz
                currentImageIndex = 0;
                slideshowInterval = setInterval(() => {
                    currentImageIndex = (currentImageIndex + 1) % images.length;
                    showImage(currentImageIndex);
                }, intervalTime);
            } else { // Mobil va planshetda
                images.forEach(img => img.classList.add('visible')); // Hammasini ko'rsatamiz
            }
        }
    }

    function showImage(index) {
        const infoSection = document.getElementById('info-section-scroll'); 
        if (!infoSection) return;
        const images = infoSection.querySelectorAll('.sticky-image-item');
        images.forEach((img, idx) => {
            if (idx === index) {
                img.classList.add('visible');
            } else {
                img.classList.remove('visible');
            }
        });
    }

    // =======================================
    // post6news.php - Dinamik yangiliklar karuseli
    // =======================================
    const newsCarouselInner = document.querySelector('.news-carousel-inner');
    const newsSection = document.querySelector('.section-news.dynamic-news-section'); // Bu o'zgaruvchi hozircha ishlatilmayapti
    let newsItems = [];
    let currentNewsIndex = 0;
    let newsInterval;

    function fetchNews() {
        const phpApiUrl = 'get_news.php'; 

        fetch(phpApiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    console.error('API Error:', data.error);
                    if (newsCarouselInner) {
                        newsCarouselInner.innerHTML = '<p style="text-align:center; color: #555;">Yangiliklarni yuklashda xatolik yuz berdi: ' + data.error + '</p>';
                    }
                    return;
                }
                newsItems = data;

                if (newsItems.length === 0) {
                    if (newsCarouselInner) {
                        newsCarouselInner.innerHTML = '<p style="text-align:center; color: #555;">Hozircha yangiliklar topilmadi.</p>';
                    }
                    return;
                }

                renderNewsCarousel();
                startNewsCarousel();
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                if (newsCarouselInner) {
                    newsCarouselInner.innerHTML = '<p style="text-align:center; color: #555;">Yangiliklarni yuklashda muammo yuz berdi. Iltimos, keyinroq urinib ko\'ring.</p>';
                }
            });
    }

    function renderNewsCarousel() {
        if (!newsCarouselInner) return;
        newsCarouselInner.innerHTML = '';
        newsItems.forEach((newsItem, index) => {
            const newsCardHtml = `
                <a href="${newsItem.link}" class="news-card-link carousel-card-item" target="_blank">
                    <div class="news-card">
                        <div class="news-image-wrapper">
                            <img src="${newsItem.image}" alt="${newsItem.title}" class="news-card-image"/>
                        </div>
                        <div class="news-content-wrapper">
                            <h4 class="news-card-title">${newsItem.title}</h4>
                            <p class="news-card-paragraph">${newsItem.description}</p>
                        </div>
                    </div>
                </a>
            `;
            newsCarouselInner.insertAdjacentHTML('beforeend', newsCardHtml);
        });
        
        currentNewsIndex = 0;
        updateCarouselTransform();
    }

    function updateCarouselTransform() {
        if (newsCarouselInner) {
            newsCarouselInner.style.transform = `translateX(-${currentNewsIndex * 100}%)`;
        }
    }

    function showNextNews() {
        currentNewsIndex = (currentNewsIndex + 1) % newsItems.length;
        updateCarouselTransform();
    }

    function startNewsCarousel() {
        if (newsInterval) clearInterval(newsInterval);
        if (window.innerWidth > 991 && newsItems.length > 1) {
            newsInterval = setInterval(showNextNews, 5000);
        } else {
            if (newsCarouselInner) {
                newsCarouselInner.style.transform = `translateX(0)`;
                newsCarouselInner.style.flexWrap = 'wrap';
                newsCarouselInner.style.justifyContent = 'center';
                newsCarouselInner.style.gap = '20px';
            }
            const newsCards = document.querySelectorAll('.news-carousel-inner .news-card-link.carousel-card-item');
            newsCards.forEach(card => {
                if (window.innerWidth <= 991) {
                    card.style.width = 'calc(50% - 10px)';
                    if (window.innerWidth <= 767) {
                        card.style.width = '100%';
                    }
                } else {
                    card.style.width = '100%';
                }
            });
        }
    }
</script>
</body>
</html>