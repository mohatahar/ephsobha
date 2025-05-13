<?php
// Inclusion de la connexion à la base de données
require_once 'db.php';
// Inclusion du système d'authentification
require_once 'auth_check.php';

// Vérifier si l'utilisateur est connecté et est un administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas un admin
    header("Location: login.php");
    exit();
}

// Variables pour les messages
$success_message = '';
$error_message = '';

// Traitement de la suppression d'une actualité
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérer le nom de l'image avant la suppression
    $query = "SELECT image FROM actualites WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $image_name = $row['image'];

        // Supprimer le fichier image si existe
        if ($image_name && file_exists("uploads/actualites/" . $image_name)) {
            unlink("uploads/actualites/" . $image_name);
        }
    }

    // Supprimer l'actualité de la base de données
    $query = "DELETE FROM actualites WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $success_message = "L'actualité a été supprimée avec succès.";
    } else {
        $error_message = "Erreur lors de la suppression de l'actualité: " . $conn->error;
    }
}

// Traitement pour publier/dépublier une actualité
if (isset($_GET['action']) && ($_GET['action'] == 'publish' || $_GET['action'] == 'unpublish') && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $status = ($_GET['action'] == 'publish') ? 'publie' : 'brouillon';

    $query = "UPDATE actualites SET statut = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        $action_txt = ($_GET['action'] == 'publish') ? "publiée" : "mise en brouillon";
        $success_message = "L'actualité a été " . $action_txt . " avec succès.";
    } else {
        $error_message = "Erreur lors de la modification du statut: " . $conn->error;
    }
}

// Traitement pour archiver une actualité
if (isset($_GET['action']) && $_GET['action'] == 'archive' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $status = 'archive';

    $query = "UPDATE actualites SET statut = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        $success_message = "L'actualité a été archivée avec succès.";
    } else {
        $error_message = "Erreur lors de l'archivage: " . $conn->error;
    }
}

// Récupérer toutes les actualités
$query = "SELECT * FROM actualites ORDER BY date_creation DESC";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $error_message = "Erreur de préparation de la requête: " . $conn->error;
    $result = null;
}

