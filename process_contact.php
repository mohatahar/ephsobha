<?php
// Configuration
$admin_email = "contact.ephsobha@gmail.com"; // Email de l'administrateur qui recevra les messages
$hospital_name = "EPH SOBHA";
$tagline = "Au service de votre santé";
$site_url = "https://ephsobha.onrender.com"; // URL de votre site
$send_confirmation = true; // Option pour activer/désactiver l'envoi du message de confirmation

// Initialisation des variables d'erreur et de succès
$error = "";
$success = "";

// Vérification si la page est affichée après une redirection de succès
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $success = true;
    $confirmation_sent = isset($_GET['confirmation']) && $_GET['confirmation'] == 'sent';
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données du formulaire en utilisant des méthodes sécurisées
    // Remplacement de FILTER_SANITIZE_STRING (déprécié) par htmlspecialchars
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8') : '';
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8') : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject']), ENT_QUOTES, 'UTF-8') : '';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8') : '';
    
    // Récupération de l'option de confirmation (si présente dans le formulaire)
    if (isset($_POST['send_confirmation'])) {
        $send_confirmation = filter_var($_POST['send_confirmation'], FILTER_VALIDATE_BOOLEAN);
    }
    
    // Validation des données
    if (empty($name)) {
        $error .= "Le nom est requis.<br>";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "Une adresse email valide est requise.<br>";
    }   
    
    if (empty($message)) {
        $error .= "Le message est requis.<br>";
    }
    
    // Si pas d'erreurs, envoi du message
    if (empty($error)) {
        // Définir l'indicateur d'erreur d'email par défaut
        $email_error = false;
        $email_sent = false;

        // Option 1: Utiliser PHPMailer (recommandé)
        // Vérifier si PHPMailer est installé
        if (file_exists('vendor/autoload.php')) {
            require 'vendor/autoload.php';
            
            try {
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                
                // Configuration du serveur
                $mail->isSMTP();                                      // Utiliser SMTP
                $mail->Host       = 'smtp.gmail.com';                 // Serveur SMTP (changer selon votre fournisseur)
                $mail->SMTPAuth   = true;                             // Activer l'authentification SMTP
                $mail->Username   = 'contact.ephsobha@gmail.com';     // SMTP username
                $mail->Password   = 'ljjf slnz avad ovnd';            // SMTP password (utiliser un mot de passe d'application)
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS; // TLS ou SSL
                $mail->Port       = 465;                              // Port SMTP (465 pour SSL, 587 pour TLS)
                $mail->CharSet    = 'UTF-8';                          // Définir l'encodage des caractères
                
                // Configuration anti-spam améliorée
                $mail->XMailer = ' ';                                 // Supprimer l'identification du mailer
                $mail->Encoding = 'base64';                           // Encodage base64 pour éviter certains filtres
                
                // Destinataires
                $mail->setFrom('contact.ephsobha@gmail.com', $hospital_name); // Expéditeur institutionnel, pas l'email du visiteur
                $mail->addAddress($admin_email);                      // Ajouter un destinataire
                $mail->addReplyTo($email, $name);                     // Adresse de réponse -> email du visiteur
                
                // Contenu
                $mail->isHTML(true);
                $subject_text = $subject;
                $mail->Subject = "[Contact Site Web] $subject_text";
                
                // Corps du message en HTML
                $htmlContent = "<h2>Nouveau message de contact</h2>";
                $htmlContent .= "<p><strong>Nom:</strong> $name</p>";
                $htmlContent .= "<p><strong>Email:</strong> $email</p>";
                if (!empty($phone)) {
                    $htmlContent .= "<p><strong>Téléphone:</strong> $phone</p>";
                }
                $htmlContent .= "<p><strong>Sujet:</strong> $subject_text</p>";
                $htmlContent .= "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
                $htmlContent .= "<p>--<br>Ce message a été envoyé depuis le formulaire de contact du site $site_url</p>";
                
                // Version texte brut alternative
                $textContent = "Nom: $name\n";
                $textContent .= "Email: $email\n";
                if (!empty($phone)) {
                    $textContent .= "Téléphone: $phone\n";
                }
                $textContent .= "Sujet: $subject_text\n";
                $textContent .= "\nMessage:\n$message";
                $textContent .= "\n\n--\nCe message a été envoyé depuis le formulaire de contact du site $site_url";
                
                $mail->Body    = $htmlContent;
                $mail->AltBody = $textContent;
                
                $mail->send();
                // Email envoyé avec succès
                $email_sent = true;
                
                // On envoie l'email de confirmation seulement si l'option est activée
                if ($email_sent && $send_confirmation) {
                    $confirmationMail = new PHPMailer\PHPMailer\PHPMailer(true);
                    
                    // Configuration du serveur (même configuration que précédemment)
                    $confirmationMail->isSMTP();
                    $confirmationMail->Host       = 'smtp.gmail.com';
                    $confirmationMail->SMTPAuth   = true;
                    $confirmationMail->Username   = 'contact.ephsobha@gmail.com';
                    $confirmationMail->Password   = 'ljjf slnz avad ovnd';
                    $confirmationMail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
                    $confirmationMail->Port       = 465;
                    $confirmationMail->CharSet    = 'UTF-8';
                    $confirmationMail->XMailer    = ' ';
                    $confirmationMail->Encoding   = 'base64';
                    
                    // Destinataires (cette fois-ci, on envoie au client)
                    $confirmationMail->setFrom('contact.ephsobha@gmail.com', 'EPH SOBHA');
                    $confirmationMail->addAddress($email, $name);
                    
                    // Contenu de la confirmation
                    $confirmationMail->isHTML(true);
                    $confirmationMail->Subject = "Confirmation de réception de votre message";
                    
                    // Message de confirmation en HTML plus simple
                    $confirmationHtml = "
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
                        <h2 style='color: #333;'>Confirmation de réception</h2>
                        
                        <p>Bonjour <strong>$name</strong>,</p>
                        
                        <p>Nous avons bien reçu votre message concernant \"<strong>$subject_text</strong>\". Notre équipe vous recontactera dans les plus brefs délais.</p>
                        
                        <p>Récapitulatif :</p>
                        <ul>
                            <li><strong>Sujet :</strong> $subject_text</li>
                            <li><strong>Message :</strong> " . substr($message, 0, 100) . (strlen($message) > 100 ? "..." : "") . "</li>
                        </ul>
                        
                        <p>Cordialement,<br>
                        <strong>$hospital_name</strong><br>
                        $tagline<br>
                        $site_url</p>
                    </div>";
                    
                    // Version texte brut alternative
                    $confirmationText = "Confirmation de réception\n\n";
                    $confirmationText .= "Bonjour $name,\n\n";
                    $confirmationText .= "Nous avons bien reçu votre message concernant \"$subject_text\". Notre équipe vous recontactera dans les plus brefs délais.\n\n";
                    $confirmationText .= "Récapitulatif :\n";
                    $confirmationText .= "- Sujet : $subject_text\n";
                    $confirmationText .= "- Message : " . substr($message, 0, 100) . (strlen($message) > 100 ? "..." : "") . "\n\n";
                    $confirmationText .= "Cordialement,\n";
                    $confirmationText .= "$hospital_name\n";
                    $confirmationText .= "$tagline\n";
                    $confirmationText .= "$site_url";
                    
                    $confirmationMail->Body    = $confirmationHtml;
                    $confirmationMail->AltBody = $confirmationText;
                    
                    $confirmationMail->send();
                    $confirmation_sent = true;
                }
            } catch (Exception $e) {
                // Enregistrer l'erreur
                error_log("Erreur d'envoi d'email: " . $mail->ErrorInfo);
                $email_error = true;
            }
        } else {
            // Option 2: Utiliser mail() avec plus de contrôle d'erreur
            $to = $admin_email;
            $subject_text = $subject;
            $subject_email = "[Contact Site Web] $subject_text";
            
            // Pour un meilleur format d'email
            $email_content = "<!DOCTYPE html>
            <html>
            <head>
                <meta charset='UTF-8'>
                <title>Nouveau message de contact</title>
            </head>
            <body>
                <h2>Nouveau message de contact</h2>
                <p><strong>Nom:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>";
            
            if (!empty($phone)) {
                $email_content .= "<p><strong>Téléphone:</strong> $phone</p>";
            }
            
            $email_content .= "<p><strong>Sujet:</strong> $subject_text</p>
                <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
                <p>--<br>Ce message a été envoyé depuis le formulaire de contact du site $site_url</p>
            </body>
            </html>";
            
            // En-têtes pour un email HTML
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "From: $hospital_name <contact.ephsobha@gmail.com>\r\n"; // Utiliser l'adresse de l'hôpital
            $headers .= "Reply-To: $email\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            
            // Tenter d'envoyer l'email sans supprimer les erreurs
            $email_sent = mail($to, $subject_email, $email_content, $headers);
            
            if (!$email_sent) {
                $email_error = true;
                // Enregistrer l'erreur
                error_log("Échec de l'envoi d'email via mail() - vérifiez la configuration de votre serveur.");
            }
            
            // Si l'email a été envoyé avec succès et l'option de confirmation est activée
            if ($email_sent && $send_confirmation) {
                // Préparer l'email de confirmation
                $confirmation_to = $email;
                $confirmation_subject = "Confirmation de réception de votre message";
                
                // Message de confirmation en HTML plus simple
                $confirmation_content = "<!DOCTYPE html>
                <html>
                <head>
                    <meta charset='UTF-8'>
                    <title>Confirmation de réception</title>
                </head>
                <body>
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
                        <h2 style='color: #333;'>Confirmation de réception</h2>
                        
                        <p>Bonjour <strong>$name</strong>,</p>
                        
                        <p>Nous avons bien reçu votre message concernant \"<strong>$subject_text</strong>\". Notre équipe vous recontactera dans les plus brefs délais.</p>
                        
                        <p>Récapitulatif :</p>
                        <ul>
                            <li><strong>Sujet :</strong> $subject_text</li>
                            <li><strong>Message :</strong> " . substr($message, 0, 100) . (strlen($message) > 100 ? "..." : "") . "</li>
                        </ul>
                        
                        <p>Cordialement,<br>
                        <strong>$hospital_name</strong><br>
                        $tagline<br>
                        $site_url</p>
                    </div>
                </body>
                </html>";
                
                // En-têtes pour l'email de confirmation
                $confirmation_headers = "MIME-Version: 1.0\r\n";
                $confirmation_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $confirmation_headers .= "From: $hospital_name <contact.ephsobha@gmail.com>\r\n";
                $confirmation_headers .= "X-Mailer: PHP/" . phpversion();
                
                // Envoi de l'email de confirmation
                mail($confirmation_to, $confirmation_subject, $confirmation_content, $confirmation_headers);
                $confirmation_sent = true;
            }
        }

        // Si l'email a été envoyé avec succès
        if ($email_sent) {
            // Redirection pour éviter les soumissions multiples
            // Assurez-vous qu'aucun contenu n'a été envoyé avant cette ligne
            header("Location: process_contact.php?status=success" . ($send_confirmation && $confirmation_sent ? "&confirmation=sent" : ""));
            exit;
        } else {
            $error = 'Erreur lors de l\'envoi de votre message. Veuillez réessayer.';
        }
    }
}

