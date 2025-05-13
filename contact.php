<?php
include('header.php');
$hospital_name = "EPH SOBHA";
$tagline = "Au service de votre santé";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/contact.jpg');
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
            position: relative;
            overflow: hidden;
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
            transition: width 0.5s ease;
        }

        .section:hover .section-title h2::after {
            width: 120px;
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
        }

        /* Map Section */
        .map-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            margin-bottom: 30px;
            height: 450px;
            position: relative;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .map-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        #map {
            height: 100%;
            width: 100%;
        }

        .map-info {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            text-align: center;
            transition: transform 0.5s ease;
        }

        .map-info:hover {
            transform: translateY(-5px);
        }

        .map-info p {
            margin: 10px 0;
            font-size: 1.1rem;
            color: #555;
        }

        .map-info strong {
            color: #2a5a86;
        }

        /* Transport Options */
        .transport-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .transport-option {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }

        .transport-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.7s ease;
            z-index: -1;
        }

        .transport-option:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .transport-option:hover::before {
            left: 100%;
        }

        .transport-option i {
            font-size: 3rem;
            color: #4caf50;
            margin-bottom: 20px;
            transition: transform 0.5s ease;
        }

        .transport-option:hover i {
            transform: scale(1.2);
        }

        .transport-option h3 {
            color: #2a5a86;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .transport-option p {
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
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(76, 175, 80, 0.4), rgba(42, 90, 134, 0.4));
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .cta-section:hover::before {
            opacity: 1;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            position: relative;
        }

        .cta-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            position: relative;
        }

        .cta-section .btn {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .cta-section .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
            z-index: -1;
        }

        .cta-section .btn:hover::before {
            left: 100%;
        }

        /* Contact Form Animation */
        .contact-form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .contact-info-card,
        .contact-form {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .contact-info-card:hover,
        .contact-form:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .contact-info-item:hover {
            transform: translateX(10px);
        }

        .contact-info-item i {
            font-size: 1.8rem;
            color: #4caf50;
            margin-right: 15px;
            margin-top: 5px;
        }

        .contact-info-item h4 {
            color: #2a5a86;
            margin-bottom: 5px;
            font-size: 1.2rem;
        }

        .contact-info-item p {
            color: #666;
            margin: 0;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #4caf50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
            outline: none;
        }

        textarea.form-control {
            height: 150px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }

        .btn:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        .btn i {
            margin-left: 8px;
        }

        /* Animation pour l'apparition des éléments */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-up.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .contact-form-container {
                grid-template-columns: 1fr;
            }

            .transport-container {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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

            .map-container {
                height: 350px;
            }
        }

        @media (max-width: 576px) {

            .contact-form,
            .contact-info-card {
                padding: 30px 20px;
            }

            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }
        }

        /* Style pour le bouton de retour en haut */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #4caf50;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: #3d8b40;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Contactez-Nous</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Nous sommes à votre écoute pour répondre
                à vos questions et vous accompagner dans vos démarches</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section" id="contact">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="800">
                <h2>Nous Contacter</h2>
                <p>N'hésitez pas à nous contacter pour toute question ou pour prendre rendez-vous</p>
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
                            <p>Standard: +213 27 71 91 97</p>
                            <p>Urgences: +213 27 71 91 98</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>contact.ephsobha@gmail.com</p>
                            <p>rdv.ephsobha@gmail.com (Pour les rendez-vous)</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Heures d'ouverture</h4>
                            <p>Administration: Dim-Jeu, 8h-16h30</p>
                            <p>Consultations: Dim-Jeu, 8h30-15h</p>
                            <p>Urgences: 24h/24, 7j/7</p>
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

    <!-- Map Section -->
    <section class="section bg-light" id="map-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="800">
                <h2>Notre Localisation</h2>
                <p>Trouvez facilement votre chemin jusqu'à notre établissement</p>
            </div>
            <div class="map-container" data-aos="zoom-in" data-aos-duration="1000">
                <div id="map"></div>
            </div>
            <div class="map-info" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                <p><strong>Adresse:</strong> Commune de Sobha, Wilaya de Chlef, Algérie</p>
                <p><strong>Coordonnées GPS:</strong> 36.10538, 1.10444</p>
                <p><strong>Repères:</strong> À 5 minutes de la Route Nationale RN11, à proximité de la mosquée centrale
                    de Sobha</p>
            </div>
        </div>
    </section>

    <!-- Transport Options Section -->
    <section class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="800">
                <h2>Comment Nous Rejoindre</h2>
                <p>Plusieurs options s'offrent à vous pour accéder à notre établissement</p>
            </div>
            <div class="transport-container">
                <div class="transport-option" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <i class="fas fa-car"></i>
                    <h3>En voiture</h3>
                    <p>Accès facile depuis la Route Nationale RN11. Suivez les panneaux vers Sobha, puis les indications
                        "Hôpital" ou "EPH". Un parking gratuit de 100 places est disponible pour les patients et
                        visiteurs.</p>
                </div>
                <div class="transport-option" data-aos="fade-up" data-aos-duration="800" data-aos-delay="300">
                    <i class="fas fa-bus"></i>
                    <h3>En transport en commun</h3>
                    <p>Plusieurs lignes de bus desservent la commune de Sobha depuis le centre-ville de Chlef (lignes
                        12, 15 et 23). Arrêt "Hôpital Sobha" à 100m de l'entrée principale.</p>
                </div>
                <div class="transport-option" data-aos="fade-up" data-aos-duration="800" data-aos-delay="500">
                    <i class="fas fa-taxi"></i>
                    <h3>En taxi</h3>
                    <p>Service de taxi disponible depuis toutes les grandes villes environnantes. Tarif approximatif
                        depuis Chlef centre : 400-500 DA. Une station de taxis est disponible devant l'hôpital.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section" data-aos="fade" data-aos-duration="1200">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-duration="800">Besoin d'une assistance médicale urgente ?</h2>
            <p data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">Notre service d'urgence est disponible
                24h/24 et 7j/7 pour vous accueillir et vous prodiguer les soins nécessaires.</p>
            <a href="services.php" class="btn btn-primary" data-aos="fade-up" data-aos-duration="800"
                data-aos-delay="400">Découvrir nos services <i class="fas fa-arrow-right"></i></a>
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
    <!-- Script AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script>
        // Initialiser AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: false,
                mirror: false,
                offset: 120,
                easing: 'ease-out-back'
            });

            // Ajout d'effet de parallaxe au défilement
            window.addEventListener('scroll', function () {
                const scrolled = window.scrollY;
                const parallaxElements = document.querySelectorAll('.page-title');

                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    element.style.backgroundPositionY = -(scrolled * speed) + 'px';
                });
            });

            // Initialiser la carte quand la page est chargée
            // Coordonnées de l'EPH SOBHA
            var latitude = 36.10538;
            var longitude = 1.10444;

            // Initialiser la carte centrée sur l'EPH SOBHA
            var map = L.map('map').setView([latitude, longitude], 15);

            // Ajouter la couche de tuiles OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Ajouter un marqueur pour l'emplacement de l'hôpital
            var marker = L.marker([latitude, longitude]).addTo(map);

            // Ajouter une popup au marqueur
            marker.bindPopup("<b>EPH SOBHA</b><br>Établissement Public Hospitalier").openPopup();

            // Ajouter un cercle pour indiquer la zone de l'hôpital
            var circle = L.circle([latitude, longitude], {
                color: '#4caf50',
                fillColor: '#4caf50',
                fillOpacity: 0.2,
                radius: 300
            }).addTo(map);

            // Animation au survol des éléments
            const transportOptions = document.querySelectorAll('.transport-option');
            transportOptions.forEach(option => {
                option.addEventListener('mouseenter', function () {
                    this.style.transition = 'transform 0.5s ease, box-shadow 0.5s ease';
                });
            });
        });

        // Rafraîchir AOS lors du redimensionnement de la fenêtre
        window.addEventListener('resize', function () {
            AOS.refresh();
        });
    </script>
</body>

</html>

<?php include('footer.php'); ?>