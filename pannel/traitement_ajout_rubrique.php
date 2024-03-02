<?php




if (isset($_POST["ajouter"]))  {
    $connexion = new mysqli("localhost", "root", "Memlie234", "AJPCI");

    
    $nom_rubrique = $_POST["nom_rubrique"];
    $message_rubrique = $_POST["message_rubrique"];

    // Dossier où vous souhaitez stocker les images
    $dossier_images = "images_rub/";

    // Nom du fichier
    $nom_fichier = $_FILES["images_rubrique"]["name"];

    // Chemin complet du fichier
    $upload = $dossier_images . $nom_fichier;

    // Chemin temporaire du fichier
    $chemin_temporaire = $_FILES["images_rubrique"]["tmp_name"];
    $requete = "INSERT INTO rubriques (nom_rubrique, message_rubrique, images_rubrique) VALUES ('$nom_rubrique', '$message_rubrique', '$upload')";

    if (mysqli_query($connexion, $requete)) {
        echo "La rubrique a été ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la rubrique : " . $connexion->error;
    }


   

    // Déplacement du fichier vers le dossier d'images
    if (move_uploaded_file($chemin_temporaire, $upload)) {
        // Le téléchargement a réussi, maintenant on peut effectuer l'insertion en base de données
    

       
    } else {
        echo "Échec du téléchargement de l'image.";
        error_log("Échec du téléchargement de l'image. Dossier : $dossier_images, Nom du fichier : $nom_fichier");

    }
}

?>
