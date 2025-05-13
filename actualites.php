<?php
include('header.php');
include('db.php');  // Inclusion du fichier de connexion à la base de données
include('actualites-functions.php');  // Inclusion des fonctions spécifiques aux actualités

// Configuration de base depuis config.php (déjà inclus dans db.php)
$hospital_name = SITE_NAME;
$tagline = SITE_TAGLINE;

// Récupération du numéro de page à partir des paramètres GET
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

// Récupération des actualités avec pagination
$result = get_actualites($page, ITEMS_PER_PAGE);
$actualites = $result['actualites'];
$pagination = $result['pagination'];

// Récupérer les années et les IDs de leurs dernières actualités
function get_year_markers()
{
    $sql = "SELECT 
                YEAR(a1.date_publication) as year,
                a1.id as last_id
            FROM 
                actualites a1
            INNER JOIN (
                SELECT 
                    YEAR(date_publication) as year,
                    MAX(date_publication) as max_date
                FROM 
                    actualites
                WHERE 
                    statut = 'publie'
                GROUP BY 
                    YEAR(date_publication)
            ) a2 ON YEAR(a1.date_publication) = a2.year AND a1.date_publication = a2.max_date
            WHERE 
                a1.statut = 'publie'
            ORDER BY 
                a1.date_publication DESC";

    return db_query($sql);
}

