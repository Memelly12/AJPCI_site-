<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Ajout Rubrique</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Ajouter une nouvelle rubrique</h2>
    <form action="traitement_ajout_rubrique.php" method="post" enctype="multipart/form-data">
        <label for="nom_rubrique">Nom de la rubrique :</label>
        <input type="text" name="nom_rubrique" id="nom_rubrique" required>
        <br>
        
        
        <br>
        <label for="message_rubrique">Message de la rubrique :</label>
        <textarea name="message_rubrique" id="message_rubrique"  required></textarea>
        <br>
        <label for="images_rubrique">Image de la rubrique :</label>
        <input type="file" name="images_rubrique" id="images_rubrique"  onchange="previsualiserImage(event)">
        <br>
        <img id="imagePrevisualisation" alt="Aperçu de l'image" style="max-width: 100%; max-height: 200px; margin-top: 10px;">
        <br>
        <input type="submit" name="ajouter">
    </form>

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
</body>
</html>
