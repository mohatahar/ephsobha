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
    <title>Service de Médecine Interne - <?php echo $hospital_name; ?></title>
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/med-interne.jpg');
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

        /* Service spécifique */
        .service-hours {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .service-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-hours p {
            margin-bottom: 10px;
        }

        .service-card {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .service-card h3 {
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

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }

            .service-list,
            .team-grid {
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
            <h1 data-aos="fade-down" data-aos-duration="1000">Service de Médecine Interne</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Diagnostic et traitement des pathologies
                complexes à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Service de Médecine Interne</h3>
                <p>Le service de Médecine Interne de l'EPH SOBHA est un département pluridisciplinaire dédié au
                    diagnostic et au traitement de pathologies complexes et multisystémiques. Notre équipe de médecins
                    internistes qualifiés offre une approche globale et intégrée de la santé, prenant en compte
                    l'ensemble des aspects médicaux du patient pour établir un diagnostic précis et proposer une prise
                    en charge personnalisée.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-heartbeat"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="service-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Horaires et disponibilité</h3>
                <p><strong>Hospitalisations :</strong> Service ouvert 24h/24 et 7j/7 pour les patients hospitalisés</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Nos spécialités en Médecine Interne</h2>
                <p>Le service de Médecine Interne de l'EPH SOBHA prend en charge une grande variété de pathologies :</p>

                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-lungs"></i>
                        <h4>Maladies respiratoires</h4>
                        <p>Asthme, BPCO, pneumopathies, infections respiratoires chroniques</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-heart"></i>
                        <h4>Pathologies cardiovasculaires</h4>
                        <p>Hypertension artérielle, insuffisance cardiaque, athérosclérose</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-brain"></i>
                        <h4>Maladies neurologiques</h4>
                        <p>Céphalées chroniques, neuropathies, troubles neurodégénératifs</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-tint"></i>
                        <h4>Maladies auto-immunes</h4>
                        <p>Lupus, polyarthrite rhumatoïde, sclérodermie, maladies inflammatoires</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-disease"></i>
                        <h4>Endocrinologie</h4>
                        <p>Diabète, troubles thyroïdiens, pathologies surrénaliennes</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-diagnoses"></i>
                        <h4>Diagnostics complexes</h4>
                        <p>Fièvres d'origine indéterminée, symptômes multisystémiques</p>
                    </div>
                </div>
            </section>

            <section class="service-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> Notre approche de soins</h3>
                <p>La médecine interne se distingue par son approche holistique du patient. Nos médecins internistes
                    sont formés pour :</p>
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> <strong>Établir un
                            diagnostic global</strong> en intégrant tous les symptômes et résultats d'examens</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> <strong>Coordonner
                            les soins</strong> entre différentes spécialités médicales</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> <strong>Suivre les
                            pathologies chroniques</strong> avec une vision complète du patient</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i>
                        <strong>Personnaliser les traitements</strong> en fonction du profil spécifique de chaque
                        patient</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> <strong>Prévenir
                            les complications</strong> liées aux multiples pathologies</li>
                </ul>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Équipements et technologies</h2>

                <p>Notre service de Médecine Interne dispose d'équipements modernes pour assurer un diagnostic précis et
                    une prise en charge optimale :</p>

                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> Échocardiographie
                        et échographie abdominale au lit du patient</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> Équipement pour
                        épreuves fonctionnelles respiratoires</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> Accès rapide aux
                        services d'imagerie médicale</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> Laboratoire
                        d'analyses médicales</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> Monitoring continu
                        des patients présentant des pathologies instables</li>
                </ul>
            </section>

            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>Quand consulter en Médecine Interne ?</h3>
                <p>La consultation en médecine interne est particulièrement indiquée dans les cas suivants :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>Symptômes multiples et inexpliqués</li>
                    <li>Maladies chroniques complexes ou multiples pathologies</li>
                    <li>Fièvre prolongée sans cause évidente</li>
                    <li>Suspicion de maladie auto-immune ou inflammatoire</li>
                    <li>Suivi de pathologies multiples nécessitant une coordination des soins</li>
                    <li>Difficultés diagnostiques après consultations spécialisées</li>
                </ul>
            </div>

            <section class="service-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> Parcours patient en Médecine Interne</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-1"></i> <strong>Consultation
                            initiale</strong> : Anamnèse complète et examen clinique approfondi</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-2"></i> <strong>Examens
                            complémentaires</strong> : Analyses biologiques, imagerie médicale selon les besoins</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-3"></i> <strong>Synthèse
                            diagnostique</strong> : Interprétation globale des résultats</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-4"></i> <strong>Plan de
                            traitement</strong> : Proposition thérapeutique personnalisée</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-5"></i> <strong>Suivi
                            régulier</strong> : Adaptation du traitement selon l'évolution</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-6"></i> <strong>Coordination des
                            soins</strong> : Liaison avec d'autres spécialistes si nécessaire</li>
                </ol>
            </section>

            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>Besoin d'une consultation en Médecine Interne ?</h3>
                <p>Pour prendre rendez-vous ou obtenir plus d'informations sur notre service :</p>
                <a href="tel:+21327719197" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-phone-alt"></i> +213 27 71 91 97
                </a>
                <p class="mt-3">Pour toute autre question :</p>
                <a href="index.php#contact" class="btn btn-primary" data-aos="fade-up"
                    data-aos-delay="250">Contactez-nous</a>
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
</body>

</html>

<?php include('footer.php'); ?>