$year_markers = get_year_markers();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hospital_name; ?> - Actualités</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
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
            --timeline-color: #0077b6;
            --timeline-dot-color: #00b4d8;
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/actualites.jpeg');
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

        /* Section des actualités */
        .actualites-section {
            padding: 0px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
            font-weight: 700;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background-color: var(--accent-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title p {
            color: #666;
            margin-top: 15px;
            font-size: 1.1rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Timeline et cartes d'actualités */
        .timeline-container {
            display: flex;
            position: relative;
            margin: 40px 0;
        }

        /* Timeline à gauche */
        .timeline {
            position: relative;
            width: 80px;
            padding-right: 30px;
            flex-shrink: 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            right: 15px;
            width: 3px;
            background-color: var(--timeline-color);
        }

        .timeline-year {
            position: absolute;
            background-color: var(--primary-color);
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.9rem;
            text-align: center;
            z-index: 1;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        /* Contenu principal avec les cartes */
        .actualites-content {
            flex-grow: 1;
        }

        /* Cartes d'actualités */
        .actualite-card {
            display: flex;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: var(--card-shadow);
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 1000px;
        }

        .actualite-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .actualite-card::before {
            content: '';
            position: absolute;
            top: 50%;
            left: -32px;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            background-color: var(--timeline-dot-color);
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 0 0 3px var(--timeline-color);
            z-index: 2;
        }

        .actualite-image {
            width: 30%;
            min-width: 200px;
            position: relative;
            overflow: hidden;
        }

        .actualite-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .actualite-card:hover .actualite-image img {
            transform: scale(1.1);
        }

        .actualite-details {
            padding: 25px;
            width: 70%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* Style spécifique pour le texte arabe */
        .actualite-card.ar .actualite-details {
            direction: rtl;
            text-align: right;
        }

        .actualite-date {
            font-size: 0.9rem;
            color: var(--accent-color);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .actualite-card.ar .actualite-date {
            justify-content: flex-end;
        }

        .actualite-date i {
            margin-right: 8px;
        }

        .actualite-card.ar .actualite-date i {
            margin-right: 0;
            margin-left: 8px;
        }

        .actualite-title {
            font-size: 1.6rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark-color);
            transition: color 0.3s ease;
        }

        .actualite-card:hover .actualite-title {
            color: var(--primary-color);
        }

        .actualite-resume {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .actualite-link {
            align-self: flex-start;
            background-color: var(--primary-color);
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .actualite-card.ar .actualite-link {
            align-self: flex-end;
        }

        .actualite-link i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .actualite-card.ar .actualite-link i.fa-arrow-right {
            margin-left: 0;
            margin-right: 8px;
            transform: rotate(180deg);
        }

        .actualite-link:hover {
            background-color: var(--accent-color);
        }

        .actualite-link:hover i {
            transform: translateX(5px);
        }

        .actualite-card.ar .actualite-link:hover i.fa-arrow-right {
            transform: rotate(180deg) translateX(5px);
        }

        /* Badge pour indiquer qu'il n'y a pas de détails */
        .no-details-badge {
            background-color: var(--warning-color);
            color: white;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            margin-right: 10px;
            vertical-align: middle;
        }

        .actualite-card.ar .no-details-badge {
            margin-right: 0;
            margin-left: 10px;
        }

        .no-details-badge i {
            margin-right: 5px;
            font-size: 0.7rem;
        }

        .actualite-card.ar .no-details-badge i {
            margin-right: 0;
            margin-left: 5px;
        }

        /* Pagination styles */
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px 0;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: white;
        }

        .pagination li {
            border-right: 1px solid #eee;
        }

        .pagination li:last-child {
            border-right: none;
        }

        .pagination li a,
        .pagination li span {
            color: var(--dark-color);
            padding: 12px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            min-width: 45px;
            font-weight: 500;
        }

        .pagination li a:hover {
            background-color: rgba(0, 119, 182, 0.1);
            color: var(--primary-color);
        }

        .pagination li.active span {
            background-color: var(--primary-color);
            color: white;
        }

        .pagination li.disabled span {
            color: #ccc;
            cursor: not-allowed;
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

        /* Bouton de retour en haut */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--primary-color);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: var(--accent-color);
            transform: translateY(-5px);
        }

        /* Animation pour pas d'actualités */
        .no-actualites {
            text-align: center;
            padding: 50px 0;
            color: #666;
        }

        .no-actualites i {
            font-size: 5rem;
            color: var(--accent-color);
            margin-bottom: 20px;
            display: block;
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .timeline {
                width: 60px;
                padding-right: 20px;
            }

            .timeline-year {
                font-size: 0.8rem;
                padding: 6px 10px;
            }

            .actualite-card::before {
                left: -22px;
            }

            .pagination li a,
            .pagination li span {
                padding: 10px 15px;
                min-width: 40px;
            }
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }

            .actualite-card {
                flex-direction: column;
                max-width: 350px;
            }

            .actualite-image {
                width: 100%;
                height: 200px;
            }

            .actualite-details {
                width: 100%;
            }

            .timeline {
                display: none;
            }

            .actualite-card::before {
                display: none;
            }

            .pagination li a,
            .pagination li span {
                padding: 8px 12px;
                min-width: 35px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .actualite-title {
                font-size: 1.3rem;
            }

            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .pagination {
                flex-wrap: wrap;
                justify-content: center;
            }

            .pagination li {
                margin: 2px;
                border: 1px solid #eee;
                border-radius: 5px;
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

.actualite-resume {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.7;
    word-wrap: break-word;
    word-break: normal;
    overflow-wrap: break-word;
    max-width: 100%;
}

.actualite-resume[dir="rtl"] {
    font-family: 'Arial', 'Tahoma', sans-serif;
    line-height: 1.8;
    letter-spacing: 0;
    text-align: right;
    unicode-bidi: bidi-override;
    word-wrap: break-word;
    word-break: break-word;
    white-space: normal;
    overflow-wrap: break-word;
}

/* Assurez-vous que les conteneurs ont une largeur définie et ne débordent pas */
.actualite-details {
    padding: 25px;
    width: 70%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden; /* Empêche le débordement */
}

/* Pour améliorer l'affichage du texte arabe */
.actualite-card.ar {
    direction: rtl;
}

.actualite-card.ar .actualite-details {
    text-align: right;
}

.actualite-card.ar .actualite-title {
    font-family: 'Arial', 'Tahoma', sans-serif;
}
    </style>
</head>

<body>
    <!-- Page Title -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-up" data-aos-delay="200">Actualités et Événements</h1>
            <p data-aos="fade-up" data-aos-delay="400">Restez informé des dernières nouvelles et activités de l'EPH
                SOBHA</p>
        </div>
    </section>

    <!-- Section des actualités avec timeline -->
    <section class="actualites-section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Nos dernières actualités</h2>
                <p>Découvrez les événements récents et les activités de notre établissement hospitalier</p>
            </div>

            <div class="timeline-container">
                <!-- Timeline à gauche avec les années positionnées en fonction des dernières publications -->
                <div class="timeline" id="timeline" data-aos="fade-right">
                    <!-- Les années seront positionnées dynamiquement par JavaScript -->
                </div>

                <!-- Contenu principal avec les cartes d'actualités -->
                <div class="actualites-content">
                    <?php if (count($actualites) > 0): ?>
                        <?php foreach ($actualites as $index => $actualite): ?>
                            <div class="actualite-card <?php echo $actualite['langue']; ?>" data-aos="fade-left"
                                data-aos-delay="<?php echo $index * 100; ?>"
                                data-year="<?php echo date('Y', strtotime($actualite['date_publication'])); ?>"
                                id="actualite-<?php echo $actualite['id']; ?>">

                                <div class="actualite-image">
                                    <img src="uploads/actualites/<?php echo $actualite['image']; ?>"
                                        alt="<?php echo h($actualite['titre']); ?>" class="zoomable-img">
                                </div>
                                <div class="actualite-details">
                                    <div>
                                        <div class="actualite-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <?php echo format_date($actualite['date_publication'], $actualite['langue']); ?>
                                        </div>
                                        <h3 class="actualite-title"><?php echo h($actualite['titre']); ?></h3>
                                        <p class="actualite-resume" <?php echo $actualite['langue'] == 'ar' ? 'dir="rtl" style="text-align: right; word-wrap: break-word; word-break: break-word;"' : ''; ?>>
    <?php echo h($actualite['resume']); ?>
</p>
                                    </div>
                                    <?php if ($actualite['contenu'] !== null): ?>
                                        <a href="actualite-detail.php?id=<?php echo $actualite['id']; ?>" class="actualite-link">
                                            <?php if ($actualite['langue'] == 'fr'): ?>
                                                Lire la suite <i class="fas fa-arrow-right"></i>
                                            <?php else: ?>
                                                اقرأ المزيد <i class="fas fa-arrow-right"></i>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="no-actualites" data-aos="fade-up">
                            <i class="far fa-newspaper"></i>
                            <h3>Aucune actualité pour le moment</h3>
                            <p>Revenez bientôt pour découvrir nos nouvelles actualités.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Pagination -->
            <?php if (isset($pagination) && $pagination['total_pages'] > 1): ?>
                <div class="pagination-container" data-aos="fade-up">
                    <ul class="pagination">
                        <?php if ($pagination['current_page'] > 1): ?>
                            <li>
                                <a href="?page=1" aria-label="Première page">
                                    <i class="fas fa-angle-double-left"></i>
                                </a>
                            </li>
                            <li>
                                <a href="?page=<?php echo $pagination['current_page'] - 1; ?>" aria-label="Page précédente">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="disabled">
                                <span><i class="fas fa-angle-double-left"></i></span>
                            </li>
                            <li class="disabled">
                                <span><i class="fas fa-angle-left"></i></span>
                            </li>
                        <?php endif; ?>

                        <?php
                        // Calculer les numéros de page à afficher
                        $start_page = max(1, $pagination['current_page'] - 2);
                        $end_page = min($pagination['total_pages'], $pagination['current_page'] + 2);

                        // Toujours afficher au moins 5 pages si possible
                        if ($end_page - $start_page < 4) {
                            if ($start_page == 1) {
                                $end_page = min($pagination['total_pages'], 5);
                            } elseif ($end_page == $pagination['total_pages']) {
                                $start_page = max(1, $pagination['total_pages'] - 4);
                            }
                        }

                        // Afficher les numéros de page
                        for ($i = $start_page; $i <= $end_page; $i++):
                            ?>
                            <li class="<?php echo ($i == $pagination['current_page']) ? 'active' : ''; ?>">
                                <?php if ($i == $pagination['current_page']): ?>
                                    <span><?php echo $i; ?></span>
                                <?php else: ?>
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php endif; ?>
                            </li>
                        <?php endfor; ?>

                        <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                            <li>
                                <a href="?page=<?php echo $pagination['current_page'] + 1; ?>" aria-label="Page suivante">
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="?page=<?php echo $pagination['total_pages']; ?>" aria-label="Dernière page">
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="disabled">
                                <span><i class="fas fa-angle-right"></i></span>
                            </li>
                            <li class="disabled">
                                <span><i class="fas fa-angle-double-right"></i></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Modal pour l'affichage de l'image en plein écran -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialiser AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: false, // L'animation ne se produira qu'une seule fois
                mirror: false, // Pas d'animation en remontant
                offset: 120, // Décalage (en px) depuis le bord de l'écran pour déclencher l'animation
                easing: 'ease-out-back' // Type d'effet d'animation
            });

            // Données pour la timeline - année et ID de la dernière actualité de l'année
            const yearMarkers = <?php echo json_encode($year_markers); ?>;
            const timeline = document.getElementById('timeline');

            // Fonction pour positionner les années sur la timeline
            function positionYearMarkers() {
                // Vider d'abord le conteneur de timeline
                timeline.innerHTML = '';

                // Pour chaque année, créer un marqueur et le positionner
                yearMarkers.forEach(marker => {
                    const yearElement = document.createElement('div');
                    yearElement.className = 'timeline-year';
                    yearElement.textContent = marker.year;
                    timeline.appendChild(yearElement);

                    // Trouver l'élément d'actualité correspondant
                    const actualiteElement = document.getElementById(`actualite-${marker.last_id}`);
                    if (actualiteElement) {
                        // Calculer la position verticale de l'élément d'actualité par rapport à la timeline
                        const actualiteRect = actualiteElement.getBoundingClientRect();
                        const timelineRect = timeline.getBoundingClientRect();

                        // Positionner l'année au même niveau que le haut de la dernière actualité de l'année
                        const topPosition = actualiteRect.top - timelineRect.top;
                        yearElement.style.top = `${Math.max(0, topPosition)}px`;
                    }
                });
            }

            // Positionner les années après le chargement de la page et au redimensionnement
            window.addEventListener('load', positionYearMarkers);
            window.addEventListener('resize', positionYearMarkers);

            // Appeler la fonction une première fois pour initialiser
            setTimeout(positionYearMarkers, 500); // Délai pour s'assurer que les animations AOS sont terminées

            // Fonction pour le modal d'image
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
        });
    </script>
</body>

</html>

<?php include('footer.php');