// Inclure le header
include 'header.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    :root {
        --primary: #4a6fdc;
        --primary-dark: #3a5ec9;
        --secondary: #6c757d;
        --success: #28a745;
        --info: #17a2b8;
        --warning: #ffc107;
        --danger: #dc3545;
        --light: #f8f9fa;
        --dark: #343a40;
        --white: #ffffff;
        --border-radius: 8px;
        --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    .admin-section {
        padding: 30px 0;
        background-color: #f5f7fb;
    }

    .dashboard h1 {
        color: #333;
        margin-bottom: 30px;
        font-weight: 600;
        font-size: 28px;
        border-bottom: 2px solid var(--primary);
        padding-bottom: 10px;
        display: inline-block;
    }

    .alert {
        padding: 15px;
        border-radius: var(--border-radius);
        margin-bottom: 20px;
        opacity: 1;
        transition: opacity 0.5s ease;
        display: flex;
        align-items: center;
    }

    .alert:before {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        margin-right: 10px;
        font-size: 18px;
    }

    .alert.success {
        background-color: #d4edda;
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert.success:before {
        content: "\f058";
        /* check-circle icon */
        color: #28a745;
    }

    .alert.error {
        background-color: #f8d7da;
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    .alert.error:before {
        content: "\f057";
        /* times-circle icon */
        color: #dc3545;
    }

    .admin-actions {
        margin-bottom: 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        border-radius: var(--border-radius);
        border: none;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: var(--transition);
        text-align: center;
        font-size: 14px;
    }

    .btn i {
        margin-right: 8px;
    }

    .btn-primary {
        background-color: var(--primary);
        color: var(--white);
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .table-responsive {
        overflow-x: auto;
        background-color: var(--white);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow);
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
    }

    .admin-table th,
    .admin-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e9ecef;
    }

    .admin-table th {
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
    }

    .admin-table tr:hover {
        background-color: #f8f9fa;
    }

    .admin-table td.actions {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
    }

    .admin-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    .no-image {
        display: inline-block;
        width: 60px;
        height: 60px;
        line-height: 60px;
        text-align: center;
        background-color: #f8f9fa;
        border: 1px dashed #ccc;
        border-radius: 4px;
        color: #999;
        font-size: 12px;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 30px;
        font-weight: 500;
        font-size: 12px;
        text-transform: uppercase;
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

    .btn-sm {
        padding: 5px 10px;
        font-size: 12px;
        border-radius: 4px;
    }

    .btn-info {
        background-color: var(--info);
        color: var(--white);
    }

    .btn-warning {
        background-color: var(--warning);
        color: #212529;
    }

    .btn-success {
        background-color: var(--success);
        color: var(--white);
    }

    .btn-secondary {
        background-color: var(--secondary);
        color: var(--white);
    }

    .btn-dark {
        background-color: var(--dark);
        color: var(--white);
    }

    .btn-danger {
        background-color: var(--danger);
        color: var(--white);
    }

    .text-center {
        text-align: center;
    }

    /* Animation pour les hover sur les lignes du tableau */
    .admin-table tr {
        transition: var(--transition);
    }

    /* Animation pour les entrées du tableau */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .admin-table tbody tr {
        animation: fadeIn 0.3s ease-in-out forwards;
    }

    /* Filtres */
    .filters {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .filter-group {
        flex: 1;
        min-width: 200px;
    }

    .filter-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .filter-group select,
    .filter-group input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: var(--white);
    }

    /* Responsive design */
    @media (max-width: 992px) {
        .admin-actions {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .filters {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        /* Repositionner le titre pour une meilleure visibilité sur mobile */
        .dashboard h1 {
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 24px;
            width: 100%;
            text-align: center;
            display: block;
        }

        /* Ajustement des filtres sur mobile */
        .filters {
            width: 90%;
            margin: 0 auto 15px;
            justify-content: center;
            padding-left: 0;
        }

        .filter-group {
            min-width: 100%;
            margin-bottom: 10px;
        }

        /* Button d'ajout centré */
        .admin-actions>div:first-child {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .admin-actions .btn {
            width: 90%;
            max-width: 300px;
        }

        .admin-actions .btn {
            width: 100%;
            justify-content: center;
        }

        .admin-table th,
        .admin-table td {
            padding: 8px 5px;
            font-size: 14px;
        }

        .admin-thumbnail,
        .no-image {
            width: 40px;
            height: 40px;
            line-height: 40px;
        }

        .btn-sm {
            padding: 4px 8px;
            font-size: 11px;
        }

        .status-badge {
            padding: 3px 6px;
            font-size: 10px;
        }
    }

    @media (max-width: 576px) {
        /* Empêcher le défilement horizontal du tableau */
        .table-responsive {
            margin: 0;
            width: 100%;
            overflow-x: hidden;
        }

        /* Assurer que les cartes (lignes transformées) ont une bonne largeur */
        .admin-table tbody tr {
            width: 90%;
            margin: 0 auto 15px;
            box-shadow: var(--shadow);
        }

        /* Améliorer la visibilité des actions */
        .admin-table td.actions {
            padding-top: 15px;
            justify-content: space-around;
        }

        /* Assurer que les boutons d'action sont suffisamment gros pour être cliquables */
        .btn-sm {
            padding: 8px 12px;
            margin: 3px;
        }

        /* Transformation du tableau pour l'affichage mobile */
        .admin-table,
        .admin-table tbody,
        .admin-table tr {
            display: block;
            width: 100%;
        }

        .admin-table thead {
            display: none;
        }

        .admin-table tbody tr {
            margin-bottom: 20px;
            border: 1px solid #e9ecef;
            border-radius: var(--border-radius);
            padding: 10px;
            position: relative;
        }

        .admin-table td {
            display: flex;
            padding: 8px 5px;
            border-bottom: 1px solid #f2f2f2;
            text-align: right;
            justify-content: space-between;
            align-items: center;
        }

        .admin-table td:last-child {
            border-bottom: none;
        }

        .admin-table td:before {
            content: attr(data-label);
            font-weight: 600;
            width: 30%;
            text-align: left;
        }

        .admin-table td.actions {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            justify-content: center;
        }

        .admin-table td.actions:before {
            width: 100%;
            margin-bottom: 5px;
            text-align: center;
        }
    }
</style>

<main class="container admin-section">
    <section class="dashboard">
        <h1>Gestion des Actualités</h1>

        <?php if (!empty($success_message)): ?>
            <div class="alert success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            <div class="alert error">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <div class="admin-actions">
            <div>
                <a href="ajouter-actualite.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Ajouter une actualité
                </a>
            </div>

            <!-- Filtres -->
            <div class="filters">
                <div class="filter-group">
                    <label for="status-filter">Filtrer par statut:</label>
                    <select id="status-filter">
                        <option value="">Tous</option>
                        <option value="publie">Publié</option>
                        <option value="brouillon">Brouillon</option>
                        <option value="archive">Archivé</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label for="search">Rechercher:</label>
                    <input type="text" id="search" placeholder="Titre de l'actualité...">
                </div>
            </div>
        </div>

        <!-- Tableau des actualités -->
        <div class="table-responsive">
            <table class="admin-table" id="actualites-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Date de publication</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php $delay = 0; ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr style="animation-delay: <?php echo $delay; ?>s">
                                <td data-label="ID"><?php echo $row['id']; ?></td>
                                <td data-label="Image">
                                    <?php if ($row['image']): ?>
                                        <img src="uploads/actualites/<?php echo $row['image']; ?>"
                                            alt="<?php echo htmlspecialchars($row['titre']); ?>" class="admin-thumbnail">
                                    <?php else: ?>
                                        <span class="no-image">Pas d'image</span>
                                    <?php endif; ?>
                                </td>
                                <td data-label="Titre"><?php echo htmlspecialchars($row['titre']); ?></td>
                                <td data-label="Date"><?php echo date('d/m/Y', strtotime($row['date_publication'])); ?></td>
                                <td data-label="Statut">
                                    <span class="status-badge status-<?php echo $row['statut']; ?>">
                                        <?php
                                        switch ($row['statut']) {
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
                                                echo $row['statut'];
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td class="actions">
                                    <!-- Voir l'actualité -->
                                    <a href="actualite.php?slug=<?php echo $row['slug']; ?>" class="btn btn-sm btn-info"
                                        title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <!-- Modifier l'actualité -->
                                    <a href="modifier-actualite.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning"
                                        title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <?php if ($row['statut'] == 'brouillon'): ?>
                                        <!-- Publier l'actualité -->
                                        <a href="admin-actualites.php?action=publish&id=<?php echo $row['id']; ?>"
                                            class="btn btn-sm btn-success" title="Publier"
                                            onclick="return confirm('Êtes-vous sûr de vouloir publier cette actualité?');">
                                            <i class="fas fa-check"></i>
                                        </a>
                                    <?php elseif ($row['statut'] == 'publie'): ?>
                                        <!-- Dépublier l'actualité -->
                                        <a href="admin-actualites.php?action=unpublish&id=<?php echo $row['id']; ?>"
                                            class="btn btn-sm btn-secondary" title="Mettre en brouillon"
                                            onclick="return confirm('Êtes-vous sûr de vouloir dépublier cette actualité?');">
                                            <i class="fas fa-pause"></i>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($row['statut'] != 'archive'): ?>
                                        <!-- Archiver l'actualité -->
                                        <a href="admin-actualites.php?action=archive&id=<?php echo $row['id']; ?>"
                                            class="btn btn-sm btn-dark" title="Archiver"
                                            onclick="return confirm('Êtes-vous sûr de vouloir archiver cette actualité?');">
                                            <i class="fas fa-archive"></i>
                                        </a>
                                    <?php endif; ?>

                                    <!-- Supprimer l'actualité -->
                                    <a href="admin-actualites.php?action=delete&id=<?php echo $row['id']; ?>"
                                        class="btn btn-sm btn-danger" title="Supprimer"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer définitivement cette actualité? Cette action est irréversible.');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $delay += 0.05; ?>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Aucune actualité trouvée.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Faire disparaître les messages après 5 secondes
        const alerts = document.querySelectorAll('.alert');
        if (alerts.length > 0) {
            setTimeout(function () {
                alerts.forEach(function (alert) {
                    alert.style.opacity = '0';
                    setTimeout(function () {
                        alert.style.display = 'none';
                    }, 500);
                });
            }, 5000);
        }

        // Filtrage des actualités
        const statusFilter = document.getElementById('status-filter');
        const searchInput = document.getElementById('search');
        const table = document.getElementById('actualites-table');

        function filterTable() {
            const status = statusFilter.value.toLowerCase();
            const searchText = searchInput.value.toLowerCase();
            const rows = table.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const titleCell = row.querySelector('td:nth-child(3)');
                const statusCell = row.querySelector('.status-badge');

                if (titleCell && statusCell) {
                    const title = titleCell.textContent.toLowerCase();
                    const rowStatus = statusCell.classList.contains(`status-${status}`);

                    // Filtrer par statut et recherche
                    if ((status === '' || rowStatus) &&
                        (searchText === '' || title.includes(searchText))) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        }

        if (statusFilter && searchInput) {
            statusFilter.addEventListener('change', filterTable);
            searchInput.addEventListener('input', filterTable);
        }
    });
</script>

<?php include 'footer.php'; ?>