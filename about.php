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
    <title>À Propos - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/1.jpg');
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

        /* Section Styling */
        .section {
            padding: 0px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #2a5a86;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: #4caf50;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
        }

        /* About Section */
        .about-text h2 {
            color: #2a5a86;
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 1.8rem;
            position: relative;
            padding-left: 15px;
        }

        .about-text h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background-color: #4caf50;
            border-radius: 2px;
        }

        .about-text p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            color: #555;
            line-height: 1.8;
        }

        .about-text ul {
            padding-left: 20px;
            margin-bottom: 30px;
        }

        .about-text ul li {
            margin-bottom: 10px;
            position: relative;
            padding-left: 25px;
        }

        .about-text ul li::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: #4caf50;
            position: absolute;
            left: 0;
        }

        /* Timeline */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 50px auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #e0e0e0;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-content {
            padding: 20px 30px;
            background-color: white;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            position: relative;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: white;
            border: 4px solid #4caf50;
            border-radius: 50%;
            top: 15px;
            z-index: 1;
        }

        .timeline-item:nth-child(odd)::after {
            right: -17px;
        }

        .timeline-item:nth-child(even)::after {
            left: -17px;
        }

        /* Facilities Section */
        .bg-light {
            background-color: #f8f9fa;
        }

        .facilities-gallery {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-item p {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            margin: 0;
            padding: 10px;
            text-align: center;
            font-weight: 500;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .team-member {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            text-align: center;
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .member-photo {
            height: 250px;
            overflow: hidden;
        }

        .member-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .team-member:hover .member-photo img {
            transform: scale(1.1);
        }

        .team-member h3 {
            color: #2a5a86;
            margin: 20px 0 5px;
            font-size: 1.3rem;
        }

        .member-position {
            color: #4caf50;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .team-member p {
            padding: 0 20px 20px;
            color: #666;
        }

        /* Call to Action */
        .cta-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('img/4.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin-top: 60px;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .btn-primary {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Values Cards */
        .values-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .value-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .value-card i {
            font-size: 3rem;
            color: #4caf50;
            margin-bottom: 20px;
        }

        .value-card h3 {
            color: #2a5a86;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .value-card p {
            color: #666;
        }

        /* Facility List */
        .facility-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .facility-item {
            display: flex;
            align-items: center;
            background: white;
            padding: 15px 20px;
            border-radius: 6px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .facility-item i {
            font-size: 1.8rem;
            color: #4caf50;
            margin-right: 15px;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .timeline::after {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item:nth-child(even) {
                left: 0;
            }

            .timeline-item:nth-child(odd)::after,
            .timeline-item:nth-child(even)::after {
                left: 18px;
            }
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }

            .page-title p {
                font-size: 1.1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .facilities-gallery {
                grid-template-columns: 1fr;
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

        /* Réinitialisation de base pour assurer la compatibilité mobile */
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
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">À Propos de Nous</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Découvrez notre histoire, notre mission
                et nos valeurs qui font d'EPH SOBHA un établissement hospitalier de référence</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Notre Histoire</h2>
                <p>Une vision au service de la santé communautaire</p>
            </div>
            <div class="about-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <p>L'Établissement Public Hospitalier SOBHA a ouvert ses portes en 1985 avec pour mission de
                    répondre aux besoins médicaux croissants de la population de la région. Depuis, nous avons
                    continuellement amélioré nos installations et élargi nos services pour devenir un
                    établissement de référence en matière de soins de santé.</p>
            </div>

            <!-- Timeline -->
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-right" data-aos-duration="1000">
                    <div class="timeline-content">
                        <h3>1985</h3>
                        <p>Fondation de l'EPH SOBHA pour répondre aux besoins médicaux de la région</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="timeline-content">
                        <h3>2010</h3>
                        <p>Ouverture de l'unité d'hémodialyse</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <div class="timeline-content">
                        <h3>2019</h3>
                        <p>Modernisation du service des urgences medico chirurgicales</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="600">
                    <div class="timeline-content">
                        <h3>2024</h3>
                        <p>Modernisation des services de Maternité et de Médecine interne</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="800">
                    <div class="timeline-content">
                        <h3>2025</h3>
                        <p>Modernisation du Bloc opératoire</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Notre Mission</h2>
                <p>Des soins médicaux accessibles et de qualité pour tous</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="about-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <p>L'Établissement Public Hospitalier SOBHA a pour mission de fournir des soins médicaux de
                            haute qualité et accessibles à tous les citoyens. Notre hôpital est devenu un établissement
                            de référence dans la région grâce à notre engagement envers l'excellence médicale et le
                            bien-être des patients.</p>

                        <h2 data-aos="fade-right" data-aos-duration="800">Nos Valeurs</h2>
                        <p data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">Notre travail quotidien
                            est guidé par des valeurs fondamentales qui placent le patient au centre de nos
                            préoccupations :</p>
                    </div>
                </div>
            </div>

            <!-- Values Cards -->
            <div class="values-container">
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="100">
                    <i class="fas fa-heart"></i>
                    <h3>Respect de la dignité humaine</h3>
                    <p>Traiter chaque patient avec respect et compassion, en tenant compte de ses besoins physiques,
                        émotionnels et spirituels.</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="200">
                    <i class="fas fa-award"></i>
                    <h3>Excellence professionnelle</h3>
                    <p>Maintenir les plus hauts standards de pratique médicale grâce à la formation continue et
                        l'adoption des meilleures pratiques.</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="300">
                    <i class="fas fa-balance-scale"></i>
                    <h3>Équité dans l'accès aux soins</h3>
                    <p>Garantir que tous les patients reçoivent les soins nécessaires indépendamment de leur situation
                        sociale ou économique.</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="400">
                    <i class="fas fa-lightbulb"></i>
                    <h3>Innovation continue</h3>
                    <p>Rechercher constamment l'amélioration de nos pratiques médicales et services pour offrir des
                        soins de pointe.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Nos Installations</h2>
                <p>Un environnement moderne pour des soins optimaux</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text" data-aos="fade-right" data-aos-duration="1000">
                        <p>EPH SOBHA dispose d'équipements médicaux modernes, de 188 lits d'hospitalisation, d'un bloc
                            opératoire, et d'un service d'urgence ouvert 24h/24. Notre établissement s'étend sur une
                            superficie de 15 000 m² et est facilement accessible par les transports en commun.</p>

                        <h3 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">Nos installations
                            principales :</h3>

                        <div class="facility-list">
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                                <i class="fas fa-bed"></i>
                                <span>188 lits d'hospitalisation</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                                <i class="fas fa-building"></i>
                                <span>Bloc opératoire équipé</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                                <i class="fas fa-truck"></i>
                                <span>Service d'urgence 24h/24</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="250">
                                <i class="fas fa-flask"></i>
                                <span>Laboratoire d'analyses médicales</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                                <i class="fas fa-x-ray"></i>
                                <span>Service d'imagerie médicale</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="350">
                                <i class="fas fa-heartbeat"></i>
                                <span>Unité d'hémodialyse</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
                                <i class="fas fa-pills"></i>
                                <span>Pharmacie hospitalière</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="facilities-gallery">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
                            <img src="img/services/bloc.jpg" alt="Bloc opératoire">
                            <p>Bloc opératoire</p>
                        </div>
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <img src="img/services/chambre.jpg" alt="Chambre de patient">
                            <p>Chambre de patient</p>
                        </div>
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                            <img src="img/services/laboratoire.jpg" alt="Laboratoire">
                            <p>Laboratoire</p>
                        </div>
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
                            <img src="img/services/urgence.jpg" alt="Service d'urgence">
                            <p>Service d'urgence</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Notre Équipe Médicale</h2>
                <p>Des professionnels dévoués à votre santé</p>
            </div>
            <div class="team-grid">
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="Dr. Mohammed Benali">
                    </div>
                    <h3>Dr. M'HAMED LOUKIL</h3>
                    <p class="member-position">Médecin Chef de Service de Chirurgie</p>
                    <p>Chirurgien avec plus de 30 ans d'expérience.</p>
                </div>
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="Dr. Amina Hadjri">
                    </div>
                    <h3>Dr. AISSA MOHAMED SBAA</h3>
                    <p class="member-position">Médecin Chef de Service de Pédiatrie</p>
                    <p>Pédiatre avec plus de 30 ans d'expérience.</p>
                </div>
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="Dr. Karim Mesbah">
                    </div>
                    <h3>Dr. LAZREG BELKACEM</h3>
                    <p class="member-position">Médecin Chef de Service de Médecine Interne</p>
                    <p>Médecin  généraliste en chef avec plus de 30 ans d'expérience.</p>
                </div>
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="Dr. Leila Bouzid">
                    </div>
                    <h3>Dr. KAMEL DJELLOULI</h3>
                    <p class="member-position">Médecin Chef de Service de Laboratoire</p>
                    <p>Praticien spécialiste principal en Biochimie.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <h2 data-aos="fade-down" data-aos-duration="1000">Prenez rendez-vous avec nos spécialistes</h2>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Notre équipe médicale est prête à vous
                offrir les meilleurs soins pour votre santé.</p>
            <a href="contact.php" class="btn btn-primary" data-aos="zoom-in" data-aos-duration="800"
                data-aos-delay="400">Contactez-nous <i class="fas fa-arrow-right"></i></a>
        </div>
    </section>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de AOS
        AOS.init({
            once: false,
            mirror: false,        // Animation se produit une seule fois
            offset: 120,        // Décalage (en px) depuis le point de déclenchement original
            easing: 'ease-out-back' // Type d'effet d'animation
        });
    </script>
</body>

</html>

<?php include('footer.php'); ?>