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
    <title>Service de Pédiatrie - <?php echo $hospital_name; ?></title>
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
            --pediatric-color: #FF9AA2; /* Couleur spécifique pour la pédiatrie */
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
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/services/pediatrie.jpg');
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
            background-color: #e6f7ff;
            border-left: 4px solid var(--pediatric-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: #0066cc;
            margin-bottom: 10px;
        }

        /* Spécifique à la pédiatrie */
        .pediatric-hours {
            background-color: #fff0f5;
            border-left: 4px solid var(--pediatric-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .pediatric-hours h3 {
            color: #e83e8c;
            margin-bottom: 15px;
        }

        .pediatric-hours p {
            margin-bottom: 10px;
        }
        
        .pediatric-card {
            background-color: #f0f9ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .pediatric-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--pediatric-color);
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

        .btn-pediatric {
            background-color: var(--pediatric-color);
            color: white;
        }

        .btn-pediatric:hover {
            background-color: #ff7c86;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list, .team-grid {
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

        /* FAQ Styles */
        .faq-container {
            margin: 40px 0;
        }

        .faq-item {
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background-color: #f0f9ff;
            padding: 15px 20px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question:hover {
            background-color: #e1f5fe;
        }

        .faq-answer {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding 0.3s ease;
            background-color: #fff;
        }

        .faq-answer-content {
            padding: 20px;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 20px;
        }

        .faq-item i {
            transition: transform 0.3s;
        }

        .faq-item.active i {
            transform: rotate(180deg);
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
            <h1 data-aos="fade-down" data-aos-duration="1000">Service de Pédiatrie</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Des soins spécialisés et attentionnés pour les enfants à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Service de Pédiatrie</h3>
                <p>Le service de pédiatrie de l'EPH SOBHA est dédié à la santé et au bien-être des nourrissons, des enfants et des adolescents jusqu'à 16 ans. Notre équipe multidisciplinaire de pédiatres et personnel soignant spécialisé offre des soins complets et personnalisés dans un environnement chaleureux et adapté aux besoins spécifiques des jeunes patients. Notre mission est d'assurer des soins de qualité tout en maintenant un environnement rassurant pour les enfants et leurs familles.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-baby"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="pediatric-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Consultations et Visites</h3>
                <p><strong>Hospitalisations :</strong> Service ouvert 24h/24 et 7j/7 pour les enfants nécessitant une surveillance médicale</p>
                <p><strong>Visites aux patients hospitalisés :</strong> Tous les jours de 13h30 à 15h00 (un parent peut rester auprès de l'enfant en dehors des heures de visite)</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Nos services pédiatriques</h2>
                <p>Le service de pédiatrie de l'EPH SOBHA offre une gamme complète de soins médicaux pour les enfants :</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-stethoscope"></i>
                        <h4>Pédiatrie générale</h4>
                        <p>Soins médicaux préventifs et curatifs pour toutes les pathologies infantiles courantes</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-lungs"></i>
                        <h4>Pneumo-pédiatrie</h4>
                        <p>Prise en charge des maladies respiratoires infantiles (asthme, bronchiolite, etc.)</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-heartbeat"></i>
                        <h4>Cardio-pédiatrie</h4>
                        <p>Diagnostic et suivi des cardiopathies congénitales et acquises</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-weight"></i>
                        <h4>Suivi de croissance</h4>
                        <p>Surveillance de la croissance et du développement des enfants</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-syringe"></i>
                        <h4>Vaccinations</h4>
                        <p>Administration et suivi du calendrier vaccinal</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-utensils"></i>
                        <h4>Nutrition pédiatrique</h4>
                        <p>Conseils nutritionnels adaptés à chaque âge</p>
                    </div>
                </div>
            </section>

            <section class="pediatric-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-hospital-user"></i> Notre approche de soins</h3>
                <p>À l'EPH SOBHA, nous adoptons une approche holistique des soins pédiatriques :</p>
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> <strong>Soins centrés sur la famille</strong> : Les parents sont impliqués dans toutes les décisions concernant la santé de leur enfant</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> <strong>Environnement adapté aux enfants</strong> : Espaces colorés et ludiques pour réduire l'anxiété</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> <strong>Équipe pluridisciplinaire</strong> : Collaboration entre pédiatres, infirmiers pédiatriques, psychologues et autres spécialistes</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> <strong>Éducation thérapeutique</strong> : Formation des parents et des enfants à la gestion des maladies chroniques</li>
                </ul>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Équipements et infrastructures</h2>
                
                <p>Notre service de pédiatrie dispose d'équipements adaptés aux besoins spécifiques des enfants :</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> Chambres d'hospitalisation adaptées aux différents âges</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> Équipements de monitoring pédiatrique</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> Matériel de réanimation néonatale et pédiatrique</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> Unité de surveillance continue pour les cas nécessitant une vigilance accrue</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>Quand consulter en pédiatrie ?</h3>
                <p>Certains signes devraient vous inciter à consulter rapidement un pédiatre :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>Fièvre élevée ou persistante (>38,5°C)</li>
                    <li>Déshydratation (peu d'urine, bouche sèche, absence de larmes)</li>
                    <li>Difficultés respiratoires</li>
                    <li>Changements importants dans le comportement de l'enfant</li>
                    <li>Douleurs abdominales intenses ou persistantes</li>
                    <li>Éruptions cutanées importantes</li>
                    <li>Refus de boire ou de manger pendant plus de 24 heures</li>
                </ul>
            </div>

            <!-- FAQ Section -->
            <section class="faq-container" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title">Questions fréquentes</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Comment préparer mon enfant à une hospitalisation ? <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Pour préparer votre enfant à une hospitalisation :</p>
                            <ul>
                                <li>Expliquez-lui simplement pourquoi il doit aller à l'hôpital</li>
                                <li>Apportez son jouet ou doudou préféré</li>
                                <li>Prévoyez des vêtements confortables</li>
                                <li>Restez calme et rassurant</li>
                                <li>N'hésitez pas à poser toutes vos questions au personnel soignant</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Puis-je rester avec mon enfant pendant son hospitalisation ? <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Oui, un parent peut rester auprès de l'enfant 24h/24. Cette présence est importante pour le bien-être et la récupération de votre enfant.</p>
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Comment se déroule une consultation pédiatrique ? <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Une consultation pédiatrique typique comprend :</p>
                            <ol>
                                <li>Un entretien avec les parents sur l'histoire médicale et les préoccupations actuelles</li>
                                <li>Un examen physique complet de l'enfant</li>
                                <li>La vérification des paramètres de croissance (poids, taille, périmètre crânien)</li>
                                <li>Une discussion sur le développement psychomoteur</li>
                                <li>Des recommandations et, si nécessaire, une prescription de traitements ou d'examens complémentaires</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        Quels documents dois-je apporter lors d'une consultation ? <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>Pour une consultation pédiatrique, veuillez apporter :</p>
                            <ul>
                                <li>Le carnet de santé de l'enfant</li>
                                <li>La carte d'identité ou l'acte de naissance</li>
                                <li>Les documents d'assurance maladie</li>
                                <li>Les résultats des examens médicaux antérieurs</li>
                                <li>La liste des médicaments que prend actuellement votre enfant</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pediatric-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> Conseils de prévention</h3>
                <p>Pour maintenir votre enfant en bonne santé :</p>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> Respectez le calendrier vaccinal</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> Veillez à une alimentation équilibrée et adaptée à son âge</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> Assurez-vous qu'il dorme suffisamment</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> Encouragez l'activité physique régulière</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-check-circle"></i> Limitez le temps d'écran</li>
                </ul>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>Prendre rendez-vous</h3>
                <p>Pour prendre rendez-vous avec l'un de nos pédiatres ou pour plus d'informations :</p>
                <a href="tel:+21327719197" class="btn btn-pediatric" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-phone-alt"></i> +213 27 71 91 97
                </a>
                <p class="mt-3">Pour toute autre question concernant notre service de pédiatrie :</p>
                <a href="index.php#contact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="250">Contactez-nous</a>
            </div>
        </div>
    </div>
    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    
    <!-- jQuery (pour simplifier les interactions) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
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

            // Ajout d'un écouteur d'événement pour le défilement
            window.addEventListener('scroll', toggleBackToTopButton);

            // Ajout d'un effet de défilement fluide lors du clic sur le bouton
            backToTopButton.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Script pour l'accordéon FAQ
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    // Toggle la classe active sur l'élément parent
                    const faqItem = this.parentElement;
                    faqItem.classList.toggle('active');
                });
            });
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
</body>
</html>

<?php include('footer.php'); ?>