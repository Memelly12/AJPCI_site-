<?php 
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once "../config.php";
    
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date_naissance = $_POST["date_naissance"];
        $localisation = $_POST["localisation"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $profession = $_POST["profession"];
        $niveau_etude = $_POST["niveau_etude"];
        $select = $_POST["statut"];
    
        // Dossier où vous souhaitez stocker les images
        $dossier_images = "images/";
    
        // Nom du fichier
        $nom_fichier = $_FILES["image_maison"]["name"];
         
        // Chemin temporaire du fichier
        $chemin_temporaire = $_FILES["image_maison"]["tmp_name"];
    
        // Chemin complet du fichier
        $upload = $dossier_images . $nom_fichier;
    
        // Chemin temporaire du fichier
        $chemin_temporaire = $_FILES["image_maison"]["tmp_name"];

        $sql = "INSERT INTO ADHERANTS (NOM, PRENOM, DATE_NAISSANCE, LIEU_HABITATION, TELEPHONE, EMAIL, PROFESSION, NIVEAU_ETUDE, CHEMIN_IMAGE, STATUT) VALUES ('$nom', '$prenom', '$date_naissance', '$localisation', '$tel', '$email', '$profession', '$niveau_etude', '$upload', 'EN ATTENTE');";
    
        if (mysqli_query($conn, $sql)) {
            echo "Le contact a été ajouté avec succès !";
            
        } else {
            echo "Erreur lors de l'ajout du contact : " . mysqli_error($conn);
        }

        if (move_uploaded_file($chemin_temporaire, $upload)) {
            // Le téléchargement a réussi, maintenant on peut effectuer l'insertion en base de données
        
    
           
        } else {
            echo "Échec du téléchargement de l'image.";
            error_log("Échec du téléchargement de l'image. Dossier : $dossier_images, Nom du fichier : $nom_fichier");
    
        }
    
        // Fermeture de la connexion
        mysqli_close($conn);
    }


































    