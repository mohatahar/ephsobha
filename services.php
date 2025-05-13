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
    <title>Nos Services - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services.jpg');
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

        .bg-light {
            background-color: #f8f9fa;
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
            max-width: 800px;
            margin: 0 auto;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .service-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            text-align: center;
            border-top: 5px solid #4caf50;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .service-img {
            height: 180px;
            width: 100%;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .service-card:hover .service-img img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-card i {
            font-size: 2.5rem;
            color: #4caf50;
            margin-bottom: 15px;
            display: inline-block;
            position: relative;
            z-index: 1;
        }

        .service-card i::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            background-color: rgba(76, 175, 80, 0.1);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .service-card h3 {
            color: #2a5a86;
            font-size: 1.5rem;
            margin-bottom: 15px;
            position: relative;
            font-weight: 600;
        }

        .service-card p {
            color: #666;
            margin-bottom: 20px;
        }

        .service-details {
            list-style: none;
            padding: 0;
            text-align: left;
            border-top: 1px dashed #e0e0e0;
            padding-top: 15px;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .service-details li {
            padding: 8px 0;
            position: relative;
            padding-left: 25px;
            color: #555;
        }

        .service-details li::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: #4caf50;
            position: absolute;
            left: 0;
            top: 10px;
            font-size: 0.9rem;
        }

        /* Bouton en savoir plus */
        .btn-more {
            background-color: #2a5a86;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: auto;
        }

        .btn-more:hover {
            background-color: #1d4061;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-more i {
            margin-left: 8px;
            font-size: 0.9rem;
            color: white;
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

        /* Feature Cards */
        .feature-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .feature-card {
            text-align: center;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            background: white;
            transition: all 0.3s;
            overflow: hidden;
            position: relative;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: 0;
            transition: opacity 0.3s;
        }

        .feature-card:hover::before {
            opacity: 0.15;
        }

        .feature-card:nth-child(1)::before {
            background-image: url('img/specialists.jpg');
        }

        .feature-card:nth-child(2)::before {
            background-image: url('img/24service.jpg');
        }

        .feature-card:nth-child(3)::before {
            background-image: url('img/equipment.jpg');
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-card i,
        .feature-card h3,
        .feature-card p {
            position: relative;
            z-index: 1;
        }

        .feature-card i {
            font-size: 3rem;
            color: #4caf50;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #2a5a86;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #666;
        }

        /* Facility Gallery */
        .facility-gallery {
            margin: 60px 0;
        }

        .gallery-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .gallery-title h2 {
            font-size: 2.5rem;
            color: #2a5a86;
            margin-bottom: 15px;
        }

        .gallery-title p {
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            height: 250px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .feature-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-container {
                grid-template-columns: repeat(2, 1fr);
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
        }

        @media (max-width: 576px) {
            .feature-cards {
                grid-template-columns: 1fr;
            }

            .gallery-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Nos Services</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">Des soins médicaux d'excellence pour
                toute la communauté</p>
        </div>
    </section>

    <!-- Features Section -->
    <div class="container">
        <div class="feature-cards">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-user-md"></i>
                <h3>Spécialistes Qualifiés</h3>
                <p>Une équipe médicale expérimentée et des spécialistes reconnus dans leur domaine.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-clock"></i>
                <h3>Service 24h/24</h3>
                <p>Des soins d'urgence disponibles jour et nuit pour répondre à tous vos besoins médicaux.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-building"></i>
                <h3>Équipement</h3>
                <p>Des équipements médicaux permettant d'assurer un diagnostic précis et des traitements efficaces.</p>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Services Médicaux</h2>
                <p>Nous offrons une gamme complète de services médicaux pour répondre à tous vos besoins de santé, avec
                    une équipe de professionnels dévoués et un équipement de pointe.</p>
            </div>

            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/umc.jpg" alt="Service d'urgences">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-truck"></i>
                        <h3>Urgences Médico-Chirurgicales</h3>
                        <p>Service d'urgence disponible 24h/24 et 7j/7 pour tous types de cas médicaux.</p>
                        <ul class="service-details">
                            <li>Prise en charge immédiate des urgences vitales</li>
                            <li>Équipe médicale disponible en permanence</li>
                        </ul>
                        <a href="urgences.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/med-interne.jpg" alt="Médecine interne">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-stethoscope"></i>
                        <h3>Médecine Interne</h3>
                        <p>Diagnostic et traitement des maladies internes complexes de l'adulte.</p>
                        <ul class="service-details">
                            <li>Prise en charge des maladies chroniques</li>
                            <li>Diagnostics complets et personnalisés</li>
                            <li>Suivi régulier des patients</li>
                        </ul>
                        <a href="med-interne.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/chirurgie.jpg" alt="Chirurgie générale">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-procedures"></i>
                        <h3>Chirurgie Générale</h3>
                        <p>Interventions chirurgicales par une équipe de chirurgiens et de traumatologues qualifiés.</p>
                        <ul class="service-details">
                            <li>Chirurgie Générale</li>
                            <li>Traumatologie</li>
                        </ul>
                        <a href="chirurgie.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/pediatrie.jpg" alt="Service de pédiatrie">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-child"></i>
                        <h3>Pédiatrie</h3>
                        <p>Soins médicaux spécialisés pour les nourrissons, les enfants et les adolescents.</p>
                        <ul class="service-details">
                            <li>Suivi de la croissance et du développement</li>
                            <li>Vaccinations</li>
                            <li>Traitement des maladies infantiles</li>
                        </ul>
                        <a href="pediatrie.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/maternite.jpg" alt="Service de maternité">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-baby"></i>
                        <h3>Maternité</h3>
                        <p>Accompagnement de la grossesse à l'accouchement assuré par des sages-femmes et des médecins
                            généralistes, dans un cadre sécurisé.</p>
                        <ul class="service-details">
                            <li>Suivi prénatal par sages-femmes et médecins généralistes</li>
                            <li>Accouchement assisté par une équipe expérimentée</li>
                            <li>Soins postnatals et conseils personnalisés</li>
                        </ul>
                        <a href="maternite.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/dialyse.jpg" alt="Service d'hémodialyse">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-tint"></i>
                        <h3>Hémodialyse</h3>
                        <p>Traitement de l'insuffisance rénale chronique par dialyse de qualité.</p>
                        <ul class="service-details">
                            <li>Équipement moderne de dialyse</li>
                            <li>Suivi néphrologique</li>
                            <li>Prise en charge personnalisée</li>
                        </ul>
                        <a href="dialyse.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/pneumologie.jpg" alt="Service de pneumologie">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-lungs"></i>
                        <h3>Pneumologie-Phthisiologie</h3>
                        <p>Soins spécialisés des maladies pulmonaires et tuberculeuses.</p>
                        <ul class="service-details">
                            <li>Diagnostic et traitement des maladies respiratoires</li>
                            <li>Suivi des patients tuberculeux</li>
                            <li>Tests fonctionnels respiratoires</li>
                        </ul>
                        <a href="pneumo.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/radiologie.jpg" alt="Service de radiologie">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-x-ray"></i>
                        <h3>Radiologie</h3>
                        <p>Service d'imagerie médicale équipé pour fournir un diagnostic fiable grâce à des technologies adaptées.</p>
                        <ul class="service-details">
                            <li>Radiographie conventionnelle</li>
                            <li>Échographie</li>
                        </ul>
                        <a href="radio.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/labo.jpg" alt="Laboratoire d'analyses">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-vials"></i>
                        <h3>Laboratoire</h3>
                        <p>Analyses biologiques et médicales précises.</p>
                        <ul class="service-details">
                            <li>Analyses sanguines</li>
                            <li>Tests biochimiques</li>
                            <li>Résultats rapides et fiables</li>
                        </ul>
                        <a href="labo.php" class="btn-more">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facility Gallery Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="gallery-title" data-aos="fade-up">
                <h2>Nos Installations</h2>
                <p>Découvrez nos installations médicales conçues pour offrir le meilleur environnement de soins possible</p>
            </div>
            <div class="gallery-container" data-aos="fade-up">
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/1.jpg" alt="Accueil de l'hôpital">
                    <div class="gallery-caption">Entrée de l'EPH</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/salle.jpg" alt="Salle de consultation">
                    <div class="gallery-caption">Salle de consultation</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/bloc.jpg" alt="Bloc opératoire">
                    <div class="gallery-caption">Bloc opératoire</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/chambre.jpg" alt="Chambre patient">
                    <div class="gallery-caption">Chambre patient</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/laboratoire.jpg" alt="Laboratoire">
                    <div class="gallery-caption">Laboratoire d'analyses</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/radio.jpg" alt="Salle de radiologie">
                    <div class="gallery-caption">Équipement de radiologie</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/urgences.jpg" alt="Service d'urgences">
                    <div class="gallery-caption">Entrée des urgences</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/5.jpg" alt="Extérieur de l'hôpital">
                    <div class="gallery-caption">Façade de l'hôpital</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section" data-aos="fade-up">
        <div class="container">
            <h2>Besoin d'un rendez-vous médical?</h2>
            <p>Notre équipe est prête à vous accueillir et à vous offrir les meilleurs soins possible. Contactez-nous
                dès aujourd'hui pour prendre rendez-vous avec nos spécialistes.</p>
            <a href="contact.php" class="btn btn-primary">Prendre rendez-vous <i class="fas fa-arrow-right"></i></a>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Script pour les images de la galerie
            const galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(item => {
                item.addEventListener('mouseenter', function () {
                    this.querySelector('.gallery-caption').style.transform = 'translateY(0)';
                });

                item.addEventListener('mouseleave', function () {
                    this.querySelector('.gallery-caption').style.transform = 'translateY(100%)';
                });
            });
        });
    </script>

    <!-- AOS JS -->
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