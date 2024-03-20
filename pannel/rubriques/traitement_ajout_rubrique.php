<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["ajouter"]))  {
    $connexion = new mysqli("localhost", "root", "Memlie234", "AJPCI");
    if ($connexion->connect_error) {
        die("La connexion a échoué : " . $connexion->connect_error);
    }

    $requete = $connexion->prepare("INSERT INTO rubriques (nom_rubrique, message_rubrique, images_rubrique) VALUES (?, ?, ?)");

    // Vérification de la préparation de la requête
    if ($requete === false) {
        die("Erreur lors de la préparation de la requête : " . $connexion->error);
    }

    // Récupération des valeurs des champs de formulaire
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

    // Liaison des paramètres
    $requete->bind_param("sss", $nom_rubrique, $message_rubrique, $upload);

    // Exécution de la requête
    if ($requete->execute()) {
        echo "La rubrique a été ajoutée avec succès.";

        // Déplacement du fichier vers le dossier d'images
        if (move_uploaded_file($chemin_temporaire, $upload)) {
            echo "Le fichier a été téléchargé avec succès.";
        } else {
            echo "Échec du téléchargement de l'image.";
            error_log("Échec du téléchargement de l'image. Dossier : $dossier_images, Nom du fichier : $nom_fichier");
        }
    } else {
        echo "Erreur lors de l'ajout de la rubrique : " . $requete->error;
    }

    // Fermeture de la requête et de la connexion
    $requete->close();
    $connexion->close();
}

?>
