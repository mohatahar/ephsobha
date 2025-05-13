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
    <title>Foire Aux Questions - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Intégration de la bibliothèque AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/faq.jpeg');
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

        /* Styles spécifiques pour la page FAQ */
        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .faq-item {
            margin-bottom: 25px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background-color: #e9ecef;
        }

        .faq-question h3 {
            margin: 0;
            font-size: 1.1rem;
            color: #1a5276;
        }

        .faq-answer {
            display: none;
            padding: 15px;
            line-height: 1.6;
        }

        .faq-answer.show {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        .faq-toggle {
            font-size: 1.2rem;
            color: #1a5276;
            transition: transform 0.3s ease;
        }

        .faq-question.active .faq-toggle {
            transform: rotate(180deg);
        }

        .faq-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }

        .faq-category {
            padding: 8px 15px;
            background-color: #e9ecef;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .faq-category:hover,
        .faq-category.active {
            background-color: #1a5276;
            color: white;
        }

        .faq-search {
            width: 100%;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 30px;
            font-size: 1rem;
        }

        .faq-intro {
            text-align: center;
            margin-bottom: 30px;
        }

        .faq-intro h2 {
            color: #1a5276;
            margin-bottom: 10px;
        }

        .faq-intro p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        .faq-contact {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation supplémentaire pour le titre */
        .highlight-text {
            position: relative;
            display: inline-block;
        }

        .highlight-text::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            bottom: -5px;
            left: 0;
            background-color: #fff;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.5s ease-out;
        }

        .highlight-text.active::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        @media (max-width: 768px) {
            .faq-categories {
                flex-direction: column;
                gap: 5px;
            }

            .faq-category {
                text-align: center;
            }
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
            <h1 data-aos="fade-down" data-aos-duration="1000">Foire Aux Questions</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Trouvez les réponses aux questions les
                plus fréquemment posées sur l'EPH SOBHA</p>
        </div>
    </section>


    <!-- FAQ Section -->
    <section class="section" id="faq">
        <div class="container">
            <div class="faq-intro" data-aos="fade-up" data-aos-duration="800">
                <h2>Questions Fréquemment Posées</h2>
                <p>Trouvez des réponses aux questions les plus courantes concernant nos services, procédures et
                    politiques à l'EPH SOBHA.</p>
            </div>

            <div class="faq-container">
                <!-- Barre de recherche -->
                <input type="text" class="faq-search" id="faqSearch" placeholder="Rechercher une question..."
                    data-aos="fade-in" data-aos-duration="800">

                <!-- Catégories de FAQ -->
                <div class="faq-categories" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                    <div class="faq-category active" data-category="all">Toutes les questions</div>
                    <div class="faq-category" data-category="admission">Admission & Séjour</div>
                    <div class="faq-category" data-category="services">Services & Soins</div>
                    <div class="faq-category" data-category="visites">Visites & Accompagnement</div>
                    <div class="faq-category" data-category="administratif">Démarches administratives</div>
                </div>

                <!-- Liste des questions -->
                <div class="faq-list">
                    <!-- Admission & Séjour -->
                    <div class="faq-item" data-category="admission" data-aos="fade-up" data-aos-delay="100"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Comment se déroule une admission à l'EPH SOBHA ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Pour une admission programmée, veuillez vous présenter au bureau des admissions avec :
                            </p>
                            <ul>
                                <li>Votre carte d'identité nationale</li>
                                <li>Votre carte Chifa (sécurité sociale) ou autre assurance</li>
                            </ul>
                            <p>Le bureau des admissions est ouvert 24h/24 et 7j/7.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="admission" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Quels objets dois-je apporter pour mon hospitalisation ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Pour votre confort durant l'hospitalisation, nous vous recommandons d'apporter :</p>
                            <ul>
                                <li>Vêtements de nuit et robe de chambre</li>
                                <li>Pantoufles et chaussettes</li>
                                <li>Articles de toilette personnels (savon, brosse à dents, dentifrice, etc.)</li>
                                <li>Lunettes, appareils auditifs ou prothèses dentaires si nécessaire</li>
                                <li>Vos médicaments habituels dans leur emballage d'origine</li>
                            </ul>
                            <p>Nous vous déconseillons d'apporter des objets de valeur ou de grandes sommes d'argent.
                                L'hôpital ne pourra être tenu responsable en cas de perte ou de vol.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="admission" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Quels sont les horaires des repas à l'hôpital ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Les repas sont servis aux horaires suivants :</p>
                            <ul>
                                <li>Petit-déjeuner : 7h00 - 8h00</li>
                                <li>Déjeuner : 12h00 - 13h00</li>
                                <li>Dîner : 18h00 - 19h00</li>
                            </ul>
                            <p>Des régimes alimentaires spécifiques peuvent être prescrits selon votre état de santé.
                                N'hésitez pas à signaler toute allergie ou intolérance alimentaire au personnel
                                soignant.</p>
                        </div>
                    </div>

                    <!-- Services & Soins -->
                    <div class="faq-item" data-category="services" data-aos="fade-up" data-aos-delay="150"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Quels services sont disponibles en cas d'urgence ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Notre service d'urgence est ouvert 24h/24 et 7j/7 pour tous types d'urgences médicales et
                                chirurgicales. Il dispose de:</p>
                            <ul>
                                <li>Un accueil et triage immédiat par un médecin</li>
                                <li>Des équipes médicales et paramédicales disponibles en permanence</li>
                                <li>Des salles d'observation et de soins intensifs</li>
                                <li>Un accès rapide aux services d'imagerie et de laboratoire</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item" data-category="services" data-aos="fade-up" data-aos-delay="250"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Comment fonctionne le service d'hémodialyse ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Notre centre d'hémodialyse offre un traitement de substitution rénale aux patients
                                souffrant d'insuffisance rénale chronique. Le service fonctionne en trois sessions
                                quotidiennes :</p>
                            <ul>
                                <li>7h00 - 11h00</li>
                                <li>12h00 - 16h00</li>
                                <li>17h00 - 21h00</li>
                            </ul>
                            <p>Pour les patients réguliers, un planning personnalisé est établi selon les besoins
                                médicaux, généralement à raison de trois séances par semaine. L'accès au service se fait
                                sur prescription médicale et après évaluation par nos néphrologues.</p>
                        </div>
                    </div>

                    <!-- Visites & Accompagnement -->
                    <div class="faq-item" data-category="visites" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Quels sont les horaires de visite ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Les horaires de visite sont :</p>
                            <ul>
                                <li>Services généraux : 13h00 - 15h00 tous les jours</li>
                                <li>Pédiatrie : 10h00 - 12h00 et 15h00 - 17h00 (parents uniquement)</li>
                                <li>Maternité : 13h00 - 15h00 (conjoint et famille proche)</li>
                            </ul>
                            <p>Pour le bien-être des patients, nous demandons aux visiteurs de :</p>
                            <ul>
                                <li>Limiter le nombre de visiteurs à deux personnes par patient</li>
                                <li>Respecter le repos des patients</li>
                                <li>Ne pas apporter de fleurs ou plantes dans les chambres</li>
                                <li>Ne pas venir en cas de symptômes infectieux (rhume, grippe, etc.)</li>
                            </ul>
                            <p>Les horaires peuvent être adaptés selon l'état de santé du patient ou en cas de
                                situations exceptionnelles.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="visites" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Un membre de ma famille peut-il rester avec moi pendant mon hospitalisation ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Dans certains cas, un accompagnant peut être autorisé à rester auprès du patient :</p>
                            <ul>
                                <li>Pour les enfants hospitalisés en pédiatrie (un parent)</li>
                                <li>Pour les patients âgés ou dépendants</li>
                                <li>Pour les patients en soins palliatifs</li>
                            </ul>
                            <p>L'autorisation doit être demandée auprès du personnel soignant du service concerné. Un
                                fauteuil accompagnant pourra être fourni selon disponibilité. L'accompagnant doit
                                respecter les règles d'hygiène et le fonctionnement du service.</p>
                        </div>
                    </div>

                    <!-- Démarches administratives -->
                    <div class="faq-item" data-category="administratif" data-aos="fade-up" data-aos-delay="250"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Comment obtenir un certificat médical ou un arrêt de travail ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Les certificats médicaux ou arrêts de travail sont délivrés :</p>
                            <ul>
                                <li>Lors de votre consultation ou hospitalisation par le médecin qui vous suit</li>
                                <li>Pour les prolongations d'arrêt de travail, une consultation préalable est nécessaire
                                </li>
                            </ul>
                            <p>Si vous avez besoin d'un duplicata, vous pouvez en faire la demande auprès du secrétariat
                                médical du service concerné en présentant une pièce d'identité.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="administratif" data-aos="fade-up" data-aos-delay="350"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>Quels sont les documents nécessaires pour une hospitalisation ?</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>Pour une hospitalisation à l'EPH SOBHA, veuillez vous munir des documents suivants :</p>
                            <ul>
                                <li>Carte d'identité nationale</li>
                                <li>Carte Chifa (sécurité sociale) ou autre assurance</li>
                                <li>Lettre d'orientation du médecin prescripteur</li>
                                <li>Résultats d'examens médicaux antérieurs (si disponibles)</li>
                                <li>Liste des médicaments que vous prenez actuellement</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Section de contact supplémentaire -->
                <div class="faq-contact" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <h3>Vous n'avez pas trouvé votre réponse ?</h3>
                    <p>N'hésitez pas à nous contacter directement :</p>
                    <p><i class="fas fa-phone"></i> +213 27 71 91 97</p>
                    <p><i class="fas fa-envelope"></i> contact.ephsobha@gmail.com</p>
                    <a href="index.php#contact" class="btn btn-primary">Contactez-nous</a>
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
    <!-- Intégration du script AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialisation de AOS
            AOS.init({
                once: false,
                mirror: false,        // Animation se produit une seule fois
                offset: 120,        // Décalage (en px) depuis le point de déclenchement original
                easing: 'ease-out-back'
            });

            // Animation du titre avec effet de soulignement
            setTimeout(function () {
                document.querySelector('.highlight-text').classList.add('active');
            }, 1000);

            // Fonctionnalité d'accordéon pour les questions/réponses
            const questions = document.querySelectorAll('.faq-question');

            questions.forEach(question => {
                question.addEventListener('click', function () {
                    const answer = this.nextElementSibling;
                    const isOpen = answer.classList.contains('show');

                    // Fermer toutes les réponses
                    document.querySelectorAll('.faq-answer').forEach(item => {
                        item.classList.remove('show');
                    });

                    document.querySelectorAll('.faq-question').forEach(item => {
                        item.classList.remove('active');
                    });

                    // Ouvrir la réponse cliquée si elle était fermée
                    if (!isOpen) {
                        answer.classList.add('show');
                        this.classList.add('active');
                    }
                });
            });

            // Filtrage par catégorie
            const categoryButtons = document.querySelectorAll('.faq-category');
            const faqItems = document.querySelectorAll('.faq-item');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const category = this.getAttribute('data-category');

                    // Activer le bouton de catégorie cliqué
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filtrer les éléments FAQ
                    faqItems.forEach(item => {
                        if (category === 'all' || item.getAttribute('data-category') === category) {
                            item.style.display = 'block';
                            // Réactivation des animations AOS pour les éléments filtrés
                            setTimeout(() => {
                                AOS.refresh();
                            }, 100);
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Fonctionnalité de recherche
            const searchInput = document.getElementById('faqSearch');

            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();

                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
                    const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Réinitialiser les catégories
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                document.querySelector('.faq-category[data-category="all"]').classList.add('active');

                // Rafraîchir AOS après la recherche
                setTimeout(() => {
                    AOS.refresh();
                }, 100);
            });
        });
    </script>

</body>

</html>

<?php include('footer.php'); ?>