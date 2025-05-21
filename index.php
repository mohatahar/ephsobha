<?php
include('header.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js"></script>
    <style>
        .stats-section {
            background-color: #f9f9f9;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            z-index: 0;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-bottom: 4px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-bottom: 4px solid #007bff;
        }

        .stat-icon {
            font-size: 36px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
            line-height: 1;
        }

        .stat-title {
            font-size: 18px;
            font-weight: 600;
            color: #007bff;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .stat-card {
                padding: 20px;
            }

            .stat-number {
                font-size: 36px;
            }

            .stat-title {
                font-size: 16px;
            }
        }

        /* Animation de surbrillance pour les titres de section */
        @keyframes highlightText {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .highlight-animation .section-title h2 {
            background: linear-gradient(90deg, #007bff, #00c6ff, #0072ff);
            background-size: 200% auto;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: highlightText 5s ease infinite;
            display: inline-block;
        }

        /* Style pour la révélation des éléments */
        .reveal-content {
            transition: all 0.8s ease;
        }

        /* Grille de services moderne */
        .modern-services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .modern-service-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .modern-service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0, 123, 255, 0.15);
        }

        .service-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s;
        }

        .modern-service-card:hover .service-image img {
            transform: scale(1.1);
        }

        .service-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 123, 255, 0.1) 0%, rgba(0, 49, 102, 0.7) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.7;
            transition: opacity 0.4s ease;
        }

        .modern-service-card:hover .service-overlay {
            opacity: 1;
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .modern-service-card:hover .service-icon {
            transform: translateY(0);
            opacity: 1;
        }

        .service-icon i {
            font-size: 28px;
            color: #007bff;
        }

        .service-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-content h3 {
            color: #333;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 15px;
        }

        .service-content h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #007bff;
            transition: width 0.3s ease;
        }

        .modern-service-card:hover .service-content h3::after {
            width: 100px;
        }

        .service-content p {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .service-btn {
            display: inline-flex;
            align-items: center;
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: auto;
            font-size: 15px;
        }

        .service-btn i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .service-btn:hover {
            color: #0056b3;
        }

        .service-btn:hover i {
            transform: translateX(5px);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .modern-services-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .modern-services-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .service-image {
                height: 180px;
            }

            .service-content {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .modern-services-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .service-image {
                height: 200px;
            }
        }

        /* Style moderne pour la section À Propos */
        .modern-about-container {
            display: grid;
            grid-template-columns: 5fr 6fr;
            gap: 50px;
            margin-top: 50px;
        }

        /* Section images */
        .about-image-container {
            position: relative;
            height: 520px;
        }

        .about-image {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .main-image {
            height: 400px;
            width: 100%;
        }

        .main-about-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .about-image:hover .main-about-img {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 123, 255, 0.1), rgba(0, 49, 102, 0.3));
            transition: all 0.3s ease;
        }

        .about-image:hover .image-overlay {
            background: linear-gradient(to bottom, rgba(0, 123, 255, 0.05), rgba(0, 49, 102, 0.15));
        }

        .experience-badge {
            position: absolute;
            right: -20px;
            top: 40px;
            width: 120px;
            height: 120px;
            background: #007bff;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.3);
            z-index: 10;
            animation: pulse 2.5s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(0, 123, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
            }
        }

        .experience-badge .years {
            font-size: 36px;
            font-weight: 700;
            line-height: 1;
        }

        .experience-badge .text {
            font-size: 12px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
            margin-top: 5px;
        }

        .floating-image {
            position: absolute;
            width: 170px;
            height: 170px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.5s ease;
        }

        .floating-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .floating-image:hover {
            transform: translateY(-10px);
        }

        .floating-image:hover img {
            transform: scale(1.1);
        }

        .floating-1 {
            bottom: 0;
            left: 30px;
        }

        .floating-2 {
            bottom: 90px;
            right: 10px;
        }

        /* Contenu À Propos */
        .about-content {
            display: flex;
            flex-direction: column;
        }

        .about-tag {
            display: inline-block;
            background: rgba(0, 123, 255, 0.1);
            color: #007bff;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .about-heading {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
            line-height: 1.3;
            position: relative;
            padding-bottom: 15px;
        }

        .about-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 70px;
            height: 3px;
            background: #007bff;
        }

        .about-description p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 25px;
            font-size: 16px;
        }

        /* Caractéristiques */
        .about-features {
            margin: 30px 0;
        }

        .feature-item {
            display: flex;
            margin-bottom: 25px;
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(10px);
        }

        .feature-icon {
            min-width: 50px;
            height: 50px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #007bff;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .feature-item:hover .feature-icon {
            background: #007bff;
            color: white;
        }

        .feature-content h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .feature-content p {
            font-size: 15px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Statistiques */
        .about-stats {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
            padding: 25px 0;
            border-top: 1px solid rgba(0, 0, 0, 0.07);
            border-bottom: 1px solid rgba(0, 0, 0, 0.07);
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-value i {
            font-size: 22px;
            color: #007bff;
            margin-left: 8px;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* CTA bouton */
        .about-cta {
            display: inline-flex;
            align-items: center;
            background: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            margin-top: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            align-self: start;
        }

        .about-cta i {
            margin-left: 10px;
            transition: transform 0.3s ease;
        }

        .about-cta:hover {
            background: #0056b3;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.4);
        }

        .about-cta:hover i {
            transform: translateX(5px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .modern-about-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-image-container {
                height: 450px;
            }

            .floating-1 {
                left: 50px;
            }

            .floating-2 {
                right: 50px;
            }
        }

        @media (max-width: 768px) {
            .about-image-container {
                height: 400px;
            }

            .main-image {
                height: 300px;
            }

            .floating-image {
                width: 140px;
                height: 140px;
            }

            .floating-1 {
                left: 30px;
            }

            .floating-2 {
                right: 30px;
                bottom: 60px;
            }

            .experience-badge {
                width: 100px;
                height: 100px;
            }

            .experience-badge .years {
                font-size: 28px;
            }

            .experience-badge .text {
                font-size: 10px;
            }

            .about-heading {
                font-size: 28px;
            }

            .about-stats {
                flex-wrap: wrap;
                gap: 20px;
            }

            .stat-item {
                flex: 1 0 30%;
            }
        }

        @media (max-width: 576px) {
            .about-image-container {
                height: 380px;
            }

            .main-image {
                height: 250px;
            }

            .floating-image {
                width: 110px;
                height: 110px;
            }

            .floating-1 {
                left: 20px;
                bottom: 20px;
            }

            .floating-2 {
                right: 20px;
                bottom: 80px;
            }

            .feature-item {
                margin-bottom: 20px;
            }

            .feature-icon {
                min-width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .stat-value {
                font-size: 24px;
            }

            .stat-label {
                font-size: 12px;
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

        /* Responsive */
        @media (max-width: 992px) {
            .contact-form-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {

            .contact-form,
            .contact-info-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-slider" id="accueil">
        <div class="slide active">
            <div class="slide-bg" style="background-image: url('img/1.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>Bienvenue à l'<?php echo $hospital_name; ?></h2>
                <p>Un établissement public hospitalier au service de la santé des citoyens avec une équipe médicale
                    compétente et dévouée.</p>
                <a href="#about" class="btn btn-primary">À Propos de Notre Établissement</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/2.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>Équipements et plateaux techniques</h2>
                <p>Notre établissement est doté d'équipements médicaux permettant d'assurer des soins de qualité
                    conformes aux normes nationales de santé.</p>
                <a href="#services" class="btn btn-primary">Nos services médicaux</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/3.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>Corps médical et paramédical qualifié</h2>
                <p>Nos médecins spécialistes, médecins généralistes et personnel paramédical travaillent en synergie
                    pour garantir une prise en charge optimale.</p>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/4.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>Service des urgences 24h/24</h2>
                <p>Notre service des urgences médicales est opérationnel tous les jours de la semaine pour répondre aux
                    besoins de la population de notre région.</p>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/5.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>Au service de la santé publique</h2>
                <p>L'EPH s'engage dans la mise en œuvre des programmes nationaux de santé et contribue activement à
                    l'amélioration de la santé de notre communauté.</p>
                <a href="#contact" class="btn btn-primary">Nous contacter</a>
            </div>
        </div>

        <div class="slider-arrows">
            <div class="arrow prev">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="arrow next">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>

        <div class="slider-controls">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <div class="slide-counter">
            <span class="slide-counter-current">1</span>
            <span class="slide-counter-divider"></span>
            <span class="slide-counter-total">5</span>
        </div>

        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section highlight-animation" id="about" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>Qui sommes-nous ?</h2>
            </div>

            <div class="modern-about-container">
                <!-- Image principale avec effet -->
                <div class="about-image-container" data-aos="fade-right" data-aos-delay="200">
                    <div class="about-image main-image">
                        <img src="img/1.jpg" alt="EPH SOBHA" class="main-about-img">
                        <div class="image-overlay"></div>
                        <div class="experience-badge">
                            <span class="years">40</span>
                            <span class="text">Années<br>d'expérience</span>
                        </div>
                    </div>
                    <!-- Petites images flottantes -->
                    <div class="floating-image floating-1">
                        <img src="img/2.jpg" alt="Notre équipe">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="floating-image floating-2">
                        <img src="img/3.jpg" alt="Équipements">
                        <div class="image-overlay"></div>
                    </div>
                </div>

                <!-- Contenu à propos -->
                <div class="about-content" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-tag">Établissement Public Hospitalier de Sobha depuis 1985</div>
                    <h3 class="about-heading">Un établissement de référence au service de votre santé</h3>

                    <div class="about-description">
                        <p>
                            L'Établissement Public Hospitalier de SOBHA de 188 lits a pour mission de fournir des soins
                            médicaux de haute qualité, accessibles à l’ensemble des citoyens. Grâce à son engagement
                            constant envers l’excellence médicale et le bien-être des patients, notre hôpital s’est
                            imposé comme un établissement de référence dans la région.
                        </p>
                        <p>
                            L’EPH de SOBHA assure la couverture sanitaire d’une population estimée à 400 000 habitants,
                            répartis sur neuf (09) communes : Boukadir, Sobha, Oued Sly, Taougrit, Dahra, Aïn Merane,
                            Heranfa, Ouled Ben Abdalkader et El Hadjadj.
                        </p>


                        <div class="about-features">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Notre Mission</h4>
                                    <p>Fournir des soins médicaux de qualité accessibles à tous en plaçant le patient au
                                        centre de nos préoccupations.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>Nos Valeurs</h4>
                                    <p>Respect de la dignité humaine, excellence professionnelle, équité dans l'accès
                                        aux soins, et innovation continue.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Chiffres Clés -->
    <section class="section highlight-animation" id="chiffres-cles" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>Chiffres Clés</h2>
                <p>EPH SOBHA en quelques chiffres</p>
            </div>

            <div class="stats-container">
                <div class="stat-card" data-aos="flip-left" data-aos-delay="100" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <div class="stat-number" data-count="188">0</div>
                    <div class="stat-title">Lits</div>
                    <div class="stat-description">Capacité d'accueil pour tous types de soins</div>
                </div>

                <div class="stat-card" data-aos="flip-left" data-aos-delay="200" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" data-count="622">0</div>
                    <div class="stat-title">Employés</div>
                    <div class="stat-description">Personnel total de l’établissement</div>
                </div>

                <div class="stat-card" data-aos="flip-left" data-aos-delay="300" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <div class="stat-number" data-count="7">0</div>
                    <div class="stat-title">Services</div>
                    <div class="stat-description">Nombre de services d'hospitalisation</div>
                </div>

                <div class="stat-card" data-aos="flip-left" data-aos-delay="600" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-number" data-count="40">0</div>
                    <div class="stat-title">Années d'expérience</div>
                    <div class="stat-description">À votre service depuis 1985</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section highlight-animation" id="services" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>Nos Services</h2>
            </div>
            <div class="modern-services-grid">
                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="img/services/umc.jpg" alt="Urgences Médico-Chirurgicales">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Urgences Médico-Chirurgicales</h3>
                        <p>Service d'urgence disponible 24h/24 et 7j/7 pour tous types de cas médicaux.</p>
                        <a href="urgences.php" class="service-btn">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="150">
                    <div class="service-image">
                        <img src="img/services/med-interne.jpg" alt="Médecine Interne">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Médecine Interne</h3>
                        <p>Diagnostic et traitement des maladies internes complexes de l'adulte.</p>
                        <a href="med-interne.php" class="service-btn">En savoir plus <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="img/services/chirurgie.jpg" alt="Chirurgie Générale">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-procedures"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Chirurgie Générale</h3>
                        <p>Interventions chirurgicales par une équipe de chirurgiens hautement qualifiés.</p>
                        <a href="chirurgie.php" class="service-btn">En savoir plus <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="250">
                    <div class="service-image">
                        <img src="img/services/pediatrie.jpg" alt="Pédiatrie">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-child"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Pédiatrie</h3>
                        <p>Soins médicaux spécialisés pour les nourrissons, les enfants et les adolescents.</p>
                        <a href="pediatrie.php" class="service-btn">En savoir plus <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-image">
                        <img src="img/services/maternite.jpg" alt="Maternité">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-baby"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Maternité</h3>
                        <p>Accompagnement complet de la grossesse à l'accouchement en toute sécurité.</p>
                        <a href="maternite.php" class="service-btn">En savoir plus <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="350">
                    <div class="service-image">
                        <img src="img/services/dialyse.jpg" alt="Hémodialyse">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-tint"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Hémodialyse</h3>
                        <p>Traitement de l'insuffisance rénale chronique par dialyse de qualité.</p>
                        <a href="dialyse.php" class="service-btn">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-image">
                        <img src="img/services/pneumologie.jpg" alt="Pneumologie-Phthisiologie">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-lungs"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Pneumologie-Phthisiologie</h3>
                        <p>Soins spécialisés des maladies pulmonaires et tuberculeuses.</p>
                        <a href="pneumo.php" class="service-btn">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="450">
                    <div class="service-image">
                        <img src="img/services/radiologie.jpg" alt="Radiologie">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-x-ray"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Unité de Radiologie</h3>
                        <p>Équipements d'imagerie médicale modernes pour un diagnostic précis.</p>
                        <a href="radio.php" class="service-btn">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-image">
                        <img src="img/services/labo.jpg" alt="Laboratoire">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-vials"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Laboratoire</h3>
                        <p>Analyses biologiques et médicales précises avec un équipement moderne.</p>
                        <a href="labo.php" class="service-btn">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section highlight-animation" id="contact" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>Contactez-Nous</h2>
            </div>
            <div class="contact-form-container">
                <div class="contact-info-card" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
                    <h3>Informations de Contact</h3>
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Adresse</h4>
                            <p>Commune de Sobha, Wilaya de Chlef, Algérie</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Téléphone</h4>
                            <p>+213 27 71 91 97</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>contact.ephsobha@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Heures d'ouverture</h4>
                            <p>Administration: Dim-Jeu, 8h-16h30</p>
                            <p>Urgences: 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <h3>Envoyez-nous un message</h3>
                    <form action="process_contact.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Votre nom complet"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Votre email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="phone" placeholder="Votre numéro de téléphone">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="subject" required>
                                <option value="" selected disabled>Sélectionnez un service</option>
                                <option value="Info">Demande d'information</option>
                                <option value="Reclamation">Réclamation</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Votre message"
                                required></textarea>
                        </div>
                        <!-- Token CSRF pour la sécurité -->
                        <input type="hidden" name="csrf_token" value="<?php echo md5(uniqid(mt_rand(), true)); ?>">
                        <button type="submit" class="btn btn-primary">Envoyer <i
                                class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Carte -->
    <section class="section highlight-animation" id="carte" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>Rejoignez-nous</h2>
            </div>
            <div style="height: 400px; width: 100%; border-radius: 5px; overflow: hidden; margin-bottom: 20px;"
                data-aos="zoom-in" data-aos-delay="200">
                <div id="map" style="height: 100%; width: 100%;"></div>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <p><strong>Adresse:</strong> Commune de Sobha, Wilaya de Chlef, Algérie</p>
                <p><strong>Coordonnées:</strong> 36.10538, 1.10444</p>
            </div>
        </div>
    </section>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>
<?php include('footer.php'); ?>