// Déplacez l'inclusion de l'en-tête après la logique de redirection
// pour éviter les erreurs "headers already sent"
include('header.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement du message - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/contact.jpg');
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

        /* Section Styling */
        .section {
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #2a5a86;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: #4caf50;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.5s ease;
        }

        .message-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 50px;
            margin: 20px auto;
            text-align: center;
            max-width: 800px;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .message-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .message-icon {
            font-size: 5rem;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .message-card:hover .message-icon {
            transform: scale(1.1);
        }

        .success-icon {
            color: #4caf50;
        }

        .error-icon {
            color: #f44336;
        }

        .message-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #2a5a86;
            font-weight: 600;
        }

        .message-text {
            margin-bottom: 30px;
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }

        .btn:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        .btn i {
            margin-left: 8px;
        }

        /* Animation pour l'apparition des éléments */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-up.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.5rem;
            }
            
            .page-title p {
                font-size: 1.1rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .message-card {
                padding: 30px;
            }
            
            .message-icon {
                font-size: 4rem;
            }
            
            .message-title {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .message-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Traitement du Message</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Merci de nous avoir contacté</p>
        </div>
    </section>

    <!-- Message Result Section -->
    <section class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="800">
                <h2>Statut de Votre Message</h2>
                <p>Nous vous remercions de l'intérêt que vous portez à notre établissement</p>
            </div>
            
            <?php if ($success): ?>
                <div class="message-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="message-icon success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="message-title">Message Envoyé!</h2>
                    <p class="message-text">Votre message a été envoyé avec succès. Nous vous contacterons bientôt.</p>
                    <?php if (isset($confirmation_sent) && $confirmation_sent): ?>
                    <p class="message-text">Un email de confirmation vous a été envoyé à l'adresse indiquée. Si vous ne le trouvez pas dans votre boîte de réception, veuillez vérifier votre dossier spam.</p>
                    <?php endif; ?>
                    <a href="index.php" class="btn">Retour à l'accueil <i class="fas fa-home"></i></a>
                </div>
            <?php elseif (!empty($error)): ?>
                <div class="message-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="message-icon error-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h2 class="message-title">Erreur</h2>
                    <p class="message-text"><?php echo $error; ?></p>
                    <a href="javascript:history.back()" class="btn">Retour au formulaire <i class="fas fa-arrow-left"></i></a>
                </div>
            <?php else: ?>
                <div class="message-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="message-icon error-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h2 class="message-title">Accès Incorrect</h2>
                    <p class="message-text">Vous avez accédé à cette page directement. Veuillez utiliser le formulaire de contact pour nous envoyer un message.</p>
                    <a href="contact.php#contact" class="btn">Aller au formulaire de contact <i class="fas fa-paper-plane"></i></a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Script AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialiser AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: false,
                mirror: false,
                offset: 120,
                easing: 'ease-out-back'
            });

            // Ajout d'effet de parallaxe au défilement
            window.addEventListener('scroll', function() {
                const scrolled = window.scrollY;
                const parallaxElements = document.querySelectorAll('.page-title');
                
                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    element.style.backgroundPositionY = -(scrolled * speed) + 'px';
                });
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
        
        // Rafraîchir AOS lors du redimensionnement de la fenêtre
        window.addEventListener('resize', function() {
            AOS.refresh();
        });
    </script>
</body>

</html>

<?php include('footer.php'); ?>