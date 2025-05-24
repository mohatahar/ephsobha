<?php
require_once 'auth_check.php';
$hospital_name = "مستشفى الصبحة";
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hospital_name; ?> - المؤسسة العمومية الإستشفائية الصبحة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- الرأسية -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index-ar.php">
                        <img src="img/logo1.png?v=<?php echo time(); ?>" alt="شعار المستشفى" class="logo-img">
                    </a>
                    <div class="logo-text">
                        <h1><?php echo $hospital_name; ?></h1>
                    </div>
                </div>
                <div class="contact-info">
                    <div>
                        <i class="fas fa-phone"></i>
                        <span>+213 27 71 91 97</span>
                    </div>
                    <div>
                        <i class="fas fa-envelope"></i>
                        <span>contact.ephsobha@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- التنقل -->
    <nav>
        <div class="container">
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>

            <!-- Language switcher for mobile - positioned where the red circle is -->
            <div class="language-switcher mobile-lang-switcher">
                <button class="lang-btn" onclick="switchLanguage('fr')">
                    <i class="fas fa-globe"></i> Français
                </button>
            </div>

            <?php
            // الحصول على اسم الملف الحالي
            $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <ul class="nav-menu">
                <li><a href="index-ar.php"
                        class="<?php echo ($current_page == 'index-ar.php') ? 'active' : ''; ?>">الرئيسية</a></li>
                <li><a href="actualites-ar.php"
                        class="<?php echo ($current_page == 'actualites-ar.php') ? 'active' : ''; ?>">الأخبار</a></li>
                <li><a href="services-ar.php"
                        class="<?php echo ($current_page == 'services-ar.php') ? 'active' : ''; ?>">خدماتنا</a></li>
                <li><a href="about-ar.php" class="<?php echo ($current_page == 'about-ar.php') ? 'active' : ''; ?>">من
                        نحن</a>
                </li>
                <li><a href="charte-ar.php"
                        class="<?php echo ($current_page == 'charte-ar.php') ? 'active' : ''; ?>">ميثاق
                        المريض</a></li>
                <li><a href="recrutement-ar.php"
                        class="<?php echo ($current_page == 'recrutement-ar.php') ? 'active' : ''; ?>">التوظيف</a></li>
                <li><a href="contact-ar.php"
                        class="<?php echo ($current_page == 'contact-ar.php') ? 'active' : ''; ?>">اتصل
                        بنا</a></li>
                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-user-shield"></i> المشرف <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="admin-actualites.php"><i class="fas fa-cog"></i> الإعدادات</a></li>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Language switcher for desktop -->
                <div class="language-switcher desktop-lang-switcher">
                    <button class="lang-btn" onclick="switchLanguage('fr')">
                        <i class="fas fa-globe"></i> Français
                    </button>
                </div>
            </ul>
        </div>
    </nav>

    <style>
        /* تطبيق الخط العربي */
        body,
        html {
            font-family: 'Noto Sans Arabic', Arial, sans-serif;
            direction: rtl;
            text-align: right;
        }

        /* Maintenir la direction LTR pour les informations de contact */
        .contact-info {
            direction: ltr;
            text-align: left;
        }

        .contact-info div {
            direction: ltr;
            text-align: left;
        }

        /* Styles pour le bouton de changement de langue */
        .language-switcher {
            display: flex;
            align-items: center;
        }

        .desktop-lang-switcher {
            margin-right: auto;
        }

        .mobile-lang-switcher {
            display: none;
        }

        .lang-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .lang-btn:hover {
            background-color: var(--dark-color);
            transform: translateY(-2px);
        }

        /* أنماط القائمة المنسدلة */
        .dropdown {
            position: relative;
        }

        .dropdown-toggle {
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: var(--dark-color);
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            border-radius: 4px;
            padding: 8px 0;
            left: 0;
        }

        .dropdown-menu li {
            width: 100%;
            margin: 0;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s;
            text-align: right;
        }

        .dropdown-menu a:hover {
            background-color: #f5f5f5;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* نمط رابط تسجيل الخروج */
        .dropdown-menu a[href="logout.php"] {
            color: #dc3545;
        }

        /* أنماط متجاوبة */
        @media (max-width: 768px) {
            .nav-menu a {
                text-align: right !important;
                justify-content: flex-end;
                padding-right: 0;
            }

            /* إخفاء language switcher للسطح المكتب */
            .desktop-lang-switcher {
                display: none;
            }

            /* عرض وتموضع language switcher للجوال */
            .mobile-lang-switcher {
                display: flex;
                position: absolute;
                left: 20px;
                top: 50%;
                transform: translateY(-50%);
                z-index: 1001;
            }

            .mobile-lang-switcher .lang-btn {
                padding: 10px 15px;
                border-radius: 25px;
                font-size: 12px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            }

            .mobile-lang-switcher .lang-btn:hover {
                transform: translateY(-50%) scale(1.05);
            }

            .dropdown-menu {
                position: static;
                box-shadow: none;
                background-color: var(--dark-color);
                border-radius: 0;
                padding-right: 20px;
            }

            .dropdown:hover .dropdown-menu {
                display: none;
            }

            .dropdown.active .dropdown-menu {
                display: block;
            }

            /* ضبط موضع حاوي التنقل */
            nav .container {
                position: relative;
            }
        }

        /* للشاشات الصغيرة جداً */
        @media (max-width: 480px) {
            .mobile-lang-switcher {
                left: 15px;
            }

            .mobile-lang-switcher .lang-btn {
                padding: 8px 12px;
                font-size: 11px;
            }
        }

        .ia-floating-button {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 60px;
            height: 60px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            z-index: 1000;
            transition: all 0.3s ease, opacity 0.3s, visibility 0.3s;
        }

        .ia-floating-button:hover {
            background-color: var(--dark-color);
            transform: scale(1.05);
        }

        .ia-floating-button i {
            font-size: 24px;
        }

        .ia-floating-tooltip {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 14px;
            right: 75px;
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }

        .ia-floating-button:hover .ia-floating-tooltip {
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .ia-floating-button {
                width: 50px;
                height: 50px;
                bottom: 20px;
                left: 20px;
            }

            .ia-floating-button i {
                font-size: 20px;
            }
        }

        /* حركة الزر */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(0, 123, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
            }
        }
    </style>

    <script>
        // Fonction pour changer de langue
        function switchLanguage(lang) {
            if (lang === 'fr') {
                // Obtenir le nom de la page actuelle
                let currentPage = window.location.pathname.split('/').pop();
                
                // Supprimer le suffixe -ar.php et remplacer par .php
                let pageName = currentPage.replace('-ar.php', '');
                
                // Construire l'URL de la page française
                let frenchPageUrl = pageName + '.php';
                
                // Rediriger vers la version française de la page actuelle
                window.location.href = frenchPageUrl;
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const navMenu = document.querySelector('.nav-menu');

            // إدارة القائمة المنسدلة على الجوال
            const dropdownToggle = document.querySelector('.dropdown-toggle');
            const dropdown = document.querySelector('.dropdown');

            if (dropdownToggle) {
                dropdownToggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                });
            }

            // دالة لتبديل عرض القائمة
            function toggleMenu() {
                navMenu.classList.toggle('show');
                mobileMenuBtn.classList.toggle('active');
            }

            // مستمع الأحداث على زر القائمة
            mobileMenuBtn.addEventListener('click', toggleMenu);

            // إغلاق القائمة عند النقر على رابط (باستثناء مبدل القائمة المنسدلة)
            const navLinks = document.querySelectorAll('.nav-menu a:not(.dropdown-toggle)');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (navMenu.classList.contains('show')) {
                        toggleMenu();
                    }
                });
            });

            // إغلاق القائمة عند النقر في الخارج
            document.addEventListener('click', function (event) {
                const isClickInsideMenu = navMenu.contains(event.target);
                const isClickOnButton = mobileMenuBtn.contains(event.target);
                const isClickOnLangSwitcher = document.querySelector('.mobile-lang-switcher').contains(event.target);

                if (!isClickInsideMenu && !isClickOnButton && !isClickOnLangSwitcher && navMenu.classList.contains('show')) {
                    toggleMenu();
                }
            });

            // ضبط السلوك عند تغيير حجم النافذة
            window.addEventListener('resize', function () {
                if (window.innerWidth > 768 && navMenu.classList.contains('show')) {
                    navMenu.classList.remove('show');
                    mobileMenuBtn.classList.remove('active');
                }
            });
        });
    </script>