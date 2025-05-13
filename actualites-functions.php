<?php
/**
 * Fonctions spécifiques pour la gestion des actualités
 */

// Inclure la connexion à la base de données si ce n'est pas déjà fait
if (!function_exists('db_connect')) {
    require_once 'db.php';
}
/**
 * Fichier gérant la connexion à la base de données
 * et fournissant des fonctions utilitaires pour interagir avec la BDD
 */

// Inclure la configuration
require_once 'config.php';

/**
 * Établit une connexion à la base de données
 * @return PDO Instance de connexion à la base de données
 */
function db_connect() {
    static $pdo = null;
    
    if ($pdo === null) {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            // En production, il faudrait logger l'erreur et afficher un message générique
            die('Erreur de connexion à la base de données: ' . $e->getMessage());
        }
    }
    
    return $pdo;
}

/**
 * Exécute une requête SQL et retourne tous les résultats
 * @param string $sql Requête SQL à exécuter
 * @param array $params Paramètres à lier à la requête
 * @return array Résultats de la requête
 */
function db_query($sql, $params = []) {
    try {
        $pdo = db_connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        // En production, il faudrait logger l'erreur et afficher un message générique
        die('Erreur lors de l\'exécution de la requête: ' . $e->getMessage());
    }
}

/**
 * Exécute une requête SQL et retourne un seul résultat
 * @param string $sql Requête SQL à exécuter
 * @param array $params Paramètres à lier à la requête
 * @return array|null Résultat de la requête ou null si aucun résultat
 */
function db_query_single($sql, $params = []) {
    try {
        $pdo = db_connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch();
        return $result !== false ? $result : null;
    } catch (PDOException $e) {
        // En production, il faudrait logger l'erreur et afficher un message générique
        die('Erreur lors de l\'exécution de la requête: ' . $e->getMessage());
    }
}

/**
 * Exécute une requête SQL de type INSERT, UPDATE ou DELETE
 * @param string $sql Requête SQL à exécuter
 * @param array $params Paramètres à lier à la requête
 * @return int Nombre de lignes affectées
 */
function db_execute($sql, $params = []) {
    try {
        $pdo = db_connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    } catch (PDOException $e) {
        // En production, il faudrait logger l'erreur et afficher un message générique
        die('Erreur lors de l\'exécution de la requête: ' . $e->getMessage());
    }
}

/**
 * Insère une ligne dans une table
 * @param string $table Nom de la table
 * @param array $data Données à insérer (associatif colonne => valeur)
 * @return int|bool ID de la dernière insertion ou false en cas d'échec
 */
function db_insert($table, $data) {
    try {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        
        $pdo = db_connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_values($data));
        
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        // En production, il faudrait logger l'erreur et afficher un message générique
        die('Erreur lors de l\'insertion: ' . $e->getMessage());
    }
}

/**
 * Met à jour une ou plusieurs lignes dans une table
 * @param string $table Nom de la table
 * @param array $data Données à mettre à jour (associatif colonne => valeur)
 * @param string $where Condition WHERE (sans le mot-clé WHERE)
 * @param array $whereParams Paramètres à lier à la condition WHERE
 * @return int Nombre de lignes affectées
 */
function db_update($table, $data, $where, $whereParams = []) {
    try {
        $setClauses = [];
        foreach ($data as $column => $value) {
            $setClauses[] = "$column = ?";
        }
        
        $sql = "UPDATE $table SET " . implode(', ', $setClauses) . " WHERE $where";
        
        $params = array_merge(array_values($data), $whereParams);
        
        $pdo = db_connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->rowCount();
    } catch (PDOException $e) {
        // En production, il faudrait logger l'erreur et afficher un message générique
        die('Erreur lors de la mise à jour: ' . $e->getMessage());
    }
}

/**
 * Supprime une ou plusieurs lignes dans une table
 * @param string $table Nom de la table
 * @param string $where Condition WHERE (sans le mot-clé WHERE)
 * @param array $params Paramètres à lier à la condition WHERE
 * @return int Nombre de lignes affectées
 */
function db_delete($table, $where, $params = []) {
    try {
        $sql = "DELETE FROM $table WHERE $where";
        
        $pdo = db_connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->rowCount();
    } catch (PDOException $e) {
        // En production, il faudrait logger l'erreur et afficher un message générique
        die('Erreur lors de la suppression: ' . $e->getMessage());
    }
}

/**
 * Échappe une chaîne de caractères pour l'affichage HTML
 * @param string $str Chaîne à échapper
 * @return string Chaîne échappée
 */
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Récupère toutes les actualités publiées avec pagination
 * 
 * @param int $page Numéro de page courante
 * @param int $items_per_page Nombre d'éléments par page
 * @param string $langue Filtre par langue (optionnel)
 * @return array Liste des actualités et informations de pagination
 */
function get_actualites($page = 1, $items_per_page = ITEMS_PER_PAGE, $langue = null) {
    // Valider les paramètres
    $page = max(1, (int) $page);
    $items_per_page = max(1, (int) $items_per_page);
    
    // Préparer la requête SQL de base
    $sql_count = "SELECT COUNT(*) as total FROM actualites WHERE statut = 'publie'";
    $sql = "SELECT id, titre, slug, date_publication, image, resume, contenu, langue, statut 
            FROM actualites 
            WHERE statut = 'publie'";
    
    $params = [];
    
    // Ajouter le filtre de langue si spécifié
    if ($langue !== null && in_array($langue, AVAILABLE_LANGUAGES)) {
        $sql_count .= " AND langue = ?";
        $sql .= " AND langue = ?";
        $params[] = $langue;
    }
    
    // Calculer le nombre total d'actualités
    $result = db_query_single($sql_count, $params);
    $total_items = $result['total'];
    
    // Calculer le nombre total de pages
    $total_pages = ceil($total_items / $items_per_page);
    
    // Ajuster la page si nécessaire
    $page = min($page, max(1, $total_pages));
    
    // Calculer l'offset pour la pagination
    $offset = ($page - 1) * $items_per_page;
    
    // Compléter la requête avec l'ordre et la pagination
    $sql .= " ORDER BY date_publication DESC LIMIT ? OFFSET ?";
    $params[] = $items_per_page;
    $params[] = $offset;
    
    // Exécuter la requête
    $actualites = db_query($sql, $params);
    
    // Retourner les résultats avec les informations de pagination
    return [
        'actualites' => $actualites,
        'pagination' => [
            'current_page' => $page,
            'total_pages' => $total_pages,
            'total_items' => $total_items,
            'items_per_page' => $items_per_page
        ]
    ];
}

/**
 * Récupère une actualité par son ID
 * 
 * @param int $id ID de l'actualité
 * @return array|null Données de l'actualité ou null si non trouvée
 */
function get_actualite_by_id($id) {
    $sql = "SELECT id, titre, slug, date_publication, image, resume, contenu, langue, statut 
            FROM actualites 
            WHERE id = ? AND statut = 'publie'";
    
    return db_query_single($sql, [(int) $id]);
}

/**
 * Récupère une actualité par son slug
 * 
 * @param string $slug Slug de l'actualité
 * @return array|null Données de l'actualité ou null si non trouvée
 */
function get_actualite_by_slug($slug) {
    $sql = "SELECT id, titre, slug, date_publication, image, resume, contenu, langue, statut 
            FROM actualites 
            WHERE slug = ? AND statut = 'publie'";
    
    return db_query_single($sql, [$slug]);
}

/**
 * Récupère les actualités connexes (même langue, hors actualité courante)
 * 
 * @param int $id ID de l'actualité courante à exclure
 * @param string $langue Langue des actualités à récupérer
 * @param int $limit Nombre maximum d'actualités à récupérer
 * @return array Liste des actualités connexes
 */
function get_related_actualites($id, $langue, $limit = 3) {
    $sql = "SELECT id, titre, slug, date_publication, image, resume, langue 
            FROM actualites 
            WHERE langue = ? AND id != ? AND statut = 'publie' 
            ORDER BY date_publication DESC 
            LIMIT ?";
    
    return db_query($sql, [$langue, (int) $id, (int) $limit]);
}

/**
 * Récupère les années distinctes des actualités publiées
 * 
 * @return array Liste des années des actualités
 */
function get_actualites_years() {
    $sql = "SELECT DISTINCT YEAR(date_publication) as year 
            FROM actualites 
            WHERE statut = 'publie' 
            ORDER BY year DESC";
    
    return db_query($sql);
}

/**
 * Formatte une date selon la langue spécifiée
 * 
 * @param string $date_str Date au format MySQL (YYYY-MM-DD)
 * @param string $langue Code de langue ('fr' ou 'ar')
 * @return string Date formatée selon la langue
 */
/**
 * Formatte une date selon la langue spécifiée
 * 
 * @param string $date_str Date au format MySQL (YYYY-MM-DD)
 * @param string $langue Code de langue ('fr' ou 'ar')
 * @return string Date formatée selon la langue
 */
function format_date($date_str, $langue = 'fr') {
    $timestamp = strtotime($date_str);
    
    if ($langue == 'fr') {
        // Format français: 15 avril 2025
        $months_fr = [
            1 => 'janvier', 2 => 'février', 3 => 'mars', 4 => 'avril',
            5 => 'mai', 6 => 'juin', 7 => 'juillet', 8 => 'août',
            9 => 'septembre', 10 => 'octobre', 11 => 'novembre', 12 => 'décembre'
        ];
        
        $day = date('j', $timestamp);
        $month = (int)date('n', $timestamp);
        $year = date('Y', $timestamp);
        
        return $day . ' ' . $months_fr[$month] . ' ' . $year;
    } elseif ($langue == 'ar') {
        // Format arabe avec les noms de mois en arabe
        $day = date('j', $timestamp);
        $month = (int)date('n', $timestamp);
        $year = date('Y', $timestamp);
        
        // Tableau des mois en arabe
        $ar_months = [
            1 => 'يناير', 2 => 'فبراير', 3 => 'مارس', 4 => 'أبريل',
            5 => 'مايو', 6 => 'يونيو', 7 => 'يوليو', 8 => 'أغسطس',
            9 => 'سبتمبر', 10 => 'أكتوبر', 11 => 'نوفمبر', 12 => 'ديسمبر'
        ];
        
        return $day . ' ' . $ar_months[$month] . ' ' . $year;
    } else {
        // Format par défaut
        return date('d/m/Y', $timestamp);
    }
}

/**
 * Génère un slug à partir d'un titre
 * 
 * @param string $title Titre à convertir en slug
 * @return string Slug généré
 */
function generate_slug($title) {
    // Translittération pour convertir les caractères accentués
    $slug = transliterator_transliterate('Any-Latin; Latin-ASCII; Lower()', $title);
    
    // Remplacer tous les caractères non alphanumériques par des tirets
    $slug = preg_replace('/[^a-z0-9]+/', '-', strtolower($slug));
    
    // Supprimer les tirets en début et fin de chaîne
    $slug = trim($slug, '-');
    
    return $slug;
}

/**
 * Crée une nouvelle actualité avec des champs supplémentaires pour l'admin
 * 
 * @param array $data Données de l'actualité
 * @return int|bool ID de l'actualité créée ou false en cas d'échec
 */
function create_actualite($data) {
    // Valider les données minimales requises
    if (empty($data['titre']) || empty($data['langue'])) {
        return false;
    }
    
    // Générer un slug si non fourni
    if (empty($data['slug'])) {
        $data['slug'] = generate_slug($data['titre']);
    }
    
    // S'assurer que toutes les clés nécessaires sont présentes
    $fields = [
        'titre' => '',
        'slug' => '',
        'date_publication' => date('Y-m-d'),
        'image' => null,
        'resume' => '',
        'contenu' => null,
        'langue' => DEFAULT_LANGUAGE,
        'statut' => 'brouillon',
        'meta_description' => null,
        'tags' => null,
        'date_creation' => date('Y-m-d H:i:s')
    ];
    
    // Fusionner les données fournies avec les valeurs par défaut
    $actualite_data = array_merge($fields, array_intersect_key($data, $fields));
    
    // Insérer dans la base de données
    return db_insert('actualites', $actualite_data);
}

/**
 * Met à jour une actualité existante
 * 
 * @param int $id ID de l'actualité à mettre à jour
 * @param array $data Données à mettre à jour
 * @return int Nombre de lignes affectées (1 si succès, 0 si échec)
 */
function update_actualite($id, $data) {
    // Valider l'ID
    if (!is_numeric($id) || $id <= 0) {
        return 0;
    }
    
    // Définir les champs autorisés à être mis à jour
    $allowed_fields = [
        'titre', 'slug', 'date_publication', 'image', 
        'resume', 'contenu', 'langue', 'statut'
    ];
    
    // Filtrer les données pour ne garder que les champs autorisés
    $update_data = array_intersect_key($data, array_flip($allowed_fields));
    
    // Si le titre est modifié mais pas le slug, générer un nouveau slug
    if (isset($update_data['titre']) && !isset($update_data['slug'])) {
        $update_data['slug'] = generate_slug($update_data['titre']);
    }
    
    // S'il n'y a pas de données à mettre à jour, retourner 0
    if (empty($update_data)) {
        return 0;
    }
    
    // Mettre à jour l'actualité
    return db_update('actualites', $update_data, 'id = ?', [$id]);
}

/**
 * Supprime une actualité
 * 
 * @param int $id ID de l'actualité à supprimer
 * @return int Nombre de lignes affectées (1 si succès, 0 si échec)
 */
function delete_actualite($id) {
    // Valider l'ID
    if (!is_numeric($id) || $id <= 0) {
        return 0;
    }
    
    // Supprimer l'actualité
    return db_delete('actualites', 'id = ?', [$id]);
}

/**
 * Archive une actualité au lieu de la supprimer
 * 
 * @param int $id ID de l'actualité à archiver
 * @return int Nombre de lignes affectées (1 si succès, 0 si échec)
 */
function archive_actualite($id) {
    // Mettre à jour le statut de l'actualité à 'archive'
    return update_actualite($id, ['statut' => 'archive']);
}

/**
 * Récupère les actualités récentes pour l'affichage sur la page d'accueil
 * 
 * @param int $limit Nombre d'actualités à récupérer
 * @param string $langue Filtre par langue (null pour toutes les langues)
 * @return array Liste des actualités récentes
 */
function get_recent_actualites($limit = 5, $langue = null) {
    $sql = "SELECT id, titre, slug, date_publication, image, resume, langue 
            FROM actualites 
            WHERE statut = 'publie'";
    
    $params = [];
    
    // Ajouter le filtre de langue si spécifié
    if ($langue !== null && in_array($langue, AVAILABLE_LANGUAGES)) {
        $sql .= " AND langue = ?";
        $params[] = $langue;
    }
    
    // Compléter la requête avec l'ordre et la limite
    $sql .= " ORDER BY date_publication DESC LIMIT ?";
    $params[] = (int) $limit;
    
    return db_query($sql, $params);
}