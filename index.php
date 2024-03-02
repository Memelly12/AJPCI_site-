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
    include 'header.php';
    ?>
    <header>
        <div class="container">
            <div class="row home_page">
                <div class="col-6">
                    <h1>Association des juristes publicistes de cote d'ivoire <br> (AJPCI)</h1>
                    <button>rejoignez-nous</button>
                </div>
            </div>
        </div>
       
    </header>
    <section>
        <div class=" container-fluid">
            <div class=" row who_are_you">
               <div class="col-lg-6 col-12 img_section1 reveal-1">
                    <img src="images/image_section2_1.avif" width="50%" alt="">
                </div>
               <div class="col-lg-6 col-12 txt_section1 reveal-2">
                    <h2>À propos de nous</h2>
                    <p>
                    Nous sommes une association de juriste publiciste ivoirien basée à Abidjan. <br> Notre objectif est de promouvoir et développer le droit public en Côte d'Ivoire
                    </p>
                    <button>En savoirs plus</button>
               </div>
            </div>
        </div>
        
        
    </section>
    <section>
        <div class="container-fluid">
            
            <div class="row services">
            <h1 class="p-5">Nos actions</h1>
                <div class="col-lg-6 col-12 img_section21 reveal-1 ">
                    <img src="images/img_section21.jpg" width="50%" alt="">
                </div>
               <div class="col-lg-6 col-12 txt_section21 reveal-2 ">
                    <h2>Cnference autour du droit public</h2>
                    <p>
                    Favorisons la compréhension approfondie du droit public ivoirien en organisant des conférences enrichissantes, <br>
                     réunissant des experts et des passionnés pour partager des perspectives éclairantes.
                    </p>
                   
                    
               </div>
            </div>
            <div class="row services">
                
               <div class="col-lg-6 col-12 txt_section22 reveal-2 ">
                    <h2>formations</h2>
                    <p>Investissons dans l'éducation et l'amélioration continue en proposant des formations de pointe, <br>
                     fournissant aux juristes publicistes ivoiriens les outils nécessaires pour exceller dans leur pratique.</p>
                </div>
               <div class="col-lg-6 col-12 img_section22 reveal-1 ">
                    <img src="images/image_section23.avif" width="50%" alt="">
                </div>
                <div class="col-lg-6 col-12 txt2_section22">
                    <h2>formations</h2>
                    <p>Investissons dans l'éducation et l'amélioration continue en proposant des formations de pointe, <br>
                     fournissant aux juristes publicistes ivoiriens les outils nécessaires pour exceller dans leur pratique.</p>
                </div>
            </div>
            <div class="row services">
            
                <div class="col-lg-6 col-12 img_section21 reveal-1">
                    <img src="images/image_section22.avif" width="50%" alt="">
                </div>
               <div class="col-lg-6 col-12 txt_section21 reveal-2">
                    <h2>Construire des Liens Juridiques Durables</h2>
                    <p>
                    Facilitons les opportunités de réseautage professionnel, <br>
                     encourageant la collaboration entre les juristes publicistes ivoiriens et renforçant les liens au sein de notre communauté juridique.
                    </p>
                   
                    
               </div>
            </div>
        </div>
    </section>
    <section>
       <div class="container">
        <div class="row rubriques "  >
            <h2>Actualités</h2>
            
                <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);

                    $connexion = new mysqli("localhost", "root", "Memlie234", "AJPCI");

                

                    // Récupérer les deux dernières rubriques
                    $requete = "SELECT * FROM rubriques ORDER BY id_rubrique DESC LIMIT 2";
                    $resultat = mysqli_query($connexion, $requete);

                    if (mysqli_num_rows($resultat) > 0) {
                        while ($row = mysqli_fetch_assoc($resultat)) {
                            $nom_rubrique = $row["nom_rubrique"];
                            $message_rubrique = $row["message_rubrique"];
                            $chemin_image = $row["images_rubrique"];

                            // Afficher la carte pour chaque rubrique
                            echo '<div class="col-lg-6 col-12">';
                            echo '<div class="carte_rubrique reveal-1">';
                            echo '<div class ="img_rubrique"  style="background-image: url(pannel/'.$chemin_image. ');"></div>';
                           

                            echo '<h3>' . $nom_rubrique . '</h3>';
                            echo '<p>' . $message_rubrique . '... </p>';
                            echo '<button>voir plus</button>';
                            echo '</div>';
                            echo' </div>';
                        }
                    } else {
                        echo '<div class="aucune_rubrique">Aucune actualité pour le moment</div>';
                    }

                    $connexion->close();
                ?>
           
                
        </div>
       </div>
       
    </section>
    <section>
           <div class="container-fluid text-dark "  id="contact">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-4  mx-5 my-5">
                    <h2 class="fw-bold ">
                        Contactez-nous
                    </h2>
                    <h4>
                        email
                    </h4>
                    <p>
                        AJPCI@gmail.com
                    </p>
                    
                    <h4>
                        Télephone
                    </h4>
                    <p>
                        +225 0705040504
                    </p>
                    <div class="icone">
                    <i class="bi bi-linkedin"></i>
                    <i class="bi bi-facebook"></i>
                    </div>
                   
                    
                </div>
                <div class="col-12 col-lg-4  mx-5 my-5">
                    <h4>laissez nous un message</h4>
                    <form class="row" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                        <div class="col-6">
                        <label for="Prenom" class="form-label">prenom</label>
                        <input type="text" class="form-control" name="prenom" id="Prenom" required >
                            

                        </div>
                        <div class="col-6">
                            <label for="nom" class="form-label">nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" required >
                        </div>
                        <div class="mb-3 col-6">
                            <label for="numero" class="form-label">numéro de téléphone</label>
                            <input type="text" class="form-control" name="telephone" id="telephone" required >
                            
                        </div>
                        <div class="mb-3 col-6">
                            <label for="email" class="form-label">adresse email</label>
                            <input type="email" class="form-control" name="email" id="email" required aria-describedby="emailHelp">
                            
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">message</label>
                            <textarea name="message" class="form-control" id="message"  rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">envoyer</button>
                    </form>


                   
                   




                </div>
            </div>
           </div>

        </section>




    
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
    
</body>
</html>