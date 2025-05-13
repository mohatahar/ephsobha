<?php
include 'header.php';
require_once 'db.php';
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

// Traitement du formulaire d'ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $titre = trim($_POST['titre']);
    $resume = trim($_POST['resume']);
    $contenu = trim($_POST['contenu']);
    $date_publication = $_POST['date_publication'];
    $statut = $_POST['statut'];
    $langue = isset($_POST['langue']) ? $_POST['langue'] : 'fr';
    
    // Validation de base
    if (empty($titre) || empty($contenu) || empty($date_publication)) {
        $error_message = "Veuillez remplir tous les champs obligatoires.";
    } else {
        // Génération du slug à partir du titre
        $slug = createSlug($titre);
        
        // Vérifier si le slug existe déjà
        $check_slug = "SELECT COUNT(*) as count FROM actualites WHERE slug = ?";
        $stmt = $conn->prepare($check_slug);
        $stmt->bind_param("s", $slug);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['count'] > 0) {
            // Ajouter un identifiant unique au slug
            $slug = $slug . '-' . time();
        }
        
        // Gestion de l'upload d'image
        $image_name = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $filename = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            
            if (!in_array(strtolower($ext), $allowed)) {
                $error_message = "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            } else {
                // Créer le dossier d'upload si nécessaire
                $upload_dir = 'uploads/actualites/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Générer un nom unique pour l'image
                $image_name = $slug . '-' . time() . '.' . $ext;
                $destination = $upload_dir . $image_name;
                
                // Déplacer le fichier uploadé
                if (!move_uploaded_file($tmp_name, $destination)) {
                    $error_message = "Erreur lors de l'upload de l'image.";
                    $image_name = '';
                }
            }
        }
        
        // Si pas d'erreur, insérer dans la base de données
        if (empty($error_message)) {
            $query = "INSERT INTO actualites (titre, slug, resume, contenu, date_publication, image, statut, langue) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssss", $titre, $slug, $resume, $contenu, $date_publication, $image_name, $statut, $langue);
            
            if ($stmt->execute()) {
                $success_message = "L'actualité a été ajoutée avec succès.";
            } else {
                $error_message = "Erreur lors de l'ajout de l'actualité: " . $conn->error;
            }
        }
    }
}

// Fonction pour créer un slug à partir d'une chaîne
function createSlug($string) {
    // Remplacer les caractères non alphanumériques par des tirets
    $string = preg_replace('/[^\p{L}\p{N}]+/u', '-', $string);
    // Convertir en minuscules
    $string = mb_strtolower($string, 'UTF-8');
    // Supprimer les tirets au début et à la fin
    $string = trim($string, '-');
    return $string;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Actualité</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .admin-section {
            padding: 40px 0;
        }
        
        .dashboard {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: var(--shadow);
            padding: 30px;
            margin-bottom: 30px;
        }       
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            opacity: 1;
            transition: opacity 0.5s ease;
        }
        
        .alert::before {
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            margin-right: 15px;
            font-size: 18px;
        }
        
        .success {
            background-color: rgba(46, 204, 113, 0.15);
            color: #27ae60;
            border-left: 4px solid var(--success-color);
        }
        
        .success::before {
            content: '\f00c';
        }
        
        .error {
            background-color: rgba(231, 76, 60, 0.15);
            color: #c0392b;
            border-left: 4px solid var(--error-color);
        }
        
        .error::before {
            content: '\f071';
        }
        
        .admin-actions {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 25px;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            border: none;
            font-size: 16px;
            margin-right: 10px;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-secondary {
            background-color: #f1f1f1;
            color: #333;
        }
        
        .btn-secondary:hover {
            background-color: #e1e1e1;
        }
        
        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
        }       
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .required {
            color: var(--error-color);
        }
        
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 16px;
            transition: var(--transition);
        }
        
        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        input[type="file"] {
            padding: 10px 0;
        }
        
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        small {
            display: block;
            color: #7f8c8d;
            margin-top: 5px;
            font-size: 14px;
        }
        
        .form-buttons {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        /* File upload styling */
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }
        
        .file-upload-label {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            background-color: #f8f9fa;
            border: 1px dashed var(--border-color);
            border-radius: 6px;
            cursor: pointer;
            transition: var(--transition);
            height: 150px;
        }
        
        .file-upload-label:hover {
            background-color: #e9ecef;
        }
        
        .file-upload-content {
            text-align: center;
            width: 100%;
        }
        
        .file-upload-icon {
            font-size: 36px;
            color: #6c757d;
            margin-bottom: 10px;
        }
        
        .file-upload-text {
            font-size: 14px;
            color: #6c757d;
        }
        
        .file-upload input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
        
        /* Preview image */
        .image-preview {
            width: 100%;
            max-height: 200px;
            border-radius: 6px;
            display: none;
            margin-top: 10px;
            object-fit: cover;
        }
        
        .field-group {
            display: flex;
            gap: 20px;
        }
        
        .field-group .form-group {
            flex: 1;
        }
        
        /* Divider */
        .divider {
            height: 1px;
            background-color: var(--light-gray);
            margin: 30px 0;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .field-group {
                flex-direction: column;
                gap: 10px;
            }
            
            .form-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                margin-right: 0;
                margin-bottom: 10px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<main class="container admin-section">
    <section class="dashboard">
        <h1><i class="fas fa-newspaper"></i> Ajouter une Actualité</h1>
        
        <div id="alertContainer">
            <?php if (!empty($success_message)): ?>
                <div class="alert success"><?php echo $success_message; ?></div>
            <?php endif; ?>
            
            <?php if (!empty($error_message)): ?>
                <div class="alert error"><?php echo $error_message; ?></div>
            <?php endif; ?>
        </div>

        <div class="form-container">
            <form id="actualiteForm" action="ajouter-actualite.php" method="POST" enctype="multipart/form-data">
                <!-- Informations principales -->
                <div class="form-group">
                    <label for="titre">Titre <span class="required">*</span></label>
                    <input type="text" id="titre" name="titre" required placeholder="Entrez le titre de l'actualité">
                </div>
                
                <div class="form-group">
                    <label for="resume">Résumé</label>
                    <textarea id="resume" name="resume" rows="3" placeholder="Un court résumé qui apparaîtra dans la liste des actualités"></textarea>
                    <small><i class="fas fa-info-circle"></i> Ce résumé sera utilisé dans les aperçus et les listes d'actualités</small>
                </div>
                
                <div class="field-group">
                    <div class="form-group">
                        <label for="date_publication">Date de publication <span class="required">*</span></label>
                        <input type="date" id="date_publication" name="date_publication" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="langue">Langue</label>
                        <select id="langue" name="langue">
                            <option value="fr" selected>Français</option>
                            <option value="ar">Arabe</option>
                            <option value="en">Anglais</option>
                        </select>
                    </div>
                </div>

                <div class="divider"></div>

                <!-- Contenu -->
                <div class="form-group">
                    <label for="contenu">Contenu de l'actualité <span class="required">*</span></label>
                    <textarea id="contenu" name="contenu" rows="15" required placeholder="Saisissez le contenu détaillé de l'actualité"></textarea>
                </div>

                <div class="divider"></div>

                <!-- Média -->
                <div class="form-group">
                    <label>Image principale</label>
                    <div class="file-upload">
                        <label class="file-upload-label">
                            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                            <div class="file-upload-content">
                                <div class="file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="file-upload-text">
                                    Glissez-déposez votre image ici ou cliquez pour sélectionner
                                </div>
                                <small>Formats acceptés: JPG, JPEG, PNG, GIF</small>
                            </div>
                        </label>
                    </div>
                    <img id="imagePreview" class="image-preview" src="#" alt="Aperçu de l'image">
                </div>

                <div class="divider"></div>

                <!-- Paramètres -->
                <div class="form-group">
                    <label for="statut">Statut de publication</label>
                    <select id="statut" name="statut">
                        <option value="publie" selected>Publié</option>
                        <option value="brouillon">Brouillon</option>
                    </select>
                    <small><i class="fas fa-info-circle"></i> Un brouillon ne sera pas visible sur le site public</small>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer l'actualité
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="fas fa-undo"></i> Réinitialiser
                    </button>
                </div>
            </form>
        </div>
    </section>
      <div class="admin-actions">
            <a href="admin-actualites.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
        </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Récupérer les messages d'alerte du PHP
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');
    const error = urlParams.get('error');
    
    const alertContainer = document.getElementById('alertContainer');
    
    if (success) {
        showAlert('success', 'L\'actualité a été ajoutée avec succès.');
    } else if (error) {
        showAlert('error', error);
    }
    
    // Fonction pour afficher une alerte
    function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert ${type}`;
        alertDiv.textContent = message;
        alertContainer.appendChild(alertDiv);
        
        // Faire disparaître l'alerte après 5 secondes
        setTimeout(function() {
            alertDiv.style.opacity = '0';
            setTimeout(function() {
                alertDiv.remove();
            }, 500);
        }, 5000);
    }
    
    // Définir la date du jour par défaut
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date_publication').value = today;
    
    // Intégration de l'éditeur WYSIWYG pour le contenu
    if (typeof ClassicEditor !== 'undefined') {
        ClassicEditor
            .create(document.querySelector('#contenu'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    }
    
    // Validation du formulaire
    document.getElementById('actualiteForm').addEventListener('submit', function(e) {
        const titre = document.getElementById('titre').value.trim();
        const contenu = document.getElementById('contenu').value.trim();
        
        if (!titre || !contenu) {
            e.preventDefault();
            showAlert('error', 'Veuillez remplir tous les champs obligatoires.');
            return false;
        }
    });
});

// Fonction pour prévisualiser l'image
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const file = input.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
}
</script>

</body>
</html>
<?php include('footer.php');