<?php
$servername = "localhost";  // Adresse du serveur MySQL
$username = "root";  // Nom d'utilisateur MySQL
$password = "Memlie234";  // Mot de passe MySQL

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Créer une nouvelle base de données
$dbname = "gestion_co";
$sqlCreateDB = "CREATE DATABASE $dbname";

if ($conn->query($sqlCreateDB) === TRUE) {
    echo "Base de données créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
}

// Utiliser la base de données nouvellement créée
$conn->select_db($dbname);

// Créer une nouvelle table
$sqlCreateTable = "CREATE TABLE utilisateurs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    non_utilisateur VARCHAR(30) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL
)";

if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table créée avec succès.";
} else {
    echo "Erreur lors de la création de la table : " . $conn->error;
}

// Fermer la connexion
$conn->close();
?>
