<?php
/**
 * Script qui affiche les actualités de la page Facebook "ephsobha.sante"
 * en utilisant les plugins sociaux Facebook
 */

// Configuration
$facebook_page_url = "https://www.facebook.com/ephsobha.sante";
$facebook_page_name = "EPH SOBHA Santé";
$max_posts = 10; // Nombre maximum de publications à afficher

include('header.php');
// Configuration de base similaire à visite.php
$hospital_name = "EPH SOBHA";
$tagline = "Au service de votre santé";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a73e8;
            --primary-dark: #0d47a1;
            --secondary-color: #4fc3f7;
            --accent-color: #00b0ff;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --success-color: #198754;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-300: #dee2e6;
            --gray-800: #343a40;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.7;
            font-family: 'Poppins', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        p {
            font-size: 1.05rem;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Page Title */
          .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/actualites.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 120px 20px;
            position: relative;
            margin-bottom: 60px;
        }

        .page-title h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            position: relative;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .page-title p {
            font-size: 1.4rem;
            max-width: 700px;
            margin: 0 auto;
            font-weight: 300;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to bottom right, transparent 49%, white 50%);
        }
        .page-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 50px 40px;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 100%;
        }

        .page-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .section {
            padding: 30px 0;
            position: relative;
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 30px;
            padding-bottom: 20px;
            position: relative;
            font-weight: 700;
            font-size: 2.2rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 2px;
        }

        .info-card {
            background-color: rgba(26, 115, 232, 0.03);
            border-left: 5px solid var(--primary-color);
            padding: 30px;
            margin-bottom: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 1.6rem;
        }
        
        .info-card h3 i {
            margin-right: 15px;
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 1.2rem;
        }

        .fb-page-container {
            display: flex;
            justify-content: center;
            margin: 40px 0;
            padding: 20px;
            border-radius: 10px;
            background-color: var(--gray-100);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
            width: 100%;
        }
        
        .fb-page-container iframe {
            width: 100% !important;
        }
        
        .fb-page-container::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(135deg, rgba(26, 115, 232, 0.05), transparent);
            pointer-events: none;
        }

        .fb-feed {
            margin-top: 40px;
            min-height: 500px;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
        }
        
        .fb-feed iframe {
            width: 100% !important;
        }

        .fb-loading {
            text-align: center;
            padding: 60px 0;
            color: var(--gray-800);
            font-size: 1.2rem;
            width: 100%;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .fb-loading i {
            color: var(--primary-color);
            font-size: 2rem;
            display: block;
            margin-bottom: 15px;
            animation: spin 1.5s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .fb-link {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(45deg, var(--primary-color), var(--primary-dark));
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 50px;
            margin-top: 25px;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(26, 115, 232, 0.3);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .fb-link::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(45deg, var(--primary-dark), var(--primary-color));
            opacity: 0;
            z-index: -1;
            transition: opacity 0.5s ease;
        }
        
        .fb-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(26, 115, 232, 0.4);
        }
        
        .fb-link:hover::before {
            opacity: 1;
        }
        
        .fb-link i {
            margin-right: 10px;
        }

        .cta-section {
            text-align: center;
            margin: 50px 0 30px;
            padding: 40px;
            background: linear-gradient(135deg, var(--gray-100), white);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(79, 195, 247, 0.1) 0%, transparent 70%);
            top: -100px;
            right: -100px;
            border-radius: 50%;
        }
        
        .cta-section::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(26, 115, 232, 0.1) 0%, transparent 70%);
            bottom: -100px;
            left: -50px;
            border-radius: 50%;
        }
        
        .cta-section h3 {
            color: var(--dark-color);
            margin-bottom: 15px;
            font-size: 1.8rem;
        }
        
        .cta-section p {
            color: var(--gray-800);
            margin-bottom: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Bouton de retour en haut */
        .back-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform: translateY(20px) scale(0.9);
            z-index: 999;
            box-shadow: 0 5px 15px rgba(0, 180, 216, 0.4);
        }

        .back-to-top.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
        }

        .back-to-top:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0, 180, 216, 0.5);
        }

        .back-to-top i {
            font-size: 1.8rem;
        }
        
        /* Pulse effect */
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(26, 115, 232, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(26, 115, 232, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(26, 115, 232, 0);
            }
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .page-title h1 {
                font-size: 3.5rem;
            }
            
            .page-content {
                padding: 40px 30px;
            }
        }
        
        @media (max-width: 768px) {
            .page-title {
                padding: 120px 20px 100px;
            }
            
            .page-title h1 {
                font-size: 3rem;
            }
            
            .page-content {
                padding: 30px 25px;
            }
            
            .info-card {
                padding: 25px;
            }
            
            .fb-page-container,
            .fb-feed {
                padding: 15px;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 100px 20px 80px;
            }

            .page-title h1 {
                font-size: 2.5rem;
            }
            
            .page-title p {
                font-size: 1.2rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .info-card h3 {
                font-size: 1.4rem;
            }
            
            .cta-section {
                padding: 30px 20px;
            }
            
            .social-icons a {
                width: 45px;
                height: 45px;
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Chargement du SDK Facebook -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v17.0"></script>
    
    <!-- Script pour forcer la largeur maximale du contenu Facebook -->
    <script>
        window.addEventListener('load', function() {
            // Fonction pour ajuster la taille des iframes Facebook
            function resizeFacebookContent() {
                // Sélectionner tous les iframes générés par Facebook
                const fbIframes = document.querySelectorAll('.fb-page iframe, .fb-page-container iframe, .fb-feed iframe');
                
                // Parcourir tous les iframes et ajuster leur largeur
                fbIframes.forEach(function(iframe) {
                    iframe.style.width = '100%';
                    // Si l'iframe a un parent avec une largeur fixe, ajuster également
                    if (iframe.parentElement) {
                        iframe.parentElement.style.width = '100%';
                        if (iframe.parentElement.parentElement) {
                            iframe.parentElement.parentElement.style.width = '100%';
                        }
                    }
                });
            }
            
            // Exécuter immédiatement et périodiquement pour s'assurer que les iframes sont bien ajustés
            resizeFacebookContent();
            
            // Réexécuter après quelques secondes pour les iframes qui se chargent en retard
            setTimeout(resizeFacebookContent, 2000);
            setTimeout(resizeFacebookContent, 5000);
        });
    </script>
    
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1200">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1200">Actualités</h1>
            <p data-aos="fade-up" data-aos-duration="1200" data-aos-delay="300">Restez informé des dernières nouvelles et événements de l'<?php echo $hospital_name; ?></p>
        </div>
    </section>
    
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="150">
                <h3><i class="fas fa-newspaper"></i> Informations et actualités</h3>
                <p>Sur cette page, vous pouvez consulter toutes les actualités et informations importantes concernant notre établissement hospitalier. Nous publions régulièrement des informations sur nos services, les événements à venir, les campagnes de sensibilisation et d'autres annonces importantes pour nos patients et visiteurs.</p>
            </div>
            
            <!-- Section Facebook -->
            <section class="section" data-aos="fade-up" data-aos-delay="250">
                <h2 class="section-title">Nos dernières actualités</h2>           
                
                <!-- Widget de la page Facebook -->
                <div class="fb-page-container" data-aos="zoom-in" data-aos-delay="350">
                    <div class="fb-page" 
                         data-tabs="" 
                         data-width="1100" 
                         data-height="" 
                         data-small-header="false" 
                         data-adapt-container-width="true" 
                         data-hide-cover="false" 
                         data-show-facepile="true">
                        <blockquote cite="<?php echo $facebook_page_url; ?>" class="fb-xfbml-parse-ignore">
                            <a href="<?php echo $facebook_page_url; ?>"><?php echo $facebook_page_name; ?></a>
                        </blockquote>
                    </div>
                </div>            
                
                <!-- Flux de publications -->
                <div class="fb-feed" data-aos="fade-up" data-aos-delay="450">
                    <div class="fb-loading">
                        <i class="fas fa-circle-notch fa-spin"></i>
                        Chargement des actualités...
                    </div>
                    <div class="fb-page" 
                         data-href="<?php echo $facebook_page_url; ?>" 
                         data-tabs="timeline" 
                         data-width="1100" 
                         data-height="800" 
                         data-small-header="false" 
                         data-adapt-container-width="true" 
                         data-hide-cover="false" 
                         data-show-facepile="false">
                        <blockquote cite="<?php echo $facebook_page_url; ?>" class="fb-xfbml-parse-ignore">
                            <a href="<?php echo $facebook_page_url; ?>"><?php echo $facebook_page_name; ?></a>
                        </blockquote>
                    </div>
                </div>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="550">
                <h3>Suivez-nous sur les réseaux sociaux</h3>
                <p>Pour ne manquer aucune actualité, suivez-nous sur nos réseaux sociaux officiels et restez connecté avec nos services et annonces importantes.</p>
                               
                <a href="<?php echo $facebook_page_url; ?>" target="_blank" class="fb-link pulse" data-aos="fade-up" data-aos-delay="650">
                    <i class="fab fa-facebook-f"></i> Visitez notre page Facebook
                </a>
            </div>
        </div>
    </div>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script>
        // Script pour le bouton de retour en haut
        document.addEventListener('DOMContentLoaded', function () {
            const backToTopButton = document.getElementById('back-to-top');

            // Fonction pour afficher ou masquer le bouton en fonction du défilement
            function toggleBackToTopButton() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            }

            // Ajout d'un effet de défilement fluide lors du clic sur le bouton
            backToTopButton.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Écouter l'événement de défilement pour afficher/masquer le bouton
            window.addEventListener('scroll', toggleBackToTopButton);

            // Vérifier la position de défilement au chargement de la page
            toggleBackToTopButton();
        });

        // Masquer le message de chargement une fois que le contenu est chargé
        window.fbAsyncInit = function() {
            FB.Event.subscribe('xfbml.render', function() {
                setTimeout(function() {
                    const loadingElement = document.querySelector('.fb-loading');
                    if (loadingElement) {
                        loadingElement.style.display = 'none';
                    }
                    
                    // Force les iframes Facebook à prendre toute la largeur
                    const fbIframes = document.querySelectorAll('.fb-page iframe, .fb-page-container iframe, .fb-feed iframe');
                    fbIframes.forEach(function(iframe) {
                        iframe.style.width = '100%';
                        if (iframe.parentElement) {
                            iframe.parentElement.style.width = '100%';
                        }
                    });
                    
                }, 1000); // Petit délai pour garantir que le contenu est bien chargé
            });
        };
    </script>

    <!-- AOS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de AOS avec des options améliorées
        AOS.init({
            once: false,       // Animation peut se répéter
            mirror: false,     // Animation se produit une seule fois
            offset: 120,       // Décalage (en px) depuis le point de déclenchement original
            easing: 'ease-out-cubic', // Type d'effet d'animation plus doux
            duration: 800,     // Durée globale des animations
            delay: 100,        // Délai global par défaut
            anchorPlacement: 'top-bottom' // Position de l'élément par rapport à la fenêtre qui déclenche l'animation
        });
    </script>
</body>
</html>

<?php include('footer.php'); ?>