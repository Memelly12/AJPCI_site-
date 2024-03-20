<!DOCTYPE html>
<html>
<head>
    <title>Modifier un contact</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<body>
    <div class="container">
        <h2>Modifier un contact</h2>
        <?php
        require_once "config.php";

        if (isset($_GET["id"])) {
            $id_client = $_GET["id"];

            // Requête SQL de sélection pour récupérer les informations du contact
            $sql = "SELECT * FROM Clients WHERE clientID = $id_client";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $client = mysqli_fetch_assoc($result);
        ?>
        <form action="modif2.php" method="post">
            <input type="hidden" id="clientID"  name="clientID"  value="<?php echo $client['clientID']; ?>">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $client['nom']; ?>" required>
            <label for="premon">prenom :</label>
           <input type="text" name="prenom" id="prenom" value="<?php echo $client['prenom']; ?> " required>
           <label for="adresse">adresse :</label>
           <input type="text" name="adresse" id="adresse" value="<?php echo $client['adresse']; ?> " required> 
           <label for="telephone">telephone :</label>
           <input type="text" name="telephone" id="telephone" value="<?php echo $client['telephone']; ?> " required>
           <label for="email">email :</label>
           <input type="text" name="email" id="email" value="<?php echo $client['email']; ?> " required>
           <input type="submit" value="Modifier">
           <label for="demande">type de demande</label>
            <input type="text" name="demande" id="demande" value="<?php echo $client['type_demande']; ?>"> <br>
            <label for="type_maison">type de maison :</label>
            <input type="text" name="type_maison" id="type_maison" value="<?php echo $client['type_maison']; ?>">
            <label for="nombre_pieces">nombre de pieces ;</label>                
            <input type="number" name="nombre_pieces" id="nombre_pieces" value="<?php echo $client['nombre_pieces']; ?>">
        </form>
        <?php
            } else {
                echo "Contact introuvable.";
            }
        } else {
            echo "ID de contact non spécifié.";
        }

        // Fermeture de la connexion
        mysqli_close($conn);
        ?>
        
    </div>
    
    <div class="deconexion"><a href="index.php">page precedente</a></div>
</body>
</html>





