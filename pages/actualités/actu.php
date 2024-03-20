<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    require_once('header.php') 
    ?>
    
    <section class="section1 reveal-1">
        <h1 class="reveal-2">ACTUALITÉS</h1>
        
    </section>
    
    
    <?php
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);

                        $connexion = new mysqli("localhost", "root", "Memlie234", "AJPCI");

                

                         // Récupérer les deux dernières rubriques
                        $requete = "SELECT * FROM rubriques ORDER BY id_rubrique DESC LIMIT 4";
                         $resultat = mysqli_query($connexion, $requete);

                
                        if (mysqli_num_rows($resultat) > 0) {
                            while ($row = mysqli_fetch_assoc($resultat)) {
                               
?>

<section>
    <div class="container">
        <div class="row row1">
            <div class="col-10 reveal-2">
                <img src="../../pannel/rubriques/<?php echo $row["images_rubrique"] ?>" alt="">
            </div>
            <div class="col-10 reveal-1">
                <h2>
                    <?php 
                        echo $row["nom_rubrique"]
                    ?>
                </h2>
                <p>
                    <?php 
                        echo $row["message_rubrique"]
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>

                               
<?php
                            }
                        } else {
                            echo '<div class="aucune_rubrique">Aucune actualité pour le moment</div>';
                        }

                        $connexion->close();
?>
<?php require_once('../../footer.php') ?>
   
    

    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../../script.js"></script>
</body>
</html>