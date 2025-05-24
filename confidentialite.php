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
    <title>Politique de Confidentialité - EPH SOBHA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Ajout de la bibliothèque AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/confident.jpg');
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

        .section {
            padding: 0px 0;
        }
        
        /* Amélioration des styles pour les sections */
        .privacy-section {
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            background-color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .privacy-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .privacy-section h3 {
            color: #0056b3;
            margin-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }

        .contact-details {
            padding: 15px;
            background-color: #f8f9fa;
            border-left: 4px solid #0056b3;
            border-radius: 4px;
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
    <!-- Page Title -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Politique de Confidentialité</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Découvrez comment l'EPH SOBHA collecte,
                utilise et protège vos données personnelles</p>
        </div>
    </section>

    <!-- Politique de Confidentialité Section -->
    <section class="section" id="politique-confidentialite">
        <div class="container">
            <div class="privacy-content">
                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>Introduction</h3>
                    <p>L'Établissement Public Hospitalier SOBHA (ci-après "EPH SOBHA") s'engage à protéger la
                        confidentialité des données personnelles de ses patients et des visiteurs de son site web. La
                        présente politique de confidentialité explique comment nous collectons, utilisons, partageons et
                        protégeons vos informations personnelles conformément à la législation algérienne sur la
                        protection des données.</p>
                    <p>En utilisant notre site web ou en faisant appel à nos services, vous acceptez les pratiques
                        décrites dans cette politique de confidentialité.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>Informations que nous collectons</h3>
                    <p>Nous pouvons collecter les types d'informations suivants :</p>
                    <ul>
                        <li><strong>Informations personnelles d'identification</strong> : nom, prénom, adresse postale,
                            adresse e-mail, numéro de téléphone.</li>
                        <li><strong>Informations médicales</strong> : antécédents médicaux, diagnostics, traitements,
                            résultats d'analyses et autres informations relatives à votre santé nécessaires à votre
                            prise en charge.</li>
                        <li><strong>Informations de navigation</strong> : adresse IP, type de navigateur, pages
                            visitées, date et heure des visites, et autres données techniques collectées automatiquement
                            lorsque vous naviguez sur notre site web.</li>
                        <li><strong>Informations de formulaire de contact</strong> : les données que vous nous
                            fournissez lorsque vous remplissez notre formulaire de contact.</li>
                    </ul>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3>Comment nous utilisons vos informations</h3>
                    <p>Nous utilisons les informations collectées pour :</p>
                    <ul>
                        <li>Assurer votre prise en charge médicale et administrative.</li>
                        <li>Répondre à vos demandes de renseignements.</li>
                        <li>Améliorer nos services et l'expérience utilisateur de notre site web.</li>
                        <li>Vous envoyer des informations importantes concernant nos services, changements à nos
                            conditions et politiques.</li>
                        <li>Se conformer aux obligations légales et réglementaires.</li>
                    </ul>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>Partage des informations</h3>
                    <p>Nous ne vendons, n'échangeons ni ne transférons vos informations personnelles à des tiers sans
                        votre consentement, sauf dans les cas suivants :</p>
                    <ul>
                        <li><strong>Personnel médical</strong> : Vos informations peuvent être partagées avec les
                            professionnels de santé impliqués dans votre prise en charge.</li>
                        <li><strong>Prestataires de services</strong> : Nous pouvons faire appel à des entreprises
                            tierces pour nous aider à exploiter notre site web, à gérer nos activités ou à vous fournir
                            des services. Ces entreprises n'ont accès qu'aux informations personnelles nécessaires pour
                            effectuer leurs tâches et s'engagent à ne pas les divulguer ou les utiliser à d'autres fins.
                        </li>
                        <li><strong>Conformité légale</strong> : Nous pouvons divulguer vos informations personnelles si
                            la loi l'exige ou en réponse à des demandes légitimes des autorités publiques.</li>
                    </ul>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3>Sécurité des données</h3>
                    <p>Nous mettons en œuvre des mesures de sécurité techniques et organisationnelles appropriées pour
                        protéger vos informations personnelles contre la perte, l'accès non autorisé, la divulgation,
                        l'altération et la destruction. Toutefois, aucune méthode de transmission sur Internet ou de
                        stockage électronique n'est totalement sécurisée, et nous ne pouvons garantir une sécurité
                        absolue.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>Conservation des données</h3>
                    <p>Nous conservons vos informations personnelles aussi longtemps que nécessaire pour atteindre les
                        objectifs pour lesquels elles ont été collectées, conformément à nos obligations légales et
                        réglementaires, notamment en matière de dossiers médicaux.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>Cookies et technologies similaires</h3>
                    <p>Notre site web utilise des cookies et technologies similaires pour améliorer votre expérience de
                        navigation. Ces technologies nous permettent de reconnaître votre navigateur et de recueillir
                        des informations telles que votre adresse IP, les pages que vous visitez, le temps passé sur ces
                        pages, et les liens sur lesquels vous cliquez.</p>
                    <p>Vous pouvez configurer votre navigateur pour refuser tous les cookies ou pour être averti
                        lorsqu'un cookie est envoyé. Toutefois, certaines fonctionnalités du site peuvent ne pas
                        fonctionner correctement si vous désactivez les cookies.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3>Vos droits</h3>
                    <p>Conformément à la législation applicable, vous disposez des droits suivants concernant vos
                        données personnelles :</p>
                    <ul>
                        <li>Droit d'accès à vos données personnelles.</li>
                        <li>Droit de rectification des données inexactes.</li>
                        <li>Droit à l'effacement de vos données dans certaines circonstances.</li>
                        <li>Droit à la limitation du traitement dans certaines circonstances.</li>
                        <li>Droit d'opposition au traitement pour des raisons tenant à votre situation particulière.
                        </li>
                        <li>Droit à la portabilité de vos données dans certaines circonstances.</li>
                    </ul>
                    <p>Pour exercer ces droits, veuillez nous contacter aux coordonnées fournies ci-dessous.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>Modifications de notre politique de confidentialité</h3>
                    <p>Nous pouvons modifier cette politique de confidentialité de temps à autre. La date de la dernière
                        mise à jour sera indiquée en bas de cette page. Nous vous encourageons à consulter
                        régulièrement cette politique pour rester informé de la façon dont nous protégeons vos
                        informations.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>Contact</h3>
                    <p>Si vous avez des questions concernant cette politique de confidentialité ou nos pratiques en
                        matière de protection des données, veuillez nous contacter :</p>
                    <div class="contact-details" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="300">
                        <p><strong>EPH SOBHA</strong><br>
                            Commune de Sobha, Wilaya de Chlef, Algérie<br>
                            Téléphone : +213 27 71 91 97<br>
                            Email : contact.ephsobha@gmail.com</p>
                    </div>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>Date de dernière mise à jour</h3>
                    <p>Cette politique de confidentialité a été mise à jour le 01 mai 2025.</p>
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

    <!-- Ajout des scripts JS AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de la bibliothèque AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: false,
                mirror: false,        // Animation se produit une seule fois
                offset: 120,        // Décalage (en px) depuis le point de déclenchement original
                easing: 'ease-out-back' // Type d'effet d'animation
            });
        });
    </script>
</body>

</html>

<?php include('footer.php'); ?>