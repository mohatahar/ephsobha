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
    <title>Recrutement - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Ajout de la bibliothèque AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        /* Page Title Banner - harmonisation avec about.php */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/recrutement.jpg');
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
            margin-bottom: 0px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
        }

        /* Careers Intro */
        .careers-intro {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
            padding: 40px;
            margin-bottom: 40px;
            text-align: center;
        }

        .careers-intro h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.8rem;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .careers-intro h3::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .careers-intro p {
            margin-bottom: 15px;
            line-height: 1.7;
            font-size: 1.1rem;
            color: #555;
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
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .value-card h4 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .value-card p {
            color: #666;
        }

        /* Jobs Section */
        .bg-light {
            background-color: #f8f9fa;
        }

        .job-openings-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .job-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
            border-left: 5px solid var(--primary-color);
            transition: transform 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .job-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.4rem;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            font-size: 0.95rem;
            color: #6c757d;
        }

        .job-meta div {
            margin-right: 20px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .job-meta i {
            margin-right: 5px;
            color: var(--accent-color);
        }

        .job-description {
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .job-requirements {
            margin-bottom: 20px;
        }

        .job-requirements h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .job-requirements ul {
            list-style-type: none;
            padding-left: 5px;
        }

        .job-requirements ul li {
            position: relative;
            padding-left: 25px;
            margin-bottom: 8px;
        }

        .job-requirements ul li::before {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--success-color);
        }

        .job-application {
            border-top: 1px solid #e9ecef;
            padding-top: 20px;
        }

        .job-application h4 {
            color: var(--dark-color);
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .no-openings {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 50px 40px;
            text-align: center;
        }

        .no-openings i {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .no-openings h3 {
            color: var(--dark-color);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .no-openings p {
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.1rem;
            color: #555;
        }

        /* Contact Box */
        .contact-box {
            background: linear-gradient(145deg, var(--primary-color), #1a4874);
            color: white;
            border-radius: 10px;
            padding: 60px 40px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .contact-box::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 0;
        }

        .contact-box h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            position: relative;
        }

        .contact-box p {
            margin-bottom: 30px;
            font-size: 1.1rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .contact-info-list {
            max-width: 500px;
            margin: 30px auto;
            list-style-type: none;
        }

        .contact-info-list li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .contact-info-list i {
            margin-right: 15px;
            font-size: 1.3rem;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .btn {
            display: inline-block;
            padding: 12px 30px;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .animate-fade-in,
        .animate-delay-1,
        .animate-delay-2,
        .animate-delay-3,
        .animate-delay-4 {
            animation: none !important;
            opacity: 1;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .process-step:not(:last-child) .step-number::after {
                display: none;
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

            .process-container {
                flex-direction: column;
                align-items: center;
            }

            .process-step {
                width: 100%;
                max-width: 300px;
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

        /* Design circulaire pour le processus de recrutement */

        .circle-process-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            max-width: 1200px;
            margin: 50px auto 30px;
            position: relative;
        }

        /* Ligne de connexion entre les cercles */
        .circle-process-container::before {
            content: '';
            position: absolute;
            top: 80px;
            left: 50%;
            width: 70%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: translateX(-50%);
            z-index: 1;
        }

        .circle-process-item {
            flex: 1;
            min-width: 220px;
            max-width: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        /* Cercle extérieur - avec animation hover */
        .circle-outer {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: linear-gradient(145deg, #f0f0f0, #ffffff);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            position: relative;
            transition: all 0.4s ease;
        }

        .circle-process-item:hover .circle-outer {
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(var(--primary-color-rgb), 0.2);
        }

        /* Cercle intérieur */
        .circle-inner {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .circle-process-item:hover .circle-inner {
            background: linear-gradient(145deg, var(--primary-color), var(--secondary-color));
        }

        /* Numéro de l'étape */
        .circle-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
            transition: all 0.4s ease;
        }

        .circle-process-item:hover .circle-number {
            color: white;
        }

        /* Contenu textuel */
        .circle-content {
            padding: 0 15px;
        }

        .circle-content h4 {
            color: var(--primary-color);
            margin-bottom: 12px;
            font-size: 1.3rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .circle-process-item:hover .circle-content h4 {
            transform: translateY(-5px);
        }

        .circle-content p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* Animation pour les icônes dans le cercle - optionnel */
        .circle-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            position: absolute;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.4s ease;
        }

        .circle-process-item:hover .circle-icon {
            opacity: 0.2;
            transform: scale(1);
        }

        /* Responsive design */
        @media (max-width: 991px) {
            .circle-process-container::before {
                display: none;
            }

            .circle-process-container {
                flex-direction: column;
                align-items: center;
                gap: 50px;
            }

            .circle-process-item {
                width: 100%;
                max-width: 350px;
            }

            /* Ajout d'une ligne verticale entre les éléments */
            .circle-process-item:not(:last-child)::after {
                content: '';
                position: absolute;
                width: 3px;
                height: 40px;
                background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
                bottom: -45px;
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media (max-width: 576px) {
            .circle-outer {
                width: 140px;
                height: 140px;
            }

            .circle-inner {
                width: 100px;
                height: 100px;
            }

            .circle-number {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Rejoignez Notre Équipe</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Développez votre carrière au sein d'un
                établissement hospitalier engagé pour l'excellence des soins</p>
        </div>
    </section>

    <!-- Introduction -->
    <section class="section">
        <div class="container">
            <div class="careers-intro" data-aos="fade-up" data-aos-duration="1000">
                <h3>L'hôpital recrute, rejoignez-nous !</h3>
                <p>L'Établissement Public Hospitalier SOBHA offre un environnement de travail stimulant où chaque
                    professionnel contribue directement au bien-être et à la santé de notre communauté. Travailler avec
                    nous, c'est rejoindre une équipe pluridisciplinaire engagée dans l'excellence des soins médicaux.
                </p>
                <p>Nous recrutons régulièrement des professionnels qualifiés et motivés dans divers domaines médicaux,
                    paramédicaux, techniques et administratifs. Les postes disponibles sont publiés sur cette page
                    lorsque des opportunités se présentent.</p>
            </div>
        </div>
    </section>

    <!-- Nos valeurs -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Nos Valeurs</h2>
                <p>Des principes qui guident notre pratique quotidienne</p>
            </div>
            <div class="values-container">
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <i class="fas fa-heart"></i>
                    <h4>Compassion</h4>
                    <p>Nous plaçons l'humanité au cœur de chaque interaction avec nos patients et entre collègues.</p>
                </div>
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <i class="fas fa-medal"></i>
                    <h4>Excellence</h4>
                    <p>Nous visons l'excellence dans tous nos services et encourageons le développement professionnel
                        continu.</p>
                </div>
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <i class="fas fa-hands-helping"></i>
                    <h4>Travail d'équipe</h4>
                    <p>La collaboration et le respect mutuel sont essentiels pour offrir des soins de qualité.</p>
                </div>
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
                    <i class="fas fa-balance-scale"></i>
                    <h4>Intégrité</h4>
                    <p>Nous agissons avec honnêteté, éthique et transparence dans toutes nos actions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section" data-aos="fade" data-aos-duration="1500">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">Développez Votre Potentiel Avec Nous
            </h2>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Intégrez un environnement propice à
                l'évolution professionnelle avec une équipe engagée pour le bien-être des patients.</p>
            <a href="#opportunites" class="btn btn-primary" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="300">Voir nos opportunités <i class="fas fa-arrow-down"></i></a>
        </div>
    </section>

    <!-- Postes ouverts -->
    <section id="opportunites" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Opportunités de Carrière</h2>
                <p>Explorez nos postes disponibles et rejoignez notre équipe</p>
            </div>

            <div class="job-openings-container">
                <!-- Postes ouverts - actuellement aucun -->
                <div class="no-openings" data-aos="fade-up" data-aos-duration="1000">
                    <i class="fas fa-briefcase"></i>
                    <h3>Aucun poste vacant actuellement</h3>
                    <p>Nous ne recrutons pas en ce moment, mais nous vous invitons à consulter régulièrement cette page
                        pour les futures opportunités.</p>
                </div>

                <!-- Exemple de poste (à activer en cas de recrutement) -->
                <div class="job-card" style="display: none;" data-aos="fade-up" data-aos-duration="1000">
                    <h3>Médecin Spécialiste en Radiologie</h3>
                    <div class="job-meta">
                        <div><i class="fas fa-map-marker-alt"></i> EPH SOBHA, Chlef</div>
                        <div><i class="fas fa-clock"></i> Temps plein</div>
                        <div><i class="fas fa-calendar"></i> Date limite: 30 Mai 2025</div>
                        <div><i class="fas fa-tag"></i> Réf: MED-RAD-2025-04</div>
                    </div>
                    <div class="job-description">
                        <p>L'Établissement Public Hospitalier SOBHA recherche un(e) médecin spécialiste en radiologie
                            pour rejoindre notre équipe médicale. Le candidat retenu sera responsable de la réalisation
                            et de l'interprétation des examens d'imagerie médicale pour aider au diagnostic et au suivi
                            des patients.</p>
                    </div>
                    <div class="job-requirements">
                        <h4>Qualifications et compétences requises :</h4>
                        <ul>
                            <li>Diplôme de médecine spécialisée en radiologie</li>
                            <li>Expérience minimale de 3 ans en radiologie diagnostique</li>
                            <li>Maîtrise des techniques d'imagerie médicale (radiographie, échographie, scanner)</li>
                            <li>Capacité à travailler en équipe pluridisciplinaire</li>
                            <li>Excellentes compétences en communication et relations interpersonnelles</li>
                        </ul>
                    </div>
                    <div class="job-application">
                        <h4>Comment postuler :</h4>
                        <p>Les candidats intéressés sont invités à soumettre leur CV, lettre de motivation et copies des
                            diplômes avec la référence "MED-RAD-2025-04" par :</p>
                        <ul>
                            <li>Email : recrutement@ephsobha.dz</li>
                            <li>Courrier : Service des Ressources Humaines, EPH SOBHA, Commune de Sobha, Wilaya de
                                Chlef, Algérie</li>
                            <li>Dépôt direct au bureau des ressources humaines de l'EPH SOBHA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Processus de recrutement -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Notre Processus de Recrutement</h2>
                <p>Un parcours transparent et structuré</p>
            </div>

            <div class="circle-process-container">
                <!-- Étape 1 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">1</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>Annonce du Poste</h4>
                        <p>Les postes vacants sont publiés sur cette page et par voie d'affichage à l'hôpital.</p>
                    </div>
                </div>

                <!-- Étape 2 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">2</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>Soumission des Candidatures</h4>
                        <p>Les candidats doivent soumettre leur dossier complet selon les modalités indiquées dans
                            l'annonce.</p>
                    </div>
                </div>

                <!-- Étape 3 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">3</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>Sélection et Entretiens</h4>
                        <p>Après une présélection des dossiers, les candidats retenus sont convoqués pour un entretien.
                        </p>
                    </div>
                </div>

                <!-- Étape 4 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">4</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>Décision et Intégration</h4>
                        <p>Les candidats sélectionnés sont informés et accompagnés dans leur processus d'intégration.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Avantages de travailler avec nous -->
    <section class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>Pourquoi Nous Rejoindre ?</h2>
                <p>Des avantages qui font la différence</p>
            </div>
            <div class="values-container">
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="100">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>Formation Continue</h4>
                    <p>Nous encourageons le développement professionnel à travers des programmes de formation continue.
                    </p>
                </div>
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="200">
                    <i class="fas fa-users"></i>
                    <h4>Environnement Collaboratif</h4>
                    <p>Travaillez dans une équipe pluridisciplinaire favorisant l'échange de connaissances et
                        l'entraide.</p>
                </div>
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="300">
                    <i class="fas fa-cogs"></i>
                    <h4>Équipements Modernes</h4>
                    <p>Accédez à des technologies et équipements médicaux de pointe pour optimiser votre pratique.</p>
                </div>
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="400">
                    <i class="fas fa-chart-line"></i>
                    <h4>Évolution de Carrière</h4>
                    <p>Bénéficiez d'opportunités d'avancement et de spécialisation au sein de notre établissement.</p>
                </div>
            </div>
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

    <!-- Script pour initialiser AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de la bibliothèque AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                easing: 'ease-out-back',
                once: false,
                mirror: false,
                offset: 120
            });
        });
    </script>
</body>
</html>
<?php include('footer.php'); ?>