<?php
require_once 'auth_check.php';
$hospital_name = "EPH SOBHA";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hospital_name; ?> - Établissement Public Hospitalier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon.png" type="image/png">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logo1.png?v=<?php echo time(); ?>" alt="Logo de l'hôpital" class="logo-img">
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

    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
            <?php
            // Récupérer le nom du fichier courant
            $current_page = basename($_SERVER['PHP_SELF']);
            ?>
            <ul class="nav-menu">
                <li><a href="index.php#accueil"
                        class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Accueil</a></li>
                <li><a href="actualites.php"
                        class="<?php echo ($current_page == 'actualites.php') ? 'active' : ''; ?>">Actualités</a></li>
                <li><a href="services.php" class="<?php echo ($current_page == 'services.php') ? 'active' : ''; ?>">Nos
                        Services</a></li>
                <li><a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">À
                        Propos</a></li>
                <li><a href="charte.php" class="<?php echo ($current_page == 'charte.php') ? 'active' : ''; ?>">Charte
                        du Patient</a></li>
                <li><a href="recrutement.php"
                        class="<?php echo ($current_page == 'recrutement.php') ? 'active' : ''; ?>">Recrutement</a></li>
                <li><a href="contact.php"
                        class="<?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-user-shield"></i> Admin <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="admin-actualites.php"><i class="fas fa-cog"></i> Paramètres</a></li>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <style>
        /* Styles pour le menu déroulant */
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
            right: 0;
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
        }

        .dropdown-menu a:hover {
            background-color: #f5f5f5;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Style pour le lien de déconnexion */
        .dropdown-menu a[href="logout.php"] {
            color: #dc3545;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .dropdown-menu {
                position: static;
                box-shadow: none;
                background-color: var(--dark-color);
                border-radius: 0;
                padding-left: 20px;
            }

            .dropdown:hover .dropdown-menu {
                display: none;
            }

            .dropdown.active .dropdown-menu {
                display: block;
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
            left: 75px;
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
                right: 20px;
            }

            .ia-floating-button i {
                font-size: 20px;
            }
        }

        /* Animation du bouton */
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
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const navMenu = document.querySelector('.nav-menu');

            // Gestion du dropdown sur mobile
            const dropdownToggle = document.querySelector('.dropdown-toggle');
            const dropdown = document.querySelector('.dropdown');

            if (dropdownToggle) {
                dropdownToggle.addEventListener('click', function (e) {
                    e.preventDefault();
                    dropdown.classList.toggle('active');
                });
            }

            // Fonction pour basculer l'affichage du menu
            function toggleMenu() {
                navMenu.classList.toggle('show');
                mobileMenuBtn.classList.toggle('active');
            }

            // Écouteur d'événement sur le bouton du menu
            mobileMenuBtn.addEventListener('click', toggleMenu);

            // Fermer le menu en cliquant sur un lien (sauf le dropdown toggle)
            const navLinks = document.querySelectorAll('.nav-menu a:not(.dropdown-toggle)');
            navLinks.forEach(link => {
                link.addEventListener('click', function () {
                    if (navMenu.classList.contains('show')) {
                        toggleMenu();
                    }
                });
            });

            // Fermer le menu en cliquant en dehors
            document.addEventListener('click', function (event) {
                const isClickInsideMenu = navMenu.contains(event.target);
                const isClickOnButton = mobileMenuBtn.contains(event.target);

                if (!isClickInsideMenu && !isClickOnButton && navMenu.classList.contains('show')) {
                    toggleMenu();
                }
            });

            // Ajuster le comportement lors du redimensionnement de la fenêtre
            window.addEventListener('resize', function () {
                if (window.innerWidth > 768 && navMenu.classList.contains('show')) {
                    navMenu.classList.remove('show');
                    mobileMenuBtn.classList.remove('active');
                }
            });
        });
    </script>