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
        require_once "../config.php";

        if (isset($_GET["id"])) {
            $id_client = $_GET["id"];

            // Requête SQL de sélection pour récupérer les informations du contact
            $sql = "SELECT * FROM ADHERANTS WHERE ID = $id_client";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $adherants = mysqli_fetch_assoc($result);
        ?>
        <form action="modif2.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?php echo  $adherants['ID'] ; ?>">
            
            <label for="nom">Nom</label>
                <input type="text" name="nom" value="<?php echo  $adherants['NOM'] ; ?>">
               
                <label for="prenom">prenom</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo  $adherants['PRENOM'] ; ?>" required><br>
                <label for="date_naissance">Date de naissance</label>
                <input type="date"  name="date_naissance" value="<?php echo  $adherants['DATE_NAISSANCE'] ; ?>" required><br>
                <label for="localisation">Lieu d'habitation</label>
                <input type="text" name="localisation" value="<?php echo  $adherants['LIEU_HABITATION'] ; ?>" required><br>
                <label for="tel">téléphone</label>
                <input type="text" name="tel" value="<?php echo  $adherants['TELEPHONE'] ; ?>"  required> <br>
                <label for="email">email</label>
                <input type="email" name="email" value="<?php echo  $adherants['EMAIL'] ; ?>" > <br>
                <label for="profession">Profession</label>
                <input type="text" name="profession" value="<?php echo  $adherants['PROFESSION'] ; ?>" > <br>
                <label for="niveau_etude">Niveau d'étude</label>
                <input type="text" name="niveau_etude" value="<?php echo  $adherants['NIVEAU_ETUDE'] ; ?>" > <br>
               <select name="statut" value="<?php echo  $adherants['STATUT'] ; ?>" id="">
               <option value="EN ATTENTE">EN ATTENTE</option>
               <option value="CONFIRMÉ">CONFIRMÉ</option>
               </select>
               

                <input type="file" name="image_maison"  id="image_maison"   onchange="previsualiserImage(event)">
                    <br>
                    <div class="imagePrevisualisation"><img id="imagePrevisualisation" alt="Aperçu de l'image" style="max-width: 100%; max-height: 200px; margin-top: 10px;"></div>
                    
                    <br>
                    <script>
                    function previsualiserImage(event) {
                        var input = event.target;
                        var imagePrevisualisation = document.getElementById("imagePrevisualisation");

                        var reader = new FileReader();
                        reader.onload = function(){
                            imagePrevisualisation.src = reader.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                </script>

                <button type="submit">Enregistrer</button>
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





