<?php
include('header.php');
include('db.php');  // Inclusion du fichier de connexion à la base de données
include('actualites-functions.php');

// Vérification de l'ID de l'actualité
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Redirection si l'ID est manquant ou non valide
    header('Location: actualites.php');
    exit;
}

$id = (int) $_GET['id'];

// Récupération de l'actualité depuis la base de données
$sql = "SELECT id, titre, slug, date_publication, image, resume, contenu, langue, statut 
        FROM actualites 
        WHERE id = ? AND statut = 'publie'";

$actualite = db_query_single($sql, [$id]);

// Vérification si l'actualité existe
if (!$actualite) {
    // Redirection si l'actualité n'existe pas
    header('Location: actualites.php');
    exit;
}

// Définir la direction du texte en fonction de la langue UNIQUEMENT pour le contenu
$text_direction = ($actualite['langue'] == 'ar') ? 'rtl' : 'ltr';
$text_align = ($actualite['langue'] == 'ar') ? 'right' : 'left';
?>

<!DOCTYPE html>
<!-- Suppression de dir et lang de l'élément html pour ne pas affecter tout le document -->
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $actualite['titre']; ?> - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        :root {
            --primary-color: #1e88e5;
            --secondary-color: #0d47a1;
            --accent-color: #42a5f5;
            --light-bg: #f5f7fa;
            --dark-bg: #333;
            --text-color: #333;
            --light-text: #fff;
            --border-radius: 8px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--light-bg);
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Classe spécifique pour les contenus en arabe */
        .content-ar {
            direction: rtl;
            text-align: right;
        }

        /* En-tête de l'actualité */
        .actualite-header {
            padding: 50px;
            margin-bottom: 30px;
            text-align:
                <?php echo $text_align; ?>
            ;
        }

        .actualite-meta {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            flex-wrap: wrap;
            justify-content:
                <?php echo $actualite['langue'] == 'ar' ? 'flex-end' : 'flex-start'; ?>
            ;
        }

        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-langue {
            background-color: var(--primary-color);
            color: white;
        }

        .actualite-date {
            color: #777;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .actualite-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            color: var(--dark-bg);
            position: relative;
            padding-bottom: 15px;
        }

        .actualite-title::after {
            content: "";
            position: absolute;
            bottom: 0;
            <?php echo $actualite['langue'] == 'ar' ? 'right' : 'left'; ?>
            : 0;
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        /* Image principale */
        .actualite-image-container {
            margin-bottom: 30px;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            position: relative;
            aspect-ratio: 16/9;
            max-width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        .actualite-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
            cursor: zoom-in;
        }

        .actualite-image-container:hover img {
            transform: scale(1.02);
        }

        /* Contenu principal */
        .actualite-content {
            background-color: #fff;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .actualite-content h2 {
            color: var(--primary-color);
            font-size: 1.8rem;
            margin-top: 30px;
            margin-bottom: 20px;
        }

        .actualite-content h3 {
            color: var(--secondary-color);
            font-size: 1.5rem;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .actualite-content p {
            margin-bottom: 20px;
        }

        .actualite-content img {
            max-width: 100%;
            height: auto;
            border-radius: var(--border-radius);
            margin: 20px 0;
        }

        .actualite-content a {
            color: var(--primary-color);
            text-decoration: none;
            border-bottom: 1px dotted var(--primary-color);
            transition: var(--transition);
        }

        .actualite-content a:hover {
            color: var(--secondary-color);
            border-bottom-color: var(--secondary-color);
        }

        .actualite-content ul,
        .actualite-content ol {
            margin-bottom: 20px;
            padding-<?php echo $actualite['langue'] == 'ar' ? 'right' : 'left'; ?>: 20px;
        }

        .actualite-content li {
            margin-bottom: 10px;
        }

        /* Boutons de partage */
        .share-buttons {
            background-color: #fff;
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-bottom: 30px;
            text-align: center;
        }

        .share-buttons h4 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: #555;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            gap: 8px;
        }

        .btn-facebook {
            background-color: #3b5998;
            color: white;
        }

        .btn-twitter {
            background-color: #1da1f2;
            color: white;
        }

        .btn-whatsapp {
            background-color: #25d366;
            color: white;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Bouton retour */
        .back-button {
            text-align: center;
            margin-bottom: 40px;
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Actualités connexes */
        .related-news {
            background-color: #fff;
            padding: 50px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 40px;
            color: var(--dark-bg);
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .related-news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .related-news-card {
            background-color: #fff;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .related-news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .related-news-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .related-news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .related-news-card:hover .related-news-image img {
            transform: scale(1.05);
        }

        .related-news-details {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .related-news-date {
            color: #777;
            font-size: 0.9rem;
            margin-bottom: 10px;
            display: block;
        }

        .related-news-title {
            font-size: 1.2rem;
            margin: 0 0 15px;
            line-height: 1.4;
            flex-grow: 1;
        }

        .related-news-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: auto;
            transition: var(--transition);
        }

        .related-news-link:hover {
            color: var(--secondary-color);
        }

        .related-news-link i {
            font-size: 0.8rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .actualite-header {
                margin-top: 30px;
            }

            .actualite-title {
                font-size: 1.8rem;
            }

            .related-news-grid {
                grid-template-columns: 1fr;
            }

            .buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 250px;
            }
        }

        /* Effet de zoom pour les images */
        .zoomable-img {
            cursor: zoom-in;
        }

        /* Modal pour l'affichage de l'image en plein écran */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 1;
        }

        .modal-content {
            max-width: 90%;
            max-height: 90%;
            animation: zoom 0.3s ease;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
            z-index: 1001;
            /* S'assurer que le bouton de fermeture est au-dessus */
        }

        .close:hover {
            color: var(--accent-color);
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        [dir="rtl"] .close {
            right: auto;
            left: 20px;
        }

        .actualite-content .content-text {
            white-space: pre-wrap;
            /* Préserve les espaces et les retours à la ligne */
            word-wrap: break-word;
            /* Permet au texte de se couper correctement */
            overflow-wrap: break-word;
            /* Alternative moderne à word-wrap */
            line-height: 1.8;
            /* Espace entre les lignes pour une meilleure lisibilité */
            max-width: 100%;
            /* Assure que le contenu ne dépasse pas son conteneur */
        }

        .actualite-content p {
            margin-bottom: 1.0em;
            /* Espace entre les paragraphes */
        }

        .actualite-content img {
            max-width: 100%;
            /* Empêche les images de déborder */
            height: auto;
            display: block;
            /* Élimine l'espace sous l'image */
            margin: 1.5em auto;
            /* Centrage et marge verticale */
        }

        /* Style spécifique pour le contenu en arabe */
        [dir="rtl"] .actualite-content .content-text {
            text-align: right;
        }
    </style>
</head>

<body>
    <!-- Contenu principal de l'actualité -->
    <section class="actualite-detail-section">
        <!-- Appliquer la classe content-ar uniquement au contenu qui nécessite la direction RTL -->
        <div class="container <?php echo $actualite['langue'] == 'ar' ? 'content-ar' : ''; ?>">
            <!-- En-tête de l'actualité -->
            <div class="actualite-header" data-aos="fade-up">
                <div class="actualite-meta">
                    <span class="actualite-date">
                        <i class="far fa-calendar-alt"></i>
                        <?php echo format_date($actualite['date_publication'], $actualite['langue']); ?>
                    </span>
                </div>
                <h1 class="actualite-title"><?php echo h($actualite['titre']); ?></h1>
            </div>

            <!-- Image principale -->
            <?php if (!empty($actualite['image'])): ?>
                <div class="actualite-image-container" data-aos="fade-up">
                    <img src="uploads/actualites/<?php echo $actualite['image']; ?>"
                        alt="<?php echo h($actualite['titre']); ?>" class="zoomable-img">
                </div>
            <?php endif; ?>

            <!-- Contenu principal -->
            <div class="actualite-content" data-aos="fade-up">
                <!-- Appliquer dir et style pour assurer le bon affichage du contenu -->
                <div class="content-text" <?php echo $actualite['langue'] == 'ar' ? 'dir="rtl"' : ''; ?>>
                    <?php
                    // Assurer que le contenu respecte les retours à la ligne
                    $content = nl2br($actualite['contenu']);

                    // Si le contenu n'est pas déjà formaté avec des balises HTML
                    if (strip_tags($content) == $actualite['contenu']) {
                        // Envelopper les paragraphes (séparés par des lignes vides) avec des balises <p>
                        $content = '<p>' . str_replace("\n\n", '</p><p>', $content) . '</p>';
                        // Nettoyer les paragraphes vides
                        $content = str_replace('<p></p>', '', $content);
                    }

                    echo $content;
                    ?>
                </div>
            </div>

            <!-- Boutons de partage -->
            <div class="share-buttons" data-aos="fade-up">
                <h4><?php echo ($actualite['langue'] == 'fr') ? 'Partagez cette actualité' : 'شارك هذا الخبر'; ?></h4>
                <div class="buttons">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(SITE_URL . '/actualite-detail.php?id=' . $actualite['id']); ?>"
                        target="_blank" class="btn btn-facebook">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(SITE_URL . '/actualite-detail.php?id=' . $actualite['id']); ?>&text=<?php echo urlencode($actualite['titre']); ?>"
                        target="_blank" class="btn btn-twitter">
                        <i class="fab fa-twitter"></i> Twitter
                    </a>
                    <a href="https://wa.me/?text=<?php echo urlencode($actualite['titre'] . ' - ' . SITE_URL . '/actualite-detail.php?id=' . $actualite['id']); ?>"
                        target="_blank" class="btn btn-whatsapp">
                        <i class="fab fa-whatsapp"></i> WhatsApp
                    </a>
                </div>
            </div>

            <!-- Bouton retour à la liste -->
            <div class="back-button" data-aos="fade-up">
                <a href="actualites.php" class="btn btn-outline">
                    <?php if ($actualite['langue'] == 'fr'): ?>
                        <i class="fas fa-arrow-left"></i> Retour à la liste des actualités
                    <?php else: ?>
                        <i class="fas fa-arrow-right"></i> العودة إلى قائمة الأخبار
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Actualités connexes -->
    <section class="related-news">
        <div class="container <?php echo $actualite['langue'] == 'ar' ? 'content-ar' : ''; ?>">
            <h2 class="section-title" data-aos="fade-up">
                <?php echo ($actualite['langue'] == 'fr') ? 'Actualités connexes' : 'أخبار ذات صلة'; ?>
            </h2>

            <div class="related-news-grid">
                <?php
                // Récupération des actualités connexes (même langue, hors actualité courante)
                $sql_related = "SELECT id, titre, image, resume, date_publication, langue
                                FROM actualites 
                                WHERE langue = ? AND id != ? AND statut = 'publie' 
                                ORDER BY date_publication DESC 
                                LIMIT 3";

                $related_news = db_query($sql_related, [$actualite['langue'], $id]);

                foreach ($related_news as $index => $news):
                    ?>
                    <div class="related-news-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                        <div class="related-news-image">
                            <img src="uploads/actualites/<?php echo $news['image']; ?>"
                                alt="<?php echo h($news['titre']); ?>">
                        </div>
                        <div class="related-news-details">
                            <span class="related-news-date">
                                <i class="far fa-calendar-alt"></i>
                                <?php echo format_date($news['date_publication'], $news['langue']); ?>
                            </span>
                            <h3 class="related-news-title"><?php echo h($news['titre']); ?></h3>
                            <p class="related-news-excerpt"><?php echo substr(h($news['resume']), 0, 100) . '...'; ?></p>
                            <a href="actualite-detail.php?id=<?php echo $news['id']; ?>" class="related-news-link">
                                <?php if ($news['langue'] == 'fr'): ?>
                                    Lire la suite <i class="fas fa-arrow-right"></i>
                                <?php else: ?>
                                    اقرأ المزيد <i class="fas fa-arrow-left"></i>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <!-- Modal pour l'affichage de l'image en plein écran -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialiser AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: false,
                mirror: false,
                offset: 120,
                easing: 'ease-out-back',
                duration: 800
            });

            // Script pour le bouton de retour en haut
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

            // Modal pour les images zoomables
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const closeBtn = document.getElementsByClassName('close')[0];
            const zoomableImgs = document.querySelectorAll('.zoomable-img');

            zoomableImgs.forEach(img => {
                img.addEventListener('click', function () {
                    modal.classList.add('show');
                    modalImg.src = this.src;
                });
            });

            closeBtn.addEventListener('click', function () {
                modal.classList.remove('show');
            });

            // Fermer le modal en cliquant n'importe où
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    modal.classList.remove('show');
                }
            });

            // Fermer le modal avec la touche Echap
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && modal.classList.contains('show')) {
                    modal.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>

<?php include('footer.php'); ?>