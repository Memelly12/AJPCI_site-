<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../config.php";

    $ID = $_POST["ID"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $date_naissance = $_POST["date_naissance"];
    $localisation = $_POST["localisation"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $profession = $_POST["profession"];
    $niveau_etude = $_POST["niveau_etude"];
    $select = $_POST["statut"];

    $dossier_images = "images/";
    
    // Nom du fichier
    $nom_fichier = $_FILES["image_maison"]["name"];
     
    // Chemin temporaire du fichier
    $chemin_temporaire = $_FILES["image_maison"]["tmp_name"];

    // Chemin complet du fichier
    $upload = $dossier_images . $nom_fichier;

    // Chemin temporaire du fichier
    $chemin_temporaire = $_FILES["image_maison"]["tmp_name"];

    $sql = "UPDATE ADHERANTS SET NOM = '$nom', PRENOM = '$prenom', DATE_NAISSANCE = '$date_naissance', LIEU_HABITATION = '$localisation', TELEPHONE = '$tel', EMAIL = '$email', PROFESSION = '$profession', NIVEAU_ETUDE = '$niveau_etude', CHEMIN_IMAGE = '$upload', STATUT = '$select'  WHERE ID = $ID ";
    
    if (mysqli_query($conn, $sql)) {
        
    } else {
        echo "Erreur de modification : " . mysqli_error($conn);
    } 
}
if (move_uploaded_file($chemin_temporaire, $upload)) {
    header("location: offres.php");
        exit();
    // Le téléchargement a réussi, maintenant on peut effectuer l'insertion en base de données


   
} else {
    echo "ajoutez une image";
    error_log("Échec du téléchargement de l'image. Dossier : $dossier_images, Nom du fichier : $nom_fichier");

}
?>

</body>
</html>
