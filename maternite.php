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
    <title>Service de Maternité - <?php echo $hospital_name; ?></title>
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
            --maternity-color: #ff77b9;
            --maternity-light: #ffe0f0;
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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/services/maternite.jpg');
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
            color: var(--maternity-color);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--maternity-color);
        }

        .info-card {
            background-color: #f8f9fa;
            border-left: 4px solid var(--maternity-color);
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .info-card h3 {
            color: var(--maternity-color);
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
            color: var(--maternity-color);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .special-notice {
            background-color: var(--maternity-light);
            border-left: 4px solid var(--maternity-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--maternity-color);
            margin-bottom: 10px;
        }

        /* Maternité spécifique */
        .maternity-hours {
            background-color: var(--maternity-light);
            border-left: 4px solid var(--maternity-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .maternity-hours h3 {
            color: var(--maternity-color);
            margin-bottom: 15px;
        }

        .maternity-hours p {
            margin-bottom: 10px;
        }

        .maternity-card {
            background-color: #e7f5ff;
            border-left: 4px solid var(--maternity-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .maternity-card h3 {
            color: var(--maternity-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--maternity-color);
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
            color: var(--maternity-color);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .service-item h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        /* Timeline */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background-color: var(--maternity-color);
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
        }

        .timeline-container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        .timeline-container::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            right: -10px;
            background-color: white;
            border: 4px solid var(--maternity-color);
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        .left {
            left: 0;
        }

        .right {
            left: 50%;
        }

        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid var(--maternity-light);
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent var(--maternity-light);
        }

        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid var(--maternity-light);
            border-width: 10px 10px 10px 0;
            border-color: transparent var(--maternity-light) transparent transparent;
        }

        .right::after {
            left: -10px;
        }

        .timeline-content {
            padding: 20px;
            background-color: var(--maternity-light);
            position: relative;
            border-radius: 6px;
        }

        .timeline-content h3 {
            color: var(--maternity-color);
            margin-bottom: 10px;
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 30px 0;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            height: 200px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Testimonials */
        .testimonial {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            position: relative;
        }

        .testimonial::before {
            content: '\201C';
            font-size: 4rem;
            position: absolute;
            left: 10px;
            top: -20px;
            color: var(--maternity-color);
            opacity: 0.3;
        }

        .testimonial-content {
            font-style: italic;
            margin-bottom: 15px;
        }

        .testimonial-author {
            font-weight: bold;
            text-align: right;
        }

        /* Call to action */
        .cta-section {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background-color: var(--maternity-light);
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
            margin: 10px 5px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #005d91;
        }

        .btn-maternity {
            background-color: var(--maternity-color);
            color: white;
        }

        .btn-maternity:hover {
            background-color: #e15da1;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }

            .service-list,
            .gallery {
                grid-template-columns: 1fr;
            }

            .timeline::after {
                left: 31px;
            }

            .timeline-container {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-container::before {
                left: 60px;
                border: medium solid var(--maternity-light);
                border-width: 10px 10px 10px 0;
                border-color: transparent var(--maternity-light) transparent transparent;
            }

            .left::after,
            .right::after {
                left: 21px;
            }

            .right {
                left: 0%;
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

        /* Accordion FAQ */
        .faq-item {
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background-color: var(--maternity-light);
            color: var(--dark-color);
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .faq-question::after {
            content: '\f078';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            background-color: white;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 15px 20px;
            max-height: 500px;
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }

            .gallery {
                grid-template-columns: repeat(2, 1fr);
            }

            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }

            .gallery {
                grid-template-columns: 1fr;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Service de Maternité</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Accompagnement personnalisé et soins de
                qualité pour la mère et l'enfant à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Service de Maternité</h3>
                <p>Le service de maternité de l'EPH SOBHA offre un accompagnement complet aux futures mamans, de la
                    grossesse à l'accouchement et aux soins post-nataux. Notre équipe pluridisciplinaire de
                    professionnels expérimentés est dédiée à vous offrir les meilleurs soins dans un environnement
                    chaleureux, sécurisé et bienveillant. Notre mission est de rendre cette étape de votre vie aussi
                    sereine et agréable que possible, tout en garantissant une sécurité optimale pour la mère et
                    l'enfant.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-baby"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="maternity-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> Disponibilité</h3>
                <p><strong>Horaires des consultations :</strong> Du dimanche au jeudi de 8h00 à 16h00</p>
                <p><strong>Service d'accouchement :</strong> Disponible 24h/24 et 7j/7, avec une équipe complète de
                    garde</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Nos services de maternité</h2>
                <p>Le service de maternité de l'EPH SOBHA propose une prise en charge complète avant, pendant et après
                    l'accouchement :</p>

                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-user-md"></i>
                        <h4>Suivi prénatal</h4>
                        <p>Consultations régulières, échographies, examens biologiques et préparation à l'accouchement
                        </p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-heartbeat"></i>
                        <h4>Accouchement</h4>
                        <p>Prise en charge des accouchements par voie basse et par césarienne dans des conditions
                            optimales de sécurité</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-baby-carriage"></i>
                        <h4>Suivi post-natal</h4>
                        <p>Soins à la mère et au nouveau-né, soutien à l'allaitement et conseils pour les premiers soins
                        </p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-stethoscope"></i>
                        <h4>Prise en charge spécialisée</h4>
                        <p>Grossesses à risque, naissances prématurées et soins néonataux</p>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="450">
                <h2 class="section-title">Ce qu'il faut apporter à la maternité</h2>

                <div class="maternity-card">
                    <h3><i class="fas fa-suitcase"></i> Valise pour la maternité</h3>

                    <div class="service-list">
                        <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                            <i class="fas fa-female"></i>
                            <h4>Pour la maman</h4>
                            <ul>
                                <li>Vêtements confortables et amples</li>
                                <li>Chemises de nuit ouvertes sur le devant (pour l'allaitement)</li>
                                <li>Sous-vêtements adaptés</li>
                                <li>Nécessaire de toilette</li>
                                <li>Serviettes hygiéniques spéciales post-accouchement</li>
                            </ul>
                        </div>

                        <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                            <i class="fas fa-baby"></i>
                            <h4>Pour bébé</h4>
                            <ul>
                                <li>5-6 bodies et pyjamas</li>
                                <li>Bonnets, chaussettes, moufles</li>
                                <li>Couvertures</li>
                                <li>Couches pour nouveau-né</li>
                                <li>Produits de toilette pour bébé</li>
                                <li>Premier ensemble pour la sortie</li>
                            </ul>
                        </div>

                        <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                            <i class="fas fa-clipboard-list"></i>
                            <h4>Documents importants</h4>
                            <ul>
                                <li>Carte d'identité</li>
                                <li>Carnet de santé</li>
                                <li>Résultats d'examens récents</li>
                                <li>Groupe sanguin</li>
                                <li>Livret de famille</li>
                                <li>Papiers d'assurance maladie</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Le parcours de maternité</h2>

                <div class="timeline">
                    <div class="timeline-container left" data-aos="fade-right" data-aos-delay="100">
                        <div class="timeline-content">
                            <h3>1er trimestre</h3>
                            <p>Première consultation prénatale, échographie de datation, examens sanguins et conseils
                                nutritionnels</p>
                        </div>
                    </div>

                    <div class="timeline-container right" data-aos="fade-left" data-aos-delay="150">
                        <div class="timeline-content">
                            <h3>2ème trimestre</h3>
                            <p>Suivi régulier, échographie morphologique, dépistage du diabète gestationnel et
                                préparation à la naissance</p>
                        </div>
                    </div>

                    <div class="timeline-container left" data-aos="fade-right" data-aos-delay="200">
                        <div class="timeline-content">
                            <h3>3ème trimestre</h3>
                            <p>Consultations rapprochées, échographie de croissance, préparation du plan de naissance et
                                visite des salles d'accouchement</p>
                        </div>
                    </div>

                    <div class="timeline-container right" data-aos="fade-left" data-aos-delay="250">
                        <div class="timeline-content">
                            <h3>Accouchement</h3>
                            <p>Accueil en salle de naissance, prise en charge par l'équipe de garde, accouchement dans
                                le respect de vos souhaits et de la sécurité</p>
                        </div>
                    </div>

                    <div class="timeline-container left" data-aos="fade-right" data-aos-delay="300">
                        <div class="timeline-content">
                            <h3>Séjour en maternité</h3>
                            <p>Soins post-accouchement, accompagnement à l'allaitement, premiers soins au bébé et
                                conseils personnalisés</p>
                        </div>
                    </div>

                    <div class="timeline-container right" data-aos="fade-left" data-aos-delay="350">
                        <div class="timeline-content">
                            <h3>Retour à domicile</h3>
                            <p>Consultation post-natale, suivi pédiatrique du nouveau-né et conseils pour les premières
                                semaines</p>
                        </div>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Nos installations</h2>

                <p>Le service de maternité de l'EPH SOBHA dispose d'infrastructures modernes pour assurer le confort et
                    la sécurité des patientes :</p>

                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> Salles
                        d'accouchement équipées</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> Unité de
                        néonatalogie pour la prise en charge des nouveau-nés</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> Chambres
                        confortables (individuelles et doubles) avec espace pour l'accompagnant</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> Salle de
                        préparation à l'accouchement</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> Espace
                        d'allaitement et de soins pour les nouveau-nés</li>
                </ul>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">Notre approche</h2>

                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-heart"></i>
                        <h4>Bienveillance</h4>
                        <p>Nous accordons une grande importance à l'écoute et au respect de vos souhaits pour vivre
                            cette expérience dans les meilleures conditions</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-shield-alt"></i>
                        <h4>Sécurité</h4>
                        <p>Notre équipe médicale expérimentée assure une surveillance continue et une intervention
                            rapide en cas de besoin</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-users"></i>
                        <h4>Accompagnement</h4>
                        <p>Des professionnels à votre écoute pour vous guider avant, pendant et après l'accouchement</p>
                    </div>
                </div>
            </section>

            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>Préparation à la naissance</h3>
                <p>L'EPH SOBHA propose des séances de préparation à l'accouchement animées par nos sages-femmes
                    expérimentées. Ces séances vous aideront à :</p>
                <ul style="margin-top: 10px; margin-left: 20px;">
                    <li>Comprendre les différentes étapes de l'accouchement</li>
                    <li>Apprendre des techniques de respiration et de relaxation</li>
                    <li>Vous familiariser avec les lieux et l'équipe</li>
                    <li>Préparer votre projet de naissance</li>
                    <li>Obtenir des conseils pour l'allaitement et les premiers soins du nouveau-né</li>
                </ul>
            </div>

            <section data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">Témoignages</h2>

                <div class="testimonial" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-content">
                        J'ai accouché de ma petite fille à l'EPH SOBHA et je tiens à remercier toute l'équipe pour leur
                        professionnalisme et leur gentillesse. Ils ont su me mettre en confiance et m'accompagner tout
                        au long de cette aventure. Je garde un merveilleux souvenir de mon séjour en maternité.
                    </div>
                    <div class="testimonial-author">Mme Samira B.</div>
                </div>

                <div class="testimonial" data-aos="fade-up" data-aos-delay="150">
                    <div class="testimonial-content">
                        En tant que papa, j'ai été agréablement surpris d'être intégré dans le processus. L'équipe
                        médicale nous a guidés, ma femme et moi, avec bienveillance. Les installations sont modernes et
                        le personnel très attentionné. Notre fils est né dans d'excellentes conditions.
                    </div>
                    <div class="testimonial-author">M. Karim L.</div>
                </div>

                <div class="testimonial" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-content">
                        Malgré une grossesse à risque, j'ai été suivie de façon exemplaire par l'équipe de maternité.
                        Leur vigilance et leur expertise m'ont permis de donner naissance à des jumeaux en bonne santé.
                        Je suis infiniment reconnaissante pour les soins de qualité reçus.
                    </div>
                    <div class="testimonial-author">Mme Naima T.</div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">Foire aux questions</h2>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-question">Quand dois-je me rendre à la maternité ?</div>
                    <div class="faq-answer">
                        <p>Vous devez vous rendre à la maternité dans les cas suivants :</p>
                        <ul>
                            <li>Contractions régulières et douloureuses (toutes les 5 minutes pendant plus d'une heure)
                            </li>
                            <li>Perte des eaux</li>
                            <li>Saignements</li>
                            <li>Diminution importante des mouvements du bébé</li>
                            <li>Fièvre supérieure à 38°C</li>
                            <li>Douleurs abdominales intenses</li>
                        </ul>
                        <p>En cas de doute, n'hésitez pas à contacter le service pour obtenir des conseils.</p>
                    </div>
                </div>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-question">Quelle est la durée moyenne du séjour en maternité ?</div>
                    <div class="faq-answer">
                        <p>La durée moyenne du séjour en maternité varie selon le type d'accouchement :</p>
                        <ul>
                            <li>Pour un accouchement par voie basse sans complication : 48 à 72 heures</li>
                            <li>Pour une césarienne : 4 à 5 jours</li>
                        </ul>
                        <p>Cette durée peut être ajustée en fonction de votre état de santé et de celui de votre bébé.
                        </p>
                    </div>
                </div>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                    <div class="faq-question">Puis-je être accompagnée pendant l'accouchement ?</div>
                    <div class="faq-answer">
                        <p>Oui, nous autorisons la présence d'un accompagnant de votre choix (généralement le père de
                            l'enfant ou un proche) pendant l'accouchement par voie basse, sauf contre-indication
                            médicale. Pour les césariennes programmées, cela dépend des conditions médicales et sera
                            discuté avec l'équipe médicale.</p>
                    </div>
                </div>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-question">Comment se déroule l'allaitement à la maternité ?</div>
                    <div class="faq-answer">
                        <p>Notre équipe est formée pour vous accompagner dans l'allaitement maternel si vous le
                            souhaitez. Des sages-femmes et des puéricultrices vous conseilleront sur les positions, le
                            rythme des tétées et répondront à toutes vos questions. Si vous choisissez l'allaitement
                            artificiel, nous vous guiderons également dans la préparation des biberons.</p>
                    </div>
                </div>
            </section>
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <p class="mt-3">Pour toute autre question concernant notre service de maternité :</p>
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

        // Script pour l'accordéon FAQ
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function () {
                // Toggle la classe active sur l'élément parent
                const faqItem = this.parentElement;
                faqItem.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
<?php include('footer.php'); ?>