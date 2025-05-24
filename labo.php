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
    <title>Service de Laboratoire - <?php echo $hospital_name; ?></title>
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/labo.jpg');
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
            border-left: 4px solid var(--secondary-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Service de laboratoire spécifique */
        .lab-hours {
            background-color: #ebf9f2;
            border-left: 4px solid var(--success-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .lab-hours h3 {
            color: var(--success-color);
            margin-bottom: 15px;
        }

        .lab-hours p {
            margin-bottom: 10px;
        }
        
        .lab-card {
            background-color: #e7f5ff;
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .lab-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--success-color);
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

        /* Table styles for analysis types */
        .analysis-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .analysis-table th,
        .analysis-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .analysis-table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }

        .analysis-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .analysis-table tr:hover {
            background-color: #e9ecef;
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

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background-color: #146c43;
        }

        /* FAQ section */
        .faq-section {
            margin: 40px 0;
        }

        .faq-item {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .faq-question {
            background-color: #f8f9fa;
            padding: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .faq-question:hover {
            background-color: #e9ecef;
        }

        .faq-question::after {
            content: '\f078';
            font-family: 'Font Awesome 5 Free';
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question::after {
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
            <h1 data-aos="fade-down" data-aos-duration="1000">Service de Laboratoire</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Un laboratoire d'analyses médicales moderne et performant au service du diagnostic</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Service de Laboratoire d'Analyses Médicales</h3>
                <p>Le laboratoire d'analyses médicales de l'EPH SOBHA est un service essentiel pour le diagnostic et le suivi des patients. Équipé de technologies de pointe et dirigé par une équipe de biologistes et techniciens hautement qualifiés, notre laboratoire assure la réalisation d'analyses fiables et précises dans les meilleurs délais. Nous mettons un point d'honneur à fournir des résultats de qualité qui contribuent efficacement au parcours de soins des patients.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-flask"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="lab-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Horaires et disponibilité</h3>
                <p><strong>Service d'urgence :</strong> Disponible 24h/24 et 7j/7 pour les analyses urgentes</p>
                <p><strong>Retrait des résultats :</strong> À l'accueil du laboratoire ou en ligne via le dossier électronique du patient (DEM)</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Nos prestations d'analyses</h2>
                <p>Notre laboratoire réalise une large gamme d'analyses médicales pour répondre aux besoins diagnostiques de nos patients :</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-tint"></i>
                        <h4>Hématologie</h4>
                        <p>Numération formule sanguine (FNS), VS, groupes sanguins, hémostase</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-vial"></i>
                        <h4>Biochimie</h4>
                        <p>Glycémie, bilan lipidique, fonction rénale, hépatique, ionogramme</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-viruses"></i>
                        <h4>Immunologie</h4>
                        <p>Sérologies infectieuses, marqueurs tumoraux, auto-immunité</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-bacteria"></i>
                        <h4>Microbiologie</h4>
                        <p>Cultures bactériennes, antibiogrammes, recherche de parasites</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-dna"></i>
                        <h4>Biologie moléculaire</h4>
                        <p>PCR, recherche d'agents pathogènes spécifiques</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-pump-medical"></i>
                        <h4>Hormonologie</h4>
                        <p>Thyroïde, fertilité, cortisol, hormones sexuelles</p>
                    </div>
                </div>
            </section>

            <section class="lab-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> Types d'analyses fréquemment demandées</h3>
                <table class="analysis-table">
                    <thead>
                        <tr>
                            <th>Type d'analyse</th>
                            <th>Description</th>
                            <th>Délai de résultat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-aos="fade-left" data-aos-delay="100">
                            <td>Bilan sanguin standard</td>
                            <td>FNS, glycémie, créatinine, bilan hépatique</td>
                            <td>Le jour même</td>
                        </tr>
                        <tr data-aos="fade-left" data-aos-delay="150">
                            <td>Bilan lipidique</td>
                            <td>Cholestérol total, HDL, LDL, triglycérides</td>
                            <td>24h</td>
                        </tr>
                        <tr data-aos="fade-left" data-aos-delay="200">
                            <td>Hémostase</td>
                            <td>TP, TCA, INR, fibrinogène</td>
                            <td>Le jour même</td>
                        </tr>
                        <tr data-aos="fade-left" data-aos-delay="250">
                            <td>CRP</td>
                            <td>Protéine C-réactive (marqueur d'inflammation)</td>
                            <td>Le jour même</td>
                        </tr>
                        <tr data-aos="fade-left" data-aos-delay="300">
                            <td>Sérologies</td>
                            <td>Hépatites, VIH, Rubéole, Toxoplasmose</td>
                            <td>48-72h</td>
                        </tr>
                        <tr data-aos="fade-left" data-aos-delay="350">
                            <td>ECBU</td>
                            <td>Examen cytobactériologique des urines</td>
                            <td>48h</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Notre équipement</h2>
                
                <p>Notre laboratoire est équipé d'appareils de dernière génération pour garantir des analyses rapides et fiables :</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> Automates d'hématologie multiparamétriques</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> Analyseurs de biochimie à haut débit</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> Systèmes d'immunoanalyse par chimiluminescence</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> Équipement de biologie moléculaire (PCR en temps réel)</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> Microscopes optiques à haute résolution</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> Système informatique de gestion de laboratoire (SIL) pour un suivi optimal des analyses</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>Préparations spécifiques pour certaines analyses</h3>
                <p>Certaines analyses nécessitent une préparation particulière pour garantir des résultats fiables :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>Glycémie à jeun : être à jeun depuis au moins 8 heures</li>
                    <li>Bilan lipidique : être à jeun depuis 12 heures</li>
                    <li>Prélèvements urinaires : suivre les instructions spécifiques fournies par le laboratoire</li>
                    <li>Tests de tolérance au glucose : respecter un régime alimentaire normal dans les jours précédant le test</li>
                    <li>Dosages hormonaux : certains nécessitent des prélèvements à des heures précises</li>
                </ul>
                <p style="margin-top: 10px;">Pour toute question concernant la préparation à une analyse, n'hésitez pas à contacter notre équipe.</p>
            </div>

            <section class="lab-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> Parcours patient au laboratoire</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-1"></i> <strong>Accueil et enregistrement</strong> : Présentation de l'ordonnance et formalités administratives</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-2"></i> <strong>Prélèvement</strong> : Réalisé par un personnel qualifié dans le respect des règles d'hygiène et de confort</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-3"></i> <strong>Analyse</strong> : Traitement des échantillons par notre équipe technique</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-4"></i> <strong>Validation biologique</strong> : Contrôle et interprétation des résultats par un biologiste</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-5"></i> <strong>Remise des résultats</strong> : Sur place ou sur le dossier électronique du patient (DEM)</li>
                </ol>
            </section>

            <section class="faq-section" data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">Questions fréquentes</h2>
                
                <div class="faq-item">
                    <div class="faq-question">Faut-il prendre rendez-vous pour un prélèvement sanguin ?</div>
                    <div class="faq-answer">
                        <p>Non, les prélèvements sanguins sont réalisés sans rendez-vous du dimanche au jeudi de 8h00 à 11h00. Il est toutefois conseillé d'arriver tôt pour éviter les temps d'attente.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Comment obtenir mes résultats d'analyses ?</div>
                    <div class="faq-answer">
                        <p>Vous pouvez récupérer vos résultats directement à l'accueil du laboratoire sur présentation de votre reçu. Ils peuvent également être envoyés directement à votre médecin traitant ou consultables en ligne via la plateforme DEM.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Quel est le délai pour obtenir mes résultats ?</div>
                    <div class="faq-answer">
                        <p>Les délais varient selon le type d'analyse :</p>
                        <ul>
                            <li>Analyses courantes : 24h</li>
                            <li>Analyses spécialisées : 48 à 72h</li>
                            <li>Analyses urgentes : résultats disponibles dans les heures qui suivent</li>
                        </ul>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">Dois-je apporter quelque chose lors de ma venue au laboratoire ?</div>
                    <div class="faq-answer">
                        <p>Pour votre visite au laboratoire, veuillez vous munir de :</p>
                        <ul>
                            <li>Votre ordonnance médicale</li>
                            <li>Votre carte d'identité</li>
                            <li>Votre carte d'assurance maladie</li>
                            <li>Tout document médical pertinent (résultats d'analyses antérieures, carnet de santé, etc.)</li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>Besoin d'informations complémentaires ?</h3>
                <p>Notre équipe est à votre disposition pour répondre à toutes vos questions concernant nos services d'analyses médicales :</p>
                <a href="tel:+21327719197" class="btn btn-success" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-phone-alt"></i> +213 27 71 91 97
                </a>
                <p class="mt-3">Pour toute autre question concernant notre service de laboratoire :</p>
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
        // Scripts pour les fonctionnalités interactives
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