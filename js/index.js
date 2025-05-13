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




// Initialiser la carte quand la page est chargée
document.addEventListener('DOMContentLoaded', function () {
    // Initialiser AOS
    AOS.init({
        once: false,
        mirror: false,        // Animation se produit une seule fois
        offset: 120,        // Décalage (en px) depuis le point de déclenchement original
        easing: 'ease-out-back' // Type d'effet d'animation
    });
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
});

// Slider ultra-moderne pour la section Hero
document.addEventListener('DOMContentLoaded', function () {
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slider .slide');
    const dots = document.querySelectorAll('.hero-slider .dot');
    const prevBtn = document.querySelector('.hero-slider .arrow.prev');
    const nextBtn = document.querySelector('.hero-slider .arrow.next');
    const progressBar = document.querySelector('.hero-slider .progress-bar');
    const currentCounter = document.querySelector('.slide-counter-current');
    const slideCount = slides.length;
    let slideInterval;
    const intervalTime = 7000; // 7 secondes par slide
    let isAnimating = false;
    let progressAnimationFrame = null;

    // Initialiser le slider
    function initSlider() {
        updateSlideCounter(1);
        startProgressBar();
        startSlideTimer();

        // Appliquer des délais d'animation différents à chaque dot
        dots.forEach((dot, index) => {
            dot.style.transitionDelay = `${index * 0.1}s`;
        });
    }

    // Fonction pour afficher un slide spécifique
    function showSlide(index) {
        // Éviter les clics multiples pendant l'animation
        if (isAnimating) return;
        isAnimating = true;

        // Gérer les indices hors limites
        if (index < 0) index = slideCount - 1;
        if (index >= slideCount) index = 0;

        // Définir les classes pour l'animation
        const direction = index > currentSlide ? 'next' : 'prev';

        // Marquer le slide actuel
        slides.forEach(slide => {
            slide.classList.remove('active', 'prev', 'next');
        });

        dots.forEach(dot => dot.classList.remove('active'));

        // Définir le slide précédent
        slides[currentSlide].classList.add(direction === 'next' ? 'prev' : 'next');

        // Activer le nouveau slide
        slides[index].classList.add('active');
        dots[index].classList.add('active');

        // Mettre à jour le compteur de slides
        updateSlideCounter(index + 1);

        // Mettre à jour l'index du slide actuel
        currentSlide = index;

        // Réinitialiser la barre de progression
        resetProgressBar();

        // Réinitialiser le timer pour maintenir la cohérence
        resetTimer();

        // Permettre de nouvelles animations après un délai
        setTimeout(() => {
            isAnimating = false;
        }, 1200); // Correspond à la durée de transition
    }

    // Mettre à jour le compteur de slides
    function updateSlideCounter(current) {
        currentCounter.textContent = current < 10 ? `0${current}` : current;
    }

    // Fonction pour passer au slide suivant
    function nextSlide() {
        showSlide((currentSlide + 1) % slideCount);
    }

    // Fonction pour passer au slide précédent
    function prevSlide() {
        showSlide((currentSlide - 1 + slideCount) % slideCount);
    }

    // Démarrer le timer pour le changement automatique de slide
    function startSlideTimer() {
        if (slideInterval) {
            clearInterval(slideInterval);
        }
        slideInterval = setInterval(() => {
            if (!isAnimating) {
                nextSlide();
            }
        }, intervalTime);
    }

    // Réinitialiser le timer quand l'utilisateur interagit
    function resetTimer() {
        if (slideInterval) {
            clearInterval(slideInterval);
        }
        startSlideTimer();
    }

    // Démarrer la barre de progression
    function startProgressBar() {
        // Annuler l'animation précédente si elle existe
        if (progressAnimationFrame) {
            cancelAnimationFrame(progressAnimationFrame);
        }

        progressBar.style.width = '0';

        // Utiliser requestAnimationFrame pour une animation plus fluide
        const startTime = performance.now();

        const animate = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / intervalTime, 1);
            progressBar.style.width = `${progress * 100}%`;

            if (progress < 1 && !isAnimating) {
                progressAnimationFrame = requestAnimationFrame(animate);
            }
        };

        progressAnimationFrame = requestAnimationFrame(animate);
    }

    // Réinitialiser la barre de progression
    function resetProgressBar() {
        if (progressAnimationFrame) {
            cancelAnimationFrame(progressAnimationFrame);
            progressAnimationFrame = null;
        }

        progressBar.style.transition = 'none';
        progressBar.style.width = '0';

        // Forcer un reflow pour que la transition fonctionne correctement
        void progressBar.offsetWidth;

        progressBar.style.transition = 'width 0.1s linear';
        startProgressBar();
    }

    // Ajouter les événements touch pour le swipe mobile
    let touchStartX = 0;
    let touchEndX = 0;
    const heroSlider = document.querySelector('.hero-slider');

    heroSlider.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, false);

    heroSlider.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, false);

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe gauche (suivant)
            nextSlide();
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe droite (précédent)
            prevSlide();
        }
    }

    // Faire correspondre la hauteur du slider à la fenêtre
    function adjustSliderHeight() {
        const windowHeight = window.innerHeight;
        const headerHeight = document.querySelector('header').offsetHeight;
        const navHeight = document.querySelector('nav').offsetHeight;
        const minHeight = 500; // Hauteur minimale pour les petits écrans

        // Calcul de la hauteur optimale (85% de la hauteur visible après le header et nav)
        const optimalHeight = Math.max(minHeight, (windowHeight - (headerHeight + navHeight)) * 0.85);

        heroSlider.style.height = `${optimalHeight}px`;
    }

    // Ajuster la hauteur au chargement et au redimensionnement
    window.addEventListener('resize', adjustSliderHeight);
    adjustSliderHeight();

    // Ajouter les événements click pour les flèches
    prevBtn.addEventListener('click', () => {
        prevSlide();
    });

    nextBtn.addEventListener('click', () => {
        nextSlide();
    });

    // Ajouter des événements click sur les points de navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            if (currentSlide !== index && !isAnimating) {
                showSlide(index);
            }
        });
    });

    // Ajouter la navigation par touche gauche/droite du clavier
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
        }
    });

    // Animation de focus pour le slide actif lors du défilement
    window.addEventListener('scroll', () => {
        const sliderRect = heroSlider.getBoundingClientRect();
        const slideActive = document.querySelector('.slide.active');

        if (sliderRect.top < 0 && sliderRect.bottom > 0) {
            const scrollProgress = Math.abs(sliderRect.top) / (sliderRect.height / 2);
            const scale = Math.max(1, 1 + (scrollProgress * 0.1));
            if (slideActive) {
                slideActive.querySelector('.slide-bg').style.transform = `scale(${scale})`;
            }
        }
    });

    // Précharger toutes les images au démarrage
    slides.forEach(slide => {
        const bgElement = slide.querySelector('.slide-bg');
        if (bgElement) {
            const bgUrl = window.getComputedStyle(bgElement).backgroundImage;
            if (bgUrl && bgUrl !== 'none') {
                const img = new Image();
                img.src = bgUrl.replace(/url\(['"]?(.*?)['"]?\)/i, '$1');
            }
        }
    });

    // Initialiser le slider
    initSlider();
});

document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour animer l'incrémentation des nombres
    function animateStats() {
        const stats = document.querySelectorAll('.stat-number');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const finalValue = parseInt(target.getAttribute('data-count'));

                    // Configurer la durée en fonction de la taille du nombre
                    const duration = finalValue > 1000 ? 2000 : 1500;

                    // Calculer l'incrément pour avoir une animation fluide
                    const steps = 50;
                    const increment = finalValue / steps;
                    let current = 0;

                    // Fonction pour mettre à jour le compteur
                    const updateCounter = () => {
                        current += increment;
                        if (current < finalValue) {
                            // Formater avec séparateur de milliers
                            target.innerText = Math.floor(current).toLocaleString('fr-FR');
                            setTimeout(updateCounter, duration / steps);
                        } else {
                            target.innerText = finalValue.toLocaleString('fr-FR');
                        }
                    };

                    // Démarrer l'animation
                    updateCounter();

                    // Désabonner l'observateur une fois l'animation démarrée
                    observer.unobserve(target);
                }
            });
        }, { threshold: 0.1 });

        // Observer chaque élément stat-number
        stats.forEach(stat => {
            observer.observe(stat);
        });
    }

    // Activer l'animation au chargement de la page
    animateStats();
});
