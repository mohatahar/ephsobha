<?php
// Inclusion de la connexion à la base de données
require_once 'db.php';

// Détection de la langue (à adapter selon votre système)
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr'; // Par défaut français
$rtl = ($lang === 'ar'); // True si la langue est l'arabe

// Variable pour stocker les messages d'erreur
$error_message = '';

// Vérifier si un slug est fourni
if (!isset($_GET['slug']) || empty($_GET['slug'])) {
    header("Location: index.php");
    exit();
}

$slug = $_GET['slug'];

// Requête pour récupérer l'actualité
$query = "SELECT * FROM actualites WHERE slug = ? LIMIT 1";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $actualite = $result->fetch_assoc();

        // Vérifier si l'actualité est publiée ou si l'utilisateur est admin
        $is_admin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
        if ($actualite['statut'] !== 'publie' && !$is_admin) {
            $error_message = "Cette actualité n'est pas disponible pour le moment.";
        }
    } else {
        $error_message = "L'actualité demandée n'existe pas.";
    }
} else {
    $error_message = "Erreur lors de la préparation de la requête: " . $conn->error;
}

// Fonction pour formater la date
function formatDateFr($date)
{
    $timestamp = strtotime($date);
    $mois_fr = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    $jour = date('j', $timestamp);
    $mois = $mois_fr[date('n', $timestamp) - 1];
    $annee = date('Y', $timestamp);

    return $jour . ' ' . $mois . ' ' . $annee;
}

// Inclure le header
include 'header.php';
?>

