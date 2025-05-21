<?php
include('header.php');
// Configuration de base
$hospital_name = "EPH SOBHA";
$tagline = "Au service de votre santé";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unité de Radiologie - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        :root {
            --primary-color: #0077b6;
            --secondary-color: #48cae4;
            --accent-color: #00b4d8;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --success-color: #198754;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/radio.jpg');
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
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 50px;
        }

        .section {
            padding: 0px 0;
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--accent-color);
        }

        .info-card {
            background-color: #f8f9fa;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .guidelines-list {
            list-style-type: none;
            padding-left: 0;
        }

        .guidelines-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .guidelines-list li i {
            color: var(--primary-color);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .special-notice {
            background-color: #fff3cd;
            border-left: 4px solid var(--warning-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: #856404;
            margin-bottom: 10px;
        }

        /* Service de radiologie spécifique */
        .radiology-hours {
            background-color: #e3f2fd;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .radiology-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .radiology-hours p {
            margin-bottom: 10px;
        }
        
        .radiology-card {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .radiology-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--primary-color);
            text-align: center;
            margin: 20px 0;
        }

        .service-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .service-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .service-item:hover {
            transform: translateY(-5px);
        }

        .service-item i {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .service-item h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        /* Examen gallery */
        .exam-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .exam-item {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .exam-item:hover {
            transform: translateY(-5px);
        }

        .exam-image {
            height: 180px;
            background-color: #e6e6e6;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .exam-image i {
            font-size: 3rem;
            color: var(--primary-color);
        }

        .exam-content {
            padding: 15px;
        }

        .exam-content h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* FAQ Section */
        .faq-section {
            margin: 40px 0;
        }

        .faq-item {
            margin-bottom: 15px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background-color: #f0f7ff;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background-color: #e1eefd;
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-answer {
            background-color: white;
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-item.active .faq-answer {
            padding: 15px 20px;
            max-height: 300px;
        }

        /* Call to action */
        .cta-section {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background-color: #e9ecef;
            border-radius: 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #005d91;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list, .exam-gallery {
                grid-template-columns: 1fr;
            }
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        /* Assurer que le contenu ne déborde pas sur mobile */
        html,
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        /* Style pour le bouton de retour en haut */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: var(--primary-color);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
            transform: translateY(20px);
            z-index: 999;
        }

        .back-to-top.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .back-to-top i {
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }
        }    
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Unité de Radiologie</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Des examens radiologiques standards de qualité pour un diagnostic précis à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Unité de Radiologie</h3>
                <p>L'unité de radiologie de l'EPH SOBHA est équipée d'appareils numériques permettant de réaliser des clichés de haute qualité. Notre équipe de techniciens expérimentés assure des examens précis et rapides, essentiels au diagnostic et à la prise en charge thérapeutique des patients.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-x-ray"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="radiology-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Horaires et Disponibilité</h3>
                <p><strong>Examens urgents :</strong> Service disponible 24h/24 pour les urgences médicales</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Notre équipement</h2>
                <p>L'unité de radiologie de l'EPH SOBHA dispose d'équipements numériques permettant d'obtenir des images de haute définition tout en minimisant l'exposition aux rayonnements :</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-x-ray"></i>
                        <h4>Radiographie numérique</h4>
                        <p>Technologie de pointe pour des images précises avec moins de radiations</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-laptop-medical"></i>
                        <h4>Système PACS</h4>
                        <p>Archivage et consultation numérique des images pour un accès rapide aux résultats</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-print"></i>
                        <h4>Système d'impression</h4>
                        <p>Production de clichés sur supports physiques de qualité diagnostique</p>
                    </div>
                </div>
            </section>

            <section class="radiology-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> Types d'examens radiologiques réalisés</h3>
                
                <div class="exam-gallery">
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="exam-image">
                            <i class="fas fa-lungs"></i>
                        </div>
                        <div class="exam-content">
                            <h4>Radiographie thoracique</h4>
                            <p>Examen des poumons, du cœur et des structures thoraciques</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="150">
                        <div class="exam-image">
                            <i class="fas fa-bone"></i>
                        </div>
                        <div class="exam-content">
                            <h4>Radiographie osseuse</h4>
                            <p>Diagnostic des fractures, arthrose et pathologies osseuses</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="exam-image">
                            <i class="fas fa-joint"></i>
                        </div>
                        <div class="exam-content">
                            <h4>Radiographie articulaire</h4>
                            <p>Évaluation des articulations et diagnostic des pathologies articulaires</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="250">
                        <div class="exam-image">
                            <i class="fas fa-stomach"></i>
                        </div>
                        <div class="exam-content">
                            <h4>Radiographie abdominale</h4>
                            <p>Examen des organes abdominaux pour détecter des anomalies</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="exam-image">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <div class="exam-content">
                            <h4>Radiographie du crâne et des sinus</h4>
                            <p>Examen des structures osseuses de la tête et des sinus</p>
                        </div>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Notre équipe</h2>
                
                <p>L'unité de radiologie est composée de professionnels qualifiés :</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-user-nurse"></i> <strong>Manipulateurs en radiologie</strong> : Techniciens formés à la réalisation des examens radiologiques</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>Préparation aux examens radiologiques</h3>
                <p>La plupart des examens de radiologie conventionnelle ne nécessitent pas de préparation particulière. Voici quelques recommandations générales :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>Apporter vos anciens clichés radiologiques pour comparaison</li>
                    <li>Retirer les bijoux, montres et autres objets métalliques de la zone à examiner</li>
                    <li>Informer le personnel en cas de grossesse ou suspicion de grossesse</li>
                    <li>Porter des vêtements confortables sans éléments métalliques</li>
                </ul>
            </div>

            <!-- Section FAQ -->
            <section class="faq-section" data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Questions fréquentes</h2>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-question">
                        <span>Les examens radiologiques sont-ils douloureux ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Les examens de radiologie conventionnelle sont totalement indolores. Le patient doit simplement rester immobile pendant quelques secondes pendant la prise du cliché.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="150">
                    <div class="faq-question">
                        <span>Combien de temps faut-il pour obtenir les résultats ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Les résultats sont disponibles immédiatement et peuvent être communiqués sans délai au médecin prescripteur.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-question">
                        <span>Les examens radiologiques présentent-ils des risques ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Les examens de radiologie conventionnelle utilisent des radiations ionisantes à doses contrôlées et sont prescrits uniquement lorsque le bénéfice attendu est supérieur au risque potentiel. Notre unité applique le principe ALARA (As Low As Reasonably Achievable) pour minimiser l'exposition aux rayonnements tout en garantissant des images de qualité diagnostique.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                    <div class="faq-question">
                        <span>Puis-je être accompagné pendant l'examen ?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Pour la plupart des examens, les accompagnants doivent attendre en salle d'attente. Pour les patients mineurs ou les personnes nécessitant une assistance, un accompagnant peut être autorisé sous réserve des mesures de radioprotection nécessaires.</p>
                    </div>
                </div>
            </section>

            <section class="radiology-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> Parcours patient en radiologie</h3>
                <ol class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-1"></i> <strong>Prise de rendez-vous</strong> : Sur prescription médicale</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-2"></i> <strong>Accueil et enregistrement</strong> : Vérification des documents administratifs et médicaux</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-3"></i> <strong>Réalisation de l'examen</strong> : Par un manipulateur en radiologie</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-4"></i> <strong>Remise des résultats</strong> : Les résultats transmis directement dans le dossier électronique du patient (DEM).</li>
                </ol>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <p class="mt-3">Pour toute autre question concernant notre unité de radiologie :</p>
                <a href="index.php#contact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="250">Contactez-nous</a>
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
    </script>
    <!-- AOS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de AOS
        AOS.init({
            once: false,       // Animation peut se répéter
            mirror: false,     // Animation se produit une seule fois
            offset: 120,       // Décalage (en px) depuis le point de déclenchement original
            easing: 'ease-out-back' // Type d'effet d'animation
        });
    </script>
    <script>
        // Script pour le bouton de retour en haut et accordéon FAQ
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

            // Écoute de l'événement de défilement
            window.addEventListener('scroll', toggleBackToTopButton);

            // Script pour l'accordéon FAQ
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', () => {
                    // Fermer tous les autres items ouverts
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Basculer l'état actif de l'item cliqué
                    item.classList.toggle('active');
                });
            });
        });
    </script>
</body>
</html>

<?php include('footer.php'); ?>