<?php
/**
 * Configuration de la base de données
 * Fichier à sécuriser et à ne pas inclure dans le dépôt git
 */

// Informations de connexion à la base de données
define('DB_HOST', 'sql7.freesqldatabase.com');     // Hôte de la base de données
define('DB_NAME', 'sql7778050');     // Nom de la base de données
define('DB_USER', 'sql7778050');          // Utilisateur de la base de données
define('DB_PASS', 'P7DqA1xWhU');              // Mot de passe (à changer en production)

// Configuration du site
define('SITE_NAME', 'EPH SOBHA');
define('SITE_TAGLINE', 'Au service de votre santé');
define('SITE_URL', 'https://ephsobha.onrender.com/'); // URL de base du site

// Dossiers
define('UPLOADS_DIR', $_SERVER['DOCUMENT_ROOT'] . '/eph-sobha/uploads/'); // Chemin absolu
define('UPLOADS_URL', SITE_URL . '/uploads/'); // URL pour accéder aux fichiers

// Langues disponibles
define('AVAILABLE_LANGUAGES', ['fr', 'ar']);
define('DEFAULT_LANGUAGE', 'fr');

// Paramètres de pagination
define('ITEMS_PER_PAGE', 10);