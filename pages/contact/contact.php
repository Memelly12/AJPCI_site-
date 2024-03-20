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
    
    <section class="section1">
        <h1>
            ADHÉSION
        </h1>

    </section>
    <section class="section3">
        <div class="container">
            <div class="row row1">
                <div class="col-lg-2 col-4">
                    <img src="../images/Logo Associatif_page-0001.jpg" alt="">
                </div>
                <div class="col-lg-6 col-12">
                    <h3>Integrez l'AJPCI</h3>
                </div>
            </div>
            
               
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class=" row form_adhesion justify-content-space-around " method="post" enctype="multipart/form-data">
                <h3> FORMULAIRE D'ADHESION </h3>
                <div class="col-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control"  name="nom">
                </div>
               
                <div class="col-6">
                    <label for="prenom" class="form-label">prenoms</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" required><br>
                </div>
                
                <div class="col-6">
                    <label for="date_naissance" class="form-label">Date de naissance</label>
                     <input type="date"  class="form-control" name="date_naissance" required><br>
                </div>
                
                <div class="col-6">
                 <label for="localisation" class="form-label">Lieu d'habitation</label>
                    <input type="text" class="form-control"   name="localisation" required><br>
                </div>
                <div class="col-6">
                    <label for="tel" class="form-label">téléphone</label>
                    <input type="text" class="form-control"  name="tel"  required> <br>
                </div>
                <div class="col-6">
                     <label for="email" class="form-label"  class="form-label"> email</label>
                     <input type="email" class="form-control"  name="email" > <br>
                </div>
                <div class="col-6">
                     
                <label for="profession" class="form-label">Profession</label>
                <input type="text" class="form-control"  name="profession" > <br>
                </div>
                <div class="col-6">
                <label for="niveau_etude" class="form-label">Niveau d'étude</label>
                <input type="text" class="form-control"  name="niveau_etude" > <br>
                </div>
                
                
               
               <div class="col-lg-10 col-8">
                    <label for="image_maison">Photo d'identité</label>
                    <input type="file" class="form-control mx-5" name="image_maison" id="image_maison"  onchange="previsualiserImage(event)">
                    <br>
                    <div class="imagePrevisualisation"><img id="imagePrevisualisation" alt="Aperçu de l'image" style="max-width: 100%; max-height: 200px; margin-top: 10px;"></div>

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

               </div>
                    
               
               

                
                    
                    <br>
                <h3>PERSONNE À CONTACTER EN CAS D'URGENCE</h3>
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nom_parents">
                <label for="prenom" class="form-label">prenoms</label>
                <input type="text" class="form-control" id="prenom_parents" name="prenom_parents" ><br>
                <label for="tel_parents" class="form-label">téléphone</label>
                <input type="text" class="form-control" name="tel_parents"  > <br>
                <label for="lien" class="form-label">Lien avec le ou la concerné(e)</label>
                <input type="text" class="form-control" name="lien"  > <br>
                <div class="col-6">
                <input type="submit" class="btn" name="ajouter">
                </div>
                
                   
                </form>
                
            
        </div>
        <?php 
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $connexion = new mysqli("localhost", "root", "Memlie234", "AJPCI");
    
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date_naissance = $_POST["date_naissance"];
        $localisation = $_POST["localisation"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $profession = $_POST["profession"];
        $niveau_etude = $_POST["niveau_etude"];
        
    
        // Dossier où vous souhaitez stocker les images
        $dossier_images = "../../pannel/immobilier/offres/images/";
    
        // Nom du fichier
        $nom_fichier = $_FILES["image_maison"]["name"];
         
        // Chemin temporaire du fichier
        $chemin_temporaire = $_FILES["image_maison"]["tmp_name"];
    
        // Chemin complet du fichier
        $upload = $dossier_images . $nom_fichier;
        $upload_bsd = "images/".$nom_fichier. "";
    
        // Chemin temporaire du fichier
        $chemin_temporaire = $_FILES["image_maison"]["tmp_name"];

        $sql = "INSERT INTO ADHERANTS (NOM, PRENOM, DATE_NAISSANCE, LIEU_HABITATION, TELEPHONE, EMAIL, PROFESSION, NIVEAU_ETUDE, CHEMIN_IMAGE, STATUT) VALUES ('$nom', '$prenom', '$date_naissance', '$localisation', '$tel', '$email', '$profession', '$niveau_etude', '$upload_bsd', 'EN ATTENTE');";
    
        if (mysqli_query($connexion, $sql)) {
            echo "votre inscription à été enrégistrée";
            echo $upload_bsd ;
            
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
        mysqli_close($connexion);
    }
    ?>

        
    </section>
    <section class="section2">

        <div class="container-fluid">
            <strong><h2>Suivez-nous sur nos differentes pages</h2></strong>
        
            <div class="row reseaux">
                
                <div class="col-lg-2 col-8">
                    <div class="img_reseaux">
                        <img src="../images/instagram.avif" alt="">
                        
                    </div>
                    <strong><h3>INSTAGRAM</h3></strong>
                    <p>AJPCI@gmail.com</p>
                </div>
                <div class="col-lg-2 col-8">
                    <div class="img_reseaux">
                        <img src="../images/FACEBOOKLOGO.jpeg" alt="">
                    </div>
                    <strong><h3>FACEBOOK</h3></strong>
                    <p>+225 0705040504</p>
                </div>
                <div class="col-lg-2 col-8">
                <div class="img_reseaux">
                        <img src="../images/LIKEDINLOGO.jpeg" alt="">
                       
                    </div>
                    <strong><h3>LINKEDIN</h3></strong>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('../../footer.php') ?>
    

    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../../script.js"></script>
</body>
</html>