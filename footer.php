<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h3>EPH SOBHA</h3>
                <p>Établissement Public Hospitalier dédié à fournir des soins médicaux de qualité pour tous les
                    citoyens.</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/ephsobha.sante" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Liens Rapides</h3>
                <ul class="footer-links">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="services.php">Nos Services</a></li>
                    <li><a href="about.php">À Propos</a></li>
                    <li><a href="recrutement.php">Recrutement</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Services</h3>
                <ul class="footer-links">
                    <li><a href="urgences.php">Urgences Médico-Chirurgicales</a></li>
                    <li><a href="med-interne.php">Médecine Interne</a></li>
                    <li><a href="chirurgie.php">Chirurgie Générale</a></li>
                    <li><a href="pediatrie.php">Pédiatrie</a></li>
                    <li><a href="maternite.php">Maternité</a></li>
                    <li><a href="dialyse.php">Hémodialyse</a></li>
                    <li><a href="pneumo.php">Pneumologie-Phthisiologie</a></li>
                    <li><a href="radio.php">Radiologie</a></li>
                    <li><a href="labo.php">Laboratoire</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Informations</h3>
                <ul class="footer-links">
                    <li><a href="charte.php">Charte du Patient</a></li>
                    <li><a href="visite.php">Heures de visite</a></li>
                    <li><a href="actualites.php">Actualités</a></li>
                    <li><a href="annuaire.php">Annuaire</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="confidentialite.php">Politique de confidentialité</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $hospital_name; ?>. Tous droits réservés.</p>
            </div>
            <div class="developer-info">
                <p>Conception & Développement: <a href="https://tahardjebbar.onrender.com" target="_blank"
                        rel="noopener">TAHAR-DJEBBAR MOHAMED <i class="fas fa-code"></i></a></p>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .copyright p,
    .developer-info p {
        margin: 0;
        font-size: 0.9em;
    }

    .developer-info a {
        font-weight: 500;
        color: #4a8eff;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .developer-info a:hover {
        color: #ffffff;
        transform: translateY(-1px);
    }

    .developer-info i {
        margin-left: 5px;
        font-size: 0.9em;
        color: inherit;
    }

    /* Responsive adjustment */
    @media (max-width: 768px) {
        .footer-bottom {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }
    }
</style>

<script>
    // Mobile menu toggle
    document.querySelector('.mobile-menu-btn').addEventListener('click', function () {
        document.querySelector('.nav-menu').classList.toggle('active');
    });

    // Smooth scrolling for anchors
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });

            // Close mobile menu after click
            document.querySelector('.nav-menu').classList.remove('active');
        });
    });
</script>
<script>
    // Bouton flottant pour l'assistant IA
    document.addEventListener('DOMContentLoaded', function () {
        // Créer le bouton flottant
        const floatingButton = document.createElement('div');
        floatingButton.className = 'ia-floating-button';
        floatingButton.innerHTML = `
        <i class="fas fa-robot"></i>
        <span class="ia-floating-tooltip">Votre Assistant médical IA</span>
    `;

        // Masquer le bouton initialement
        floatingButton.style.opacity = '0';
        floatingButton.style.visibility = 'hidden';
        floatingButton.style.transition = 'opacity 0.3s, visibility 0.3s';

        // Ajouter au body
        document.body.appendChild(floatingButton);

        // Définir le seuil de défilement (en pixels) à partir duquel le bouton apparaît
        const scrollThreshold = 300;

        // Fonction pour gérer l'affichage du bouton lors du défilement
        function handleScroll() {
            if (window.scrollY > scrollThreshold) {
                floatingButton.style.opacity = '1';
                floatingButton.style.visibility = 'visible';

                // Ajouter l'animation de pulsation une fois le bouton visible
                if (!floatingButton.style.animation) {
                    floatingButton.style.animation = 'pulse 2s infinite';
                }
            } else {
                floatingButton.style.opacity = '0';
                floatingButton.style.visibility = 'hidden';
            }
        }

        // Vérifier la position de défilement au chargement
        handleScroll();

        // Ajouter l'écouteur d'événement de défilement
        window.addEventListener('scroll', handleScroll);

        // Ajouter l'événement de clic
        floatingButton.addEventListener('click', function () {
            // Rediriger vers la page de l'assistant IA
            window.location.href = 'assistant.php';
        });
    });
</script>
</body>

</html>