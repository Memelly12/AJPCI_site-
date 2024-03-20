<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once "config.php";
    
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $adresse = $_POST["adresse"];
        $telephone = $_POST["telephone"];
        $email = $_POST["email"];
        $type_demande = $_POST["demande"];
        $type_maison = $_POST["type_maison"];
        $nombre_pieces = $_POST["nombre_pieces"];
        
        // Récupérez les autres champs saisis ici
    
        // Requête SQL d'insertion
        $sql = "INSERT INTO Clients (nom, prenom, adresse, telephone, email, nombre_pieces, type_demande, type_maison) VALUES ('$nom', '$prenom', '$adresse', '$telephone', '$email', '$nombre_pieces', '$type_demande', '$type_maison')";
    
        if (mysqli_query($conn, $sql)) {
            echo "Le contact a été ajouté avec succès !";
            header("location: demand_immo.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout du contact : " . mysqli_error($conn);
        }
    
        // Fermeture de la connexion
        mysqli_close($conn);
    }
    ?>
    
