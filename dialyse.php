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
    <title>Service d'Hémodialyse - <?php echo $hospital_name; ?></title>
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/dialyse.jpg');
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
            background-color: #e3f2fd;
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Service de dialyse spécifique */
        .dialysis-hours {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .dialysis-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .dialysis-hours p {
            margin-bottom: 10px;
        }
        
        .dialysis-card {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .dialysis-card h3 {
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

        .btn-info {
            background-color: var(--accent-color);
            color: white;
        }

        .btn-info:hover {
            background-color: #0096c7;
        }

        /* Tableau des séances */
        .session-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .session-table th, 
        .session-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .session-table th {
            background-color: var(--primary-color);
            color: white;
        }

        .session-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .session-table tr:hover {
            background-color: #e9ecef;
        }

        /* Statistiques */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .stat-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .stat-item .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 10px 0;
        }

        .stat-item .stat-label {
            color: var(--dark-color);
            font-size: 1rem;
        }

        /* FAQ Accordion */
        .faq-container {
            margin: 30px 0;
        }

        .faq-item {
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .faq-question {
            padding: 15px;
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: var(--primary-color);
        }

        .faq-question:after {
            content: '\f107';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question:after {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 15px;
            max-height: 500px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list,
            .stats-row {
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
            <h1 data-aos="fade-down" data-aos-duration="1000">Service d'Hémodialyse</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Des soins spécialisés pour les patients atteints d'insuffisance rénale à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Service d'Hémodialyse</h3>
                <p>Le service d'hémodialyse de l'EPH SOBHA offre des traitements de substitution rénale pour les patients souffrant d'insuffisance rénale chronique ou aiguë. Notre équipe médicale et paramédicale hautement spécialisée assure une prise en charge complète et personnalisée dans un environnement sécurisé et confortable. Nous nous engageons à fournir des soins de qualité qui améliorent la qualité de vie de nos patients tout en veillant à leur bien-être physique et psychologique.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-filter"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="dialysis-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Organisation des séances</h3>
                <p><strong>Horaires :</strong> Notre service d'hémodialyse fonctionne du samedi au jeudi, avec trois séances quotidiennes pour accueillir tous nos patients.</p>
                <p><strong>Équipe médicale :</strong> Notre équipe est composée de néphrologues, de médecins généralistes, d'infirmiers et de personnel de soutien, tous dédiés à offrir les meilleurs soins.</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Notre service d'hémodialyse</h2>
                
                <div class="stats-row" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <i class="fas fa-hospital-user"></i>
                        <div class="stat-number">14</div>
                        <div class="stat-label">Générateurs de dialyse</div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-procedures"></i>
                        <div class="stat-number">70+</div>
                        <div class="stat-label">Patients suivis</div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-calendar-check"></i>
                        <div class="stat-number">3</div>
                        <div class="stat-label">Séances quotidiennes</div>
                    </div>
                </div>
                
                <p>Notre service d'hémodialyse propose :</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-filter"></i>
                        <h4>Hémodialyse conventionnelle</h4>
                        <p>Traitement standard de dialyse à raison de trois séances hebdomadaires de 4 heures</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-heartbeat"></i>
                        <h4>Hémodialyse d'urgence</h4>
                        <p>Prise en charge des situations urgentes en collaboration avec notre service des urgences</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-user-md"></i>
                        <h4>Suivi néphrologique</h4>
                        <p>Consultations régulières avec nos néphrologues pour adapter votre traitement</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-hand-holding-medical"></i>
                        <h4>Éducation thérapeutique</h4>
                        <p>Accompagnement personnalisé pour mieux vivre avec la maladie rénale</p>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">Fonctionnement de nos séances de dialyse</h2>
                
                <table class="session-table" data-aos="fade-up" data-aos-delay="100">
                    <thead>
                        <tr>
                            <th>Séance</th>
                            <th>Horaire</th>
                            <th>Jours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Séance du matin</td>
                            <td>7h00 - 11h00</td>
                            <td>Samedi au Jeudi</td>
                        </tr>
                        <tr>
                            <td>Séance de l'après-midi</td>
                            <td>12h00 - 16h00</td>
                            <td>Samedi au Jeudi</td>
                        </tr>
                        <tr>
                            <td>Séance du soir</td>
                            <td>17h00 - 21h00</td>
                            <td>Samedi au Jeudi</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="dialysis-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> Déroulement d'une séance d'hémodialyse</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-1"></i> <strong>Accueil et préparation</strong> : Prise des constantes (tension, poids, température)</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-2"></i> <strong>Installation</strong> : Placement confortable dans un lit dédié</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-3"></i> <strong>Branchement</strong> : Connexion au générateur de dialyse via l'abord vasculaire (fistule artério-veineuse ou cathéter)</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-4"></i> <strong>Séance</strong> : Traitement durant environ 4 heures avec surveillance constante</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-5"></i> <strong>Débranchement</strong> : Fin de la séance et compression des points de ponction</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-6"></i> <strong>Surveillance post-dialyse</strong> : Vérification des constantes et autorisation de sortie</li>
                </ol>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Équipements et installations</h2>
                
                <p>Notre service est équipé de technologies modernes pour garantir des traitements sûrs et efficaces :</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> Générateurs d'hémodialyse de dernière génération</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> Système de traitement d'eau par osmose inverse</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> Moniteurs de surveillance des constantes vitales</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> Téléviseur pour rendre les séances plus agréables</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>À savoir sur l'hémodialyse</h3>
                <p>L'hémodialyse est un traitement qui remplace partiellement la fonction des reins défaillants. Elle permet :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>D'éliminer les déchets et l'excès d'eau du sang</li>
                    <li>De maintenir l'équilibre des électrolytes dans le corps</li>
                    <li>De contrôler la tension artérielle</li>
                    <li>D'améliorer la qualité de vie des personnes atteintes d'insuffisance rénale</li>
                </ul>
            </div>

            <section data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">Foire aux questions</h2>
                
                <div class="faq-container">
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-question">Comment se déroule la première consultation ?</div>
                        <div class="faq-answer">
                            <p>Lors de votre première consultation, notre néphrologue réalisera un examen complet, étudiera votre dossier médical et vos résultats d'analyses. Il vous expliquera en détail le traitement par hémodialyse, répondra à toutes vos questions et établira avec vous un plan de soins personnalisé.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="150">
                        <div class="faq-question">Que dois-je apporter à chaque séance de dialyse ?</div>
                        <div class="faq-answer">
                            <p>Pour chaque séance, nous vous recommandons d'apporter :</p>
                            <ul>
                                <li>Votre carte d'identité et votre carte d'assurance maladie</li>
                                <li>La liste actualisée de vos médicaments</li>
                                <li>Un livre, une tablette ou un autre divertissement pour la durée de la séance</li>
                                <li>Une collation légère si nécessaire (en respectant les recommandations diététiques)</li>
                                <li>Un vêtement confortable avec des manches faciles à relever</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question">Quelles sont les restrictions alimentaires à suivre ?</div>
                        <div class="faq-answer">
                            <p>Les patients sous hémodialyse doivent généralement surveiller leur consommation de :</p>
                            <ul>
                                <li>Potassium (limiter les bananes, les pommes de terre, les tomates)</li>
                                <li>Phosphore (limiter les produits laitiers, certaines viandes)</li>
                                <li>Sodium (limiter le sel)</li>
                                <li>Liquides (selon les recommandations personnalisées)</li>
                            </ul>
                            <p>Notre diététicien vous fournira un régime personnalisé adapté à vos besoins spécifiques.</p>
                        </div>
                    </div>
                    
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                        <div class="faq-question">Est-il possible de voyager quand on est sous dialyse ?</div>
                        <div class="faq-answer">
                            <p>Oui, il est tout à fait possible de voyager lorsqu'on est sous dialyse. Notre service peut vous aider à organiser vos séances de dialyse dans votre lieu de destination. Il est important de planifier à l'avance (idéalement 2-3 mois avant) pour s'assurer qu'un centre d'accueil soit disponible. Nous fournirons tous les documents médicaux nécessaires pour garantir la continuité de vos soins.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dialysis-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> Conseils pour nos patients</h3>
                <p>Pour optimiser l'efficacité de votre traitement et améliorer votre qualité de vie :</p>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> Suivez scrupuleusement les recommandations diététiques</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> Prenez vos médicaments comme prescrit</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> Préservez votre abord vasculaire (évitez les prises de sang, la prise de tension et les bijoux serrés sur le bras concerné)</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> Maintenez une activité physique adaptée à votre condition</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-check-circle"></i> N'hésitez pas à parler de vos préoccupations à notre équipe</li>
                </ul>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>Besoin d'informations supplémentaires ?</h3>
                <p>Notre équipe est à votre disposition pour répondre à toutes vos questions concernant notre service d'hémodialyse</p>
                <a href="tel:+21327719197" class="btn btn-info" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-phone-alt"></i> +213 27 71 91 97
                </a>
                <p class="mt-3">Pour prendre rendez-vous avec un néphrologue :</p>
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
        // Script pour le bouton de retour en haut et l'accordéon FAQ
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
                    // Basculer l'état actif de l'item cliqué
                    item.classList.toggle('active');
                });
            });
        });
    </script>

</body>
</html>

<?php include('footer.php'); ?>