<style>
    /* Styles pour la page d'actualité */
    .actualite-detail {
        padding: 30px 0;
        background-color: #f8f9fa;
    }

    .actualite-header {
        margin-bottom: 30px;
    }

    .actualite-header h1 {
        color: #333;
        font-size: 2rem;
        margin-bottom: 15px;
        line-height: 1.3;
        font-weight: 700;
    }

    .actualite-meta {
        display: flex;
        align-items: center;
        color: #6c757d;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .actualite-meta .date {
        margin-right: 15px;
        display: flex;
        align-items: center;
    }

    .actualite-meta i {
        margin-right: 5px;
    }

    .actualite-status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 30px;
        font-weight: 500;
        font-size: 12px;
        text-transform: uppercase;
        margin-left: 15px;
    }

    .status-publie {
        background-color: #d4edda;
        color: #155724;
    }

    .status-brouillon {
        background-color: #e2e3e5;
        color: #383d41;
    }

    .status-archive {
        background-color: #cff4fc;
        color: #055160;
    }

    .actualite-image {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .actualite-content {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        line-height: 1.7;
        color: #333;
    }

    .actualite-content p {
        margin-bottom: 20px;
    }

    .actualite-content img {
        max-width: 100%;
        height: auto;
        margin: 20px 0;
        border-radius: 4px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        margin-top: 30px;
        color: #4a6fdc;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        color: #3a5ec9;
        text-decoration: underline;
    }

    .back-link i {
        margin-right: 8px;
    }

    .admin-controls {
        margin-top: 30px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
        text-align: center;
        font-size: 14px;
    }

    .btn i {
        margin-right: 8px;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #ffffff;
    }

    .btn-success {
        background-color: #28a745;
        color: #ffffff;
    }

    .btn-dark {
        background-color: #343a40;
        color: #ffffff;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #ffffff;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .error-container {
        text-align: center;
        padding: 100px 20px;
    }

    .error-container h2 {
        color: #721c24;
        margin-bottom: 20px;
    }

    .error-container p {
        color: #495057;
        margin-bottom: 30px;
        font-size: 18px;
    }

    /* Support pour les langues RTL (arabe, etc.) */
    [dir="rtl"] {
        text-align: right;
    }

    [dir="rtl"] .actualite-meta .date i,
    [dir="rtl"] .back-link i {
        margin-right: 0;
        margin-left: 5px;
    }

    [dir="rtl"] .btn i {
        margin-right: 0;
        margin-left: 8px;
    }

    [dir="rtl"] .actualite-meta .date {
        margin-right: 0;
        margin-left: 15px;
    }

    /* Styles de base pour les écrans mobiles */
    @media (max-width: 768px) {
        .actualite-header h1 {
            font-size: 1.8rem;
            margin-top: 60px;
            word-wrap: break-word;
            display: block;
            width: 100%;
            overflow-wrap: anywhere;
            /* Pour mieux gérer le texte arabe */
        }

        .actualite-content {
            padding: 15px;
            width: 100%;
            overflow-wrap: break-word;
            word-wrap: break-word;
        }

        .admin-controls {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            width: 100%;
        }

        .admin-controls .btn {
            width: 100%;
            padding: 8px 10px;
            font-size: 12px;
            white-space: normal;
            /* Pour permettre le retour à la ligne dans les boutons */
            height: auto;
            min-height: 44px;
            /* Hauteur minimale pour faciliter le toucher */
        }

        .actualite-meta {
            flex-wrap: wrap;
            margin-bottom: 20px;
            width: 100%;
        }

        .actualite-meta .date {
            margin-bottom: 5px;
        }

        /* Amélioration de la visibilité du titre et des contenus */
        .actualite-detail {
            padding: 15px 0;
        }

        .container {
            padding-left: 15px;
            padding-right: 15px;
            max-width: 100%;
            box-sizing: border-box;
        }

        .back-link {
            margin-top: 20px;
            display: block;
            text-align: center;
        }

        /* Support spécifique pour l'arabe en responsive */
        [dir="rtl"] .actualite-content {
            text-align: right;
        }

        [dir="rtl"] .admin-controls {
            direction: rtl;
        }
    }

    /* Pour les très petits écrans */
    @media (max-width: 480px) {
        .admin-controls {
            grid-template-columns: 1fr;
        }

        .actualite-header h1 {
            font-size: 1.5rem;
        }

        /* Amélioration pour les langues RTL sur petits écrans */
        [dir="rtl"] .actualite-meta,
        [dir="rtl"] .actualite-header h1 {
            text-align: right;
            width: 100%;
        }
    }
</style>

<main class="container actualite-detail">
    <?php if (!empty($error_message)): ?>
        <!-- Affichage du message d'erreur -->
        <div class="error-container">
            <h2>Oups !</h2>
            <p><?php echo $error_message; ?></p>
            <a href="index.php" class="back-link"><i class="fas fa-arrow-left"></i> Retour à l'accueil</a>
        </div>
    <?php else: ?>
        <div class="actualite-header">
            <h1 <?php echo $actualite['langue'] == 'ar' ? 'dir="rtl" style="text-align: right; white-space: normal; word-wrap: break-word;"' : ''; ?>><?php echo htmlspecialchars($actualite['titre']); ?></h1>
            <div class="actualite-meta">
                <span class="date">
                    <i class="far fa-calendar-alt"></i>
                    <?php echo formatDateFr($actualite['date_publication']); ?>
                </span>

                <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                    <span class="actualite-status status-<?php echo $actualite['statut']; ?>">
                        <?php
                        switch ($actualite['statut']) {
                            case 'publie':
                                echo "Publié";
                                break;
                            case 'brouillon':
                                echo "Brouillon";
                                break;
                            case 'archive':
                                echo "Archivé";
                                break;
                            default:
                                echo $actualite['statut'];
                        }
                        ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($actualite['image']): ?>
            <img src="uploads/actualites/<?php echo $actualite['image']; ?>"
                alt="<?php echo htmlspecialchars($actualite['titre']); ?>" class="actualite-image">
        <?php endif; ?>

        <div class="actualite-content" <?php echo $actualite['langue'] == 'ar' ? 'dir="rtl" style="text-align: right; white-space: normal; word-wrap: break-word;"' : ''; ?>>
            <?php echo $actualite['contenu']; ?>
        </div>

        <a href="admin-actualites.php#actualites" class="back-link">
            <i class="fas fa-arrow-left"></i> Retour aux actualités
        </a>

        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <div class="admin-controls">
                <!-- Modifier l'actualité -->
                <a href="modifier-actualite.php?id=<?php echo $actualite['id']; ?>" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Modifier
                </a>

                <?php if ($actualite['statut'] == 'brouillon'): ?>
                    <!-- Publier l'actualité -->
                    <a href="admin-actualites.php?action=publish&id=<?php echo $actualite['id']; ?>" class="btn btn-success"
                        onclick="return confirm('Êtes-vous sûr de vouloir publier cette actualité?');">
                        <i class="fas fa-check"></i> Publier
                    </a>
                <?php elseif ($actualite['statut'] == 'publie'): ?>
                    <!-- Dépublier l'actualité -->
                    <a href="admin-actualites.php?action=unpublish&id=<?php echo $actualite['id']; ?>" class="btn btn-secondary"
                        onclick="return confirm('Êtes-vous sûr de vouloir dépublier cette actualité?');">
                        <i class="fas fa-pause"></i> Mettre en brouillon
                    </a>
                <?php endif; ?>

                <?php if ($actualite['statut'] != 'archive'): ?>
                    <!-- Archiver l'actualité -->
                    <a href="admin-actualites.php?action=archive&id=<?php echo $actualite['id']; ?>" class="btn btn-dark"
                        onclick="return confirm('Êtes-vous sûr de vouloir archiver cette actualité?');">
                        <i class="fas fa-archive"></i> Archiver
                    </a>
                <?php endif; ?>

                <!-- Supprimer l'actualité -->
                <a href="admin-actualites.php?action=delete&id=<?php echo $actualite['id']; ?>" class="btn btn-danger"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer définitivement cette actualité? Cette action est irréversible.');">
                    <i class="fas fa-trash"></i> Supprimer
                </a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</main>

<?php include 'footer.php'; ?>