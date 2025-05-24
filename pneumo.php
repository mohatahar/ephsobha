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
    <title>Service de Pneumologie-Phthisiologie - <?php echo $hospital_name; ?></title>
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/pneumologie.jpg');
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
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Service de pneumologie spécifique */
        .department-hours {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .department-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .department-hours p {
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

        /* Pathologies fréquentes */
        .pathologies-section {
            margin: 30px 0;
        }

        .pathologies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .pathology-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .pathology-card h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 10px;
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

        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #3bb0cc;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list, .pathologies-grid, .team-grid {
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
        
        /* FAQ Section */
        .faq-section {
            margin: 40px 0;
        }
        
        .faq-item {
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .faq-question {
            background-color: #f8f9fa;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .faq-question h4 {
            margin: 0;
            font-weight: 600;
            color: var(--primary-color);
        }
        
        .faq-question i {
            transition: transform 0.3s ease;
        }
        
        .faq-answer {
            background-color: white;
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }
        
        .faq-item.active .faq-question {
            background-color: var(--primary-color);
        }
        
        .faq-item.active .faq-question h4 {
            color: white;
        }
        
        .faq-item.active .faq-question i {
            transform: rotate(180deg);
            color: white;
        }
        
        .faq-item.active .faq-answer {
            padding: 20px;
            max-height: 1000px;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Pneumologie-Phthisiologie</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Des soins spécialisés pour les affections respiratoires et pulmonaires à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Service de Pneumologie-Phthisiologie</h3>
                <p>Le service de Pneumologie-Phthisiologie de l'EPH SOBHA est spécialisé dans le diagnostic, le traitement et le suivi des pathologies respiratoires et pulmonaires, y compris la tuberculose. Notre équipe médicale qualifiée offre une prise en charge complète et personnalisée à chaque patient. Notre mission est d'améliorer la qualité de vie des patients souffrant de maladies respiratoires chroniques et aiguës.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-lungs"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="department-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Horaires et consultations</h3>
                <p><strong>Hospitalisations :</strong> Service ouvert 24h/24 et 7j/7 pour les patients hospitalisés</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Nos services spécialisés</h2>
                <p>Le service de Pneumologie-Phthisiologie de l'EPH SOBHA offre une large gamme de prestations pour le diagnostic et le traitement des maladies respiratoires :</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-stethoscope"></i>
                        <h4>Consultations spécialisées</h4>
                        <p>Diagnostic et suivi des affections respiratoires aiguës et chroniques</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-procedures"></i>
                        <h4>Hospitalisation</h4>
                        <p>Prise en charge des patients nécessitant une surveillance ou des soins continus</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-microscope"></i>
                        <h4>Phthisiologie</h4>
                        <p>Diagnostic et traitement spécialisé de la tuberculose et suivi des patients</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-wind"></i>
                        <h4>Explorations fonctionnelles</h4>
                        <p>Spirométrie, pléthysmographie, test de diffusion, test d'effort...</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-bed"></i>
                        <h4>Polysomnographie</h4>
                        <p>Étude du sommeil et diagnostic des troubles respiratoires nocturnes</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-lungs-virus"></i>
                        <h4>Endoscopie bronchique</h4>
                        <p>Fibroscopie pour l'exploration visuelle de l'arbre bronchique et prélèvements ciblés</p>
                    </div>
                </div>
            </section>

            <section class="pathologies-section" data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Pathologies prises en charge</h2>
                
                <div class="pathologies-grid">
                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="100">
                        <h4><i class="fas fa-virus"></i> Maladies infectieuses</h4>
                        <ul>
                            <li>Tuberculose pulmonaire et extra-pulmonaire</li>
                            <li>Pneumopathies bactériennes et virales</li>
                            <li>Infections respiratoires chroniques</li>
                            <li>Pleurésies infectieuses</li>
                        </ul>
                    </div>
                    
                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="150">
                        <h4><i class="fas fa-wind"></i> Pathologies obstructives</h4>
                        <ul>
                            <li>Asthme bronchique</li>
                            <li>Bronchopneumopathie chronique obstructive (BPCO)</li>
                            <li>Dilatation des bronches (DDB)</li>
                            <li>Emphysème pulmonaire</li>
                        </ul>
                    </div>
                    
                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="250">
                        <h4><i class="fas fa-lungs"></i> Maladies interstitielles</h4>
                        <ul>
                            <li>Fibroses pulmonaires</li>
                            <li>Sarcoïdose</li>
                            <li>Pathologies pulmonaires des connectivites</li>
                            <li>Pneumopathies médicamenteuses</li>
                        </ul>
                    </div>
                    
                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="300">
                        <h4><i class="fas fa-bed"></i> Troubles respiratoires du sommeil</h4>
                        <ul>
                            <li>Syndrome d'apnées du sommeil</li>
                            <li>Hypoventilation nocturne</li>
                            <li>Hypersomnies</li>
                        </ul>
                    </div>
                    
                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="350">
                        <h4><i class="fas fa-heart"></i> Pathologies cardio-respiratoires</h4>
                        <ul>
                            <li>Hypertension artérielle pulmonaire</li>
                            <li>Embolie pulmonaire</li>
                            <li>Insuffisance cardiaque droite</li>
                            <li>Cœur pulmonaire chronique</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="service-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> Équipements et examens disponibles</h3>
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> <strong>Explorations fonctionnelles respiratoires :</strong> Mesure précise de la fonction pulmonaire</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> <strong>Fibroscopie bronchique :</strong> Visualisation de l'intérieur des bronches et prélèvements</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> <strong>Gaz du sang :</strong> Évaluation de l'oxygénation et des équilibres acido-basiques</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> <strong>Test de marche de 6 minutes :</strong> Évaluation de la capacité à l'effort</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> <strong>Polysomnographie :</strong> Étude complète du sommeil</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> <strong>Oxygénothérapie :</strong> Traitement par oxygène pour les patients insuffisants respiratoires</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>Quand consulter un pneumologue ?</h3>
                <p>Il est recommandé de consulter un pneumologue dans les situations suivantes :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>Toux persistante depuis plus de 3 semaines</li>
                    <li>Essoufflement inexpliqué à l'effort ou au repos</li>
                    <li>Douleurs thoraciques récurrentes</li>
                    <li>Expectorations anormales (sang, couleur inhabituelle)</li>
                    <li>Infections respiratoires à répétition</li>
                    <li>Ronflements importants et apnées du sommeil suspectées</li>
                    <li>Suivi de maladies respiratoires chroniques (asthme, BPCO)</li>
                </ul>
            </div>

            <section class="faq-section" data-aos="fade-up" data-aos-delay="450">
                <h2 class="section-title">Questions fréquentes</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Comment se préparer à une exploration fonctionnelle respiratoire ?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Pour une exploration fonctionnelle respiratoire (EFR), il est recommandé de :</p>
                        <ul>
                            <li>Éviter de fumer au moins 24h avant l'examen</li>
                            <li>Éviter les repas copieux avant le test</li>
                            <li>Porter des vêtements confortables et non serrés</li>
                            <li>Signaler au médecin les médicaments bronchodilatateurs que vous prenez</li>
                        </ul>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Quelle est la différence entre la pneumologie et la phthisiologie ?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>La pneumologie est la spécialité médicale qui s'occupe de l'ensemble des maladies respiratoires. La phthisiologie est une sous-spécialité de la pneumologie qui se consacre spécifiquement à l'étude, au diagnostic et au traitement de la tuberculose pulmonaire et extra-pulmonaire. Dans notre service, nous combinons ces deux expertises pour offrir une prise en charge complète.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Combien de temps dure une hospitalisation en pneumologie ?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>La durée d'hospitalisation varie considérablement selon la pathologie et l'état du patient. Pour une pneumopathie aiguë simple, l'hospitalisation peut durer de 3 à 7 jours. Pour des pathologies plus complexes comme une décompensation de BPCO, une tuberculose ou un bilan exhaustif, l'hospitalisation peut s'étendre de 1 à 3 semaines. Le médecin vous informera de la durée estimée lors de votre admission.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>Comment se déroule un examen de fibroscopie bronchique ?</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>La fibroscopie bronchique est un examen qui permet de visualiser l'intérieur des bronches à l'aide d'un tube flexible muni d'une caméra. Voici son déroulement :</p>
                        <ol>
                            <li>Vous serez à jeun depuis au moins 6 heures</li>
                            <li>Une anesthésie locale de la gorge et du nez sera réalisée</li>
                            <li>Un sédatif léger pourra être administré pour vous détendre</li>
                            <li>Le médecin introduira délicatement l'endoscope par le nez ou la bouche</li>
                            <li>L'examen dure généralement entre 15 et 30 minutes</li>
                            <li>Des prélèvements (biopsies, lavage broncho-alvéolaire) peuvent être effectués si nécessaire</li>
                        </ol>
                        <p>Après l'examen, vous resterez sous surveillance pendant environ 1 à 2 heures. Il est recommandé de ne pas manger ni boire pendant quelques heures jusqu'à disparition complète de l'anesthésie locale.</p>
                    </div>
                </div>
            </section>

            <section class="service-card" data-aos="fade-up" data-aos-delay="350">
                <h3><i class="fas fa-info-circle"></i> Conseils pour les patients atteints de maladies respiratoires</h3>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> Suivez scrupuleusement votre traitement tel que prescrit par votre médecin</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> Arrêtez de fumer et évitez les environnements enfumés</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> Maintenez une activité physique régulière adaptée à votre condition</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> Adoptez une alimentation équilibrée riche en fruits et légumes</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-check-circle"></i> Surveillez la qualité de l'air intérieur de votre domicile</li>
                    <li data-aos="zoom-in" data-aos-delay="350"><i class="fas fa-check-circle"></i> Pratiquez régulièrement les exercices respiratoires recommandés</li>
                    <li data-aos="zoom-in" data-aos-delay="400"><i class="fas fa-check-circle"></i> Faites-vous vacciner contre la grippe et le pneumocoque</li>
                </ul>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>Besoin d'une consultation en pneumologie ?</h3>
                <p>Pour prendre rendez-vous ou pour toute information sur notre service de Pneumologie-Phthisiologie :</p>
                <a href="tel:+21327719197" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-phone-alt"></i> +213 27 71 91 97
                </a>
                <p class="mt-3">Pour toute autre question concernant notre service :</p>
                <a href="index.php#contact" class="btn btn-secondary" data-aos="fade-up" data-aos-delay="250">Contactez-nous</a>
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