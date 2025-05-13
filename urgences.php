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
    <title>Service des Urgences - <?php echo $hospital_name; ?></title>
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/umc.jpg');
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

        /* Service des urgences spécifique */
        .emergency-hours {
            background-color: #ffecec;
            border-left: 4px solid var(--danger-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .emergency-hours h3 {
            color: var(--danger-color);
            margin-bottom: 15px;
        }

        .emergency-hours p {
            margin-bottom: 10px;
        }
        
        .emergency-card {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .emergency-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--danger-color);
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
            
            .service-list {
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
            <h1 data-aos="fade-down" data-aos-duration="1000">Service des Urgences</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Des soins d'urgence de qualité disponibles 24h/24 et 7j/7 à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Service des Urgences</h3>
                <p>Le service des urgences de l'EPH SOBHA assure la prise en charge immédiate des patients nécessitant des soins urgents. Notre équipe médicale et paramédicale hautement qualifiée est disponible 24h/24 et 7j/7 pour répondre à toutes les situations d'urgence avec rapidité, efficacité et professionnalisme. Notre mission est de fournir des soins de qualité dans les meilleurs délais pour les patients en situation d'urgence.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-ambulance"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="emergency-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Disponibilité</h3>
                <p><strong>Horaires :</strong> Notre service des urgences est ouvert 24h/24 et 7j/7, y compris les jours fériés.</p>
                <p><strong>Équipe médicale :</strong> Une équipe complète composée de médecins urgentistes, d'infirmiers spécialisés et d'aides-soignants est présente en permanence pour assurer une prise en charge optimale.</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Nos services d'urgence</h2>
                <p>Le service des urgences de l'EPH SOBHA offre une large gamme de soins pour répondre à toutes les situations d'urgence :</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-heartbeat"></i>
                        <h4>Urgences médicales</h4>
                        <p>Prise en charge des pathologies médicales aiguës (douleurs thoraciques, détresses respiratoires, etc.)</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-bone"></i>
                        <h4>Urgences traumatologiques</h4>
                        <p>Traitement des traumatismes, fractures, entorses et autres lésions traumatiques</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-stethoscope"></i>
                        <h4>Examens complémentaires</h4>
                        <p>Radiologie, échographie, analyses biologiques disponibles en urgence</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-user-md"></i>
                        <h4>Consultations spécialisées</h4>
                        <p>Accès rapide aux spécialistes de garde selon les besoins</p>
                    </div>
                </div>
            </section>

            <section class="emergency-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> Parcours patient aux urgences</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-1"></i> <strong>Accueil et enregistrement</strong> : Prise en charge administrative rapide</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-2"></i> <strong>Triage</strong> : Évaluation de la gravité par un médecin de tri pour déterminer la priorité de prise en charge</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-3"></i> <strong>Consultation médicale</strong> : Examen par un médecin urgentiste</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-4"></i> <strong>Examens complémentaires</strong> : Si nécessaires (analyses, radiologie, etc.)</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-5"></i> <strong>Soins et traitement</strong> : Administration des soins adaptés</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-6"></i> <strong>Orientation</strong> : Retour à domicile, hospitalisation ou transfert selon l'état du patient</li>
                </ol>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Équipements et infrastructures</h2>
                
                <p>Notre service des urgences est équipé de matériel médical de pointe pour assurer une prise en charge optimale des patients :</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> Salle de déchocage pour les urgences vitales</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> Box de consultation individuels pour respecter l'intimité des patients</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> Salle de soins et de petite chirurgie</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> Équipement de monitoring cardiaque et respiratoire</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> Accès direct aux services d'imagerie et au laboratoire d'analyses</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> Unité d'observation de courte durée (UOCD) pour surveiller l'évolution des patients</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>Quand se rendre aux urgences ?</h3>
                <p>Les services d'urgence sont conçus pour traiter les conditions médicales graves qui menacent la vie ou les membres. Voici quelques situations qui justifient une visite aux urgences :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>Difficultés respiratoires sévères</li>
                    <li>Douleur thoracique intense</li>
                    <li>Trauma crânien avec perte de conscience</li>
                    <li>Fractures ouvertes ou déformations évidentes</li>
                    <li>Saignements abondants incontrôlables</li>
                    <li>Brûlures étendues ou profondes</li>
                    <li>Symptômes d'AVC (paralysie faciale, faiblesse d'un membre, troubles de la parole)</li>
                </ul>
            </div>

            <section class="emergency-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> Conseils pratiques</h3>
                <p>Pour faciliter votre prise en charge aux urgences :</p>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> Apportez votre carte d'identité et votre carte d'assurance maladie</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> Munissez-vous de la liste de vos médicaments habituels</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> Signalez toute allergie connue</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> Si possible, venez accompagné d'un proche</li>
                </ul>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>Urgence médicale ?</h3>
                <p>En cas d'urgence vitale, appelez immédiatement le numéro ci-dessous :</p>
                <a href="tel:+21327719197" class="btn btn-danger" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-phone-alt"></i> +213 27 71 91 97
                </a>
                <p class="mt-3">Pour toute autre question concernant notre service des urgences :</p>
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