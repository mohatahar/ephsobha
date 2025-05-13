<?php
// Configuration
$admin_email = "ephsobha2010@gmail.com"; // Email qui recevra les demandes de rendez-vous
$hospital_name = "EPH SOBHA";
$site_url = "http://www.ephsobha.dz"; // URL de votre site

// Initialisation des variables d'erreur et de succès
$error = "";
$success = "";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données du formulaire
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
    
    // Validation des données
    if (empty($name)) {
        $error .= "Le nom est requis.<br>";
    }
    
    if (empty($phone)) {
        $error .= "Le numéro de téléphone est requis.<br>";
    }
    
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "L'adresse email n'est pas valide.<br>";
    }
    
    if (empty($department)) {
        $error .= "Veuillez sélectionner un service.<br>";
    }
    
    if (empty($date)) {
        $error .= "La date de rendez-vous est requise.<br>";
    } else {
        // Vérifier que la date n'est pas passée
        $appointment_date = new DateTime($date);
        $today = new DateTime('today');
        
        if ($appointment_date < $today) {
            $error .= "La date de rendez-vous ne peut pas être dans le passé.<br>";
        }
    }
    
    // Si pas d'erreur, procéder à l'envoi de l'email et à l'enregistrement
    if (empty($error)) {
        // Génération d'un numéro de référence unique pour le rendez-vous
        $reference_number = 'RDV-' . date('Ymd') . '-' . substr(uniqid(), -5);
        
        // Préparation de l'email pour l'administrateur
        $to = $admin_email;
        $email_subject = "[Demande de Rendez-vous] $name - $department";
        
        $email_body = "Une nouvelle demande de rendez-vous a été reçue sur le site web $hospital_name.\n\n";
        $email_body .= "Référence: $reference_number\n";
        $email_body .= "Détails:\n\n";
        $email_body .= "Nom: $name\n";
        $email_body .= "Téléphone: $phone\n";
        if (!empty($email)) {
            $email_body .= "Email: $email\n";
        }
        $email_body .= "Service: $department\n";
        $email_body .= "Date souhaitée: $date\n";
        if (!empty($message)) {
            $email_body .= "Motif de consultation: $message\n";
        }
        
        $headers = "From: noreply@ephsobha.dz\r\n";
        if (!empty($email)) {
            $headers .= "Reply-To: $email\r\n";
        }
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Tentative d'envoi de l'email à l'administrateur
        $admin_mail_sent = mail($to, $email_subject, $email_body, $headers);
        
        // Si un email patient est fourni, envoyer une confirmation
        $patient_mail_sent = true;
        if (!empty($email)) {
            $patient_subject = "Confirmation de votre demande de rendez-vous - $hospital_name";
            
            $patient_body = "Cher(e) $name,\n\n";
            $patient_body .= "Nous avons bien reçu votre demande de rendez-vous au service de $department pour le $date.\n\n";
            $patient_body .= "Votre numéro de référence est: $reference_number\n\n";
            $patient_body .= "Notre équipe va traiter votre demande dans les plus brefs délais et vous contactera par téléphone pour confirmer votre rendez-vous.\n\n";
            $patient_body .= "Si vous avez besoin de modifier ou d'annuler votre demande, veuillez nous contacter au +213 XX XX XX XX en précisant votre numéro de référence.\n\n";
            $patient_body .= "Nous vous remercions pour votre confiance.\n\n";
            $patient_body .= "Cordialement,\n";
            $patient_body .= "L'équipe de $hospital_name";
            
            $patient_headers = "From: $hospital_name <noreply@ephsobha.dz>\r\n";
            $patient_headers .= "X-Mailer: PHP/" . phpversion();
            
            $patient_mail_sent = mail($email, $patient_subject, $patient_body, $patient_headers);
        }
        
        // Option: stocker le rendez-vous dans une base de données
        // $db_saved = saveAppointmentToDatabase($reference_number, $name, $phone, $email, $department, $date, $message);
        $db_saved = true; // Simuler la sauvegarde réussie
        
        if ($admin_mail_sent && $patient_mail_sent && $db_saved) {
            $success = "Votre demande de rendez-vous a été enregistrée avec succès. Votre numéro de référence est: <strong>$reference_number</strong>. Nous vous contacterons prochainement pour confirmer votre rendez-vous.";
            
            // Réinitialiser les champs
            $name = $phone = $email = $department = $date = $message = "";
        } else {
            $error = "Une erreur s'est produite lors de l'enregistrement de votre rendez-vous. Veuillez réessayer ou nous contacter par téléphone.";
        }
    }
}

// Fonction pour sauvegarder le rendez-vous dans une base de données (à implémenter si nécessaire)
function saveAppointmentToDatabase($reference, $name, $phone, $email, $department, $date, $message) {
    // Connexion à la base de données
    // $conn = new mysqli("localhost", "username", "password", "database_name");
    
    // Si vous voulez utiliser une base de données, décommentez le code ci-dessous
    /*
    if ($conn->connect_error) {
        // Gestion de l'erreur de connexion à la base de données
        return false;
    }
    
    $stmt = $conn->prepare("INSERT INTO appointments (reference_number, name, phone, email, department, appointment_date, message, status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending', NOW())");
    $stmt->bind_param("sssssss", $reference, $name, $phone, $email, $department, $date, $message);
    
    $result = $stmt->execute();
    
    $stmt->close();
    $conn->close();
    
    return $result;
    */
    
    return true;
}

// Traduction des services
function translateDepartment($department) {
    $translations = [
        'cardiologie' => 'Cardiologie',
        'neurologie' => 'Neurologie',
        'chirurgie' => 'Chirurgie',
        'pediatrie' => 'Pédiatrie',
        'radiologie' => 'Radiologie',
        'general' => 'Médecine Générale'
    ];
    
    return isset($translations[$department]) ? $translations[$department] : $department;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement de rendez-vous - <?php echo $hospital_name; ?></title>
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
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo i {
            font-size: 2.5rem;
            margin-right: 10px;
            color: var(--light-color);
        }
        
        .logo-text h1 {
            font-size: 1.8rem;
            font-weight: 700;
        }
        
        .logo-text p {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .section {
            padding: 60px 0;
        }
        
        .message-card {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: 20px 0;
            text-align: center;
        }
        
        .appointment-details {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
            border-left: 4px solid var(--primary-color);
        }
        
        .appointment-details h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .appointment-details p {
            margin-bottom: 10px;
        }
        
        .reference {
            font-weight: bold;
            font-size: 1.2em;
            color: var(--primary-color);
            padding: 5px 10px;
            background-color: #e6f7ff;
            border-radius: 4px;
            display: inline-block;
            margin: 10px 0;
        }
        
        .message-icon {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        
        .success-icon {
            color: var(--success-color);
        }
        
        .error-icon {
            color: var(--danger-color);
        }
        
        .message-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark-color);
        }
        
        .message-text {
            margin-bottom: 25px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #005d91;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-group {
            margin-top: 25px;
        }
        
        .btn-group .btn {
            margin: 0 10px;
        }
        
        .instructions {
            background-color: #e6f7ff;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
        }
        
        .instructions h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        
        .instructions ul {
            list-style-type: none;
        }
        
        .instructions ul li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        
        .instructions ul li:before {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: var(--success-color);
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        .copyright {
            text-align: center;
            font-size: 0.9rem;
        }
        
        @media print {
            .no-print {
                display: none;
            }
            
            .container {
                width: 100%;
            }
            
            .message-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
            
            .appointment-details {
                border-left: 2px solid #333;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="no-print">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-hospital"></i>
                    <div class="logo-text">
                        <h1><?php echo $hospital_name; ?></h1>
                        <p>Au service de votre santé</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Message Section -->
    <section class="section">
        <div class="container">
            <?php if (!empty($success)): ?>
                <div class="message-card">
                    <div class="message-icon success-icon no-print">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="message-title">Demande de Rendez-vous Enregistrée!</h2>
                    <p class="message-text"><?php echo $success; ?></p>
                    
                    <div class="appointment-details">
                        <h3>Récapitulatif de votre demande</h3>
                        <p><strong>Référence:</strong> <span class="reference"><?php echo $reference_number; ?></span></p>
                        <p><strong>Nom:</strong> <?php echo htmlspecialchars($name); ?></p>
                        <p><strong>Téléphone:</strong> <?php echo htmlspecialchars($phone); ?></p>
                        <?php if (!empty($email)): ?>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                        <?php endif; ?>
                        <p><strong>Service:</strong> <?php echo translateDepartment($department); ?></p>
                        <p><strong>Date souhaitée:</strong> <?php echo date('d/m/Y', strtotime($date)); ?></p>
                        <?php if (!empty($message)): ?>
                        <p><strong>Motif de consultation:</strong> <?php echo htmlspecialchars($message); ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="instructions no-print">
                        <h3>Prochaines étapes:</h3>
                        <ul>
                            <li>Notre équipe va traiter votre demande et vous contactera par téléphone pour confirmer votre rendez-vous.</li>
                            <li>Veuillez conserver votre numéro de référence pour toute communication future.</li>
                            <li>En cas d'urgence, veuillez contacter directement notre service d'urgence au +213 XX XX XX XX.</li>
                            <li>Si vous souhaitez modifier ou annuler votre demande, veuillez nous contacter en indiquant votre numéro de référence.</li>
                        </ul>
                    </div>
                    
                    <div class="btn-group no-print">
                        <button onclick="window.print();" class="btn btn-outline"><i class="fas fa-print"></i> Imprimer</button>
                        <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>
                    </div>
                </div>
            <?php elseif (!empty($error)): ?>
                <div class="message-card">
                    <div class="message-icon error-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h2 class="message-title">Erreur</h2>
                    <p class="message-text"><?php echo $error; ?></p>
                    <a href="javascript:history.back()" class="btn btn-primary">Retour au formulaire</a>
                </div>
            <?php else: ?>
                <div class="message-card">
                    <div class="message-icon error-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h2 class="message-title">Accès Incorrect</h2>
                    <p class="message-text">Vous avez accédé à cette page directement. Veuillez utiliser le formulaire de rendez-vous.</p>
                    <a href="index.php#rendezvous" class="btn btn-primary">Aller au formulaire de rendez-vous</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="no-print">
        <div class="container">
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php echo $hospital_name; ?>. Tous droits réservés.</p>
                </div>
        </div>
    </footer>
    
    <script>
        // Si succès, enregistrer la référence dans le stockage local pour récupération future
        <?php if (!empty($success) && !empty($reference_number)): ?>
        localStorage.setItem('lastAppointmentRef', '<?php echo $reference_number; ?>');
        localStorage.setItem('lastAppointmentDate', '<?php echo date('Y-m-d'); ?>');
        <?php endif; ?>
        
        // Fonction pour formater la date de manière lisible
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('fr-FR', options);
        }
    </script>
</body>
</html>