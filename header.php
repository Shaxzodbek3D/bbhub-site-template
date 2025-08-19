<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="utf-8"/>
    <title>Bukhara Business Hub</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="css/header.css" rel="stylesheet" type="text/css"/>
    
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon"/>
    <link href="images/app-icon.png" rel="apple-touch-icon"/>

    <style>
        /* Asosiy CSS o'zgaruvchilari (sizning oldingi webflow-style.css dan olingan) */
        :root {
            --background--warm: #f4f3f1;
            --contrast--primary-black: #262626;
            --contrast--primary: #fff;
            --brand--light: #2f5b3c; /* Misol uchun yashilroq rang */
            --primary-purple: #8167a9; /* Sizning eski hover rangiz */
        }

        body {
            font-family: 'Epilogue', sans-serif;
            background-color: var(--background--warm);
            color: var(--contrast--primary-black);
            line-height: 1.5;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="header-container">
            <a href="index.php" class="header-logo">
                <img src="images/sunny-20lake-20-black-.png" alt="Bukhara Business Hub Logo"/>
            </a>
            <nav class="main-nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="bizhaqimizda.php" class="nav-link">Biz Haqimizda</a></li>
                     <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle">Xizmatlarimiz</a>
                        <ul class="dropdown-menu">
                            <li><a href="xizmatlar.php" class="dropdown-item">Bepul xizmatlarimiz</a></li>
                            <li><a href="pullikxizmat.php" class="dropdown-item">Pullik xizmatlarimiz</a>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle">Maslahatlar</a>
                        <ul class="dropdown-menu">
                           
                            <li><a href="foydali_malumotList.php" class="dropdown-item">Yaxshi daromad olib keladigan ekinlar</a></li>
                            <li><a href="pdfs/Bukhara investent guide V1.pdf" class="dropdown-item">Buxoro viloyati investitsiya salohiyati</a></li>
                        <li><a href="pdfs/2024_tashqi_yanvar_dekabr.pdf" class="dropdown-item">Buxoro viloyati 2024-yil statistik ma'lumotlari</a></li>
                        <li><a href="https://drive.google.com/drive/folders/1lL-oWsA5sdHWCuDM50l--wTyhn3qe7Yq?usp=sharing" class="dropdown-item">Sektorlar haqida ma'lumotlar</a></li>
                        <li><a href="pdfs/Eng Yaxshi 20 ta Yosh Tadbirkorlik G‘oyasi.pdf" class="dropdown-item">Yosh tadbirkorlar uchun g'oyalar</a></li>
                        <li><a href="pdfs/Yosh Tadbirkor Sifatida Biznesni Boshlash Bo‘yicha 8 Bosqich.pdf" class="dropdown-item">Yosh Tadbirkorlarga Biznesni Boshlash Bo‘yicha qo'llanma</a></li>
                        <li><a href="pdfs/Biznesingizni brendlashning 6 bosqichi.pdf" class="dropdown-item">Biznesni berndlash</a></li>
                        <li>______________________________</li>
                         <li><a href="foydali_malumot.php" class="dropdown-item">Barchasi...</a></li>
                        
                        </ul>
                    </li>
                    <li class="nav-item"><a href="mentorlarhamkor.php" class="nav-link">Mentorlar va Hamkorlar</a></li>
                    <li class="nav-item"><a href="news.php" class="nav-link">Yangiliklar va Blog</a></li>
                    <li class="nav-item"><a href="kontaktlar.php" class="nav-link">Bog‘lanish</a></li>
                </ul>
            </nav>
            <button class="menu-toggle" aria-label="Menyu">
                <span class="hamburger"></span>
            </button>
        </div>
    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNav = document.querySelector('.main-nav');
            const navList = document.querySelector('.nav-list');
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            const header = document.querySelector('.main-header');

            // Hamburger menyuni ochish/yopish
            menuToggle.addEventListener('click', () => {
                mainNav.classList.toggle('open');
                menuToggle.classList.toggle('open');
                document.body.classList.toggle('no-scroll'); // Sahifani aylantirishni to'xtatish
            });

            // Dropdown menyularni boshqarish (faqat mobil/planshetda)
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    if (window.innerWidth <= 991) { // Faqat 991px dan kichik ekranlarda
                        e.preventDefault(); // Linkga o'tishni to'xtatish
                        const parentItem = this.closest('.dropdown');
                        parentItem.classList.toggle('open');
                        
                        // Boshqa ochiq dropdownlarni yopish
                        dropdownToggles.forEach(otherToggle => {
                            const otherParent = otherToggle.closest('.dropdown');
                            if (otherParent !== parentItem && otherParent.classList.contains('open')) {
                                otherParent.classList.remove('open');
                            }
                        });
                    }
                });
            });

            // Scroll effektini boshqarish
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) { // 50px pastga aylantirilganda
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Ekranni o'lchami o'zgarganda menyuni to'g'irlash
            window.addEventListener('resize', () => {
                if (window.innerWidth > 991) {
                    mainNav.classList.remove('open');
                    menuToggle.classList.remove('open');
                    document.body.classList.remove('no-scroll');
                    dropdownToggles.forEach(toggle => { // Desktopda dropdownlar yopiq tursin
                        toggle.closest('.dropdown').classList.remove('open');
                    });
                }
            });
        });
    </script>
    
    
</body>
</html>