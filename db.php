<?php
$servername = "sql7.freesqldatabase.com";
$username = "sql7778050";
$password = "P7DqA1xWhU";
$dbname = "sql7778050";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Définir l'encodage de la connexion à UTF-8
$conn->set_charset("utf8mb4");
?>