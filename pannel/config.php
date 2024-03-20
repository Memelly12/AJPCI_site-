<?php
$servername = "localhost";
 $username = "root";
 $password = "Memlie234";
 $dbname = "AJPCI";

 // Connexion à la base de données gestion_contacts
 $conn = mysqli_connect($servername, $username, $password, $dbname);

 // Vérification de la connexion
 if (!$conn) {

die("La connexion à la base de données a échoué : " . mysqli_connect_error());
 }
?>