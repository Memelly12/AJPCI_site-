<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../style.css">
    
</head>
<body>

    <?php require_once('../header.php') ?>
    <?php
        session_start(); 

        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        
            // Affichez le nom d'utilisateur
            echo "Bienvenue, $username !";
        } else {
            header("Location: ../page_co/index.php");
    exit();
        }
    ?>
    <div class="dashboard">
        <div class="titre_page container-fluid">
        <h1> Gestionnaire d'adhésion </h1> 
        <?php echo "Bienvenue, $username !"; ?>
        </div>
        
        <div class= "menu">
       
            <a href="#ajouter" id="ajouter_contact"  onclick="afficherFormulaireAjout()">
            <i class="fas fa-user-plus"> ajouter un nouveau membre</i>
            </a>
            <a href="#container" onclick="afficherTableauRepertoire()" > Afficher le répertoire des membres</a>
            
            
        </div>


        <div id="formulaire_ajout" class="formulaire_ajout">
            <div class="ajout_maison">

            </div>
            <form action="ajout.php" method="post" enctype="multipart/form-data">
            <h2>Ajouter une nouvelle offre </h2>
                <label for="nom">Nom</label>
                <input type="text" name="nom">
               
                <label for="prenom">prenom</label>
                <input type="text" id="prenom" name="prenom" required><br>
                <label for="date_naissance">Date de naissance</label>
                <input type="date"  name="date_naissance" required><br>
                <label for="localisation">Lieu d'habitation</label>
                <input type="text" name="localisation" required><br>
                <label for="tel">téléphone</label>
                <input type="text" name="tel"  required> <br>
                <label for="email">email</label>
                <input type="email" name="email" > <br>
                <label for="profession">Profession</label>
                <input type="text" name="profession" > <br>
                <label for="niveau_etude">Niveau d'étude</label>
                <input type="text" name="niveau_etude" > <br>
               <select name="statut" id="">
               <option value="EN ATTENTE">EN ATTENTE</option>
               <option value="CONFIRMÉ">CONFIRMÉ</option>
               </select>
               

                <input type="file" name="image_maison" id="image_maison"  onchange="previsualiserImage(event)">
                    <br>
                    <div class="imagePrevisualisation"><img id="imagePrevisualisation" alt="Aperçu de l'image" style="max-width: 100%; max-height: 200px; margin-top: 10px;"></div>
                    
                    <br>
                <h3>PERSONNE À CONTACTER EN CAS D'URGENCE</h3>
                <label for="nom">Nom</label>
                <input type="text" name="nom_parents">
                <label for="prenom">prenom</label>
                <input type="text" id="prenom_parents" name="prenom_parents" ><br>
                <label for="tel_parents">téléphone</label>
                <input type="text" name="tel_parents"  > <br>
                <label for="lien">Lien avec le ou la concerné(e)</label>
                <input type="text" name="lien"  > <br>
                
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

                
            </form>

            
        </div>
        
        
        <div class="container container" id="container"  >
            <div class="row">
                <div class="col-10">
                    <h2>Répertoire</h2>
                    <table>
                        <tr >
                            <th>photo</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de naissance</th>
                            <th>lieu d'habitation</th>
                        
                            <th>Téléphone</th> <!-- Ajoutez ici les autres en-têtes de colonnes -->
                            <th>email</th>
                            <th>Proféssion</th>
                            <th>Niveau d'étude</th>
                            <th>STATUT</th>

                            
                        
                        
                            
                        </tr>
                
                        <?php
                            require_once "../config.php";
                    
                            // Requête SQL de sélection pour afficher tous les contacts
                            $sql = "SELECT * FROM ADHERANTS";
                            $result = mysqli_query($conn, $sql);
                            $images = $row["chemin_images"];
                            $sum = 0;
                            $comfirm = 0; 
                            $attente = 0 ; 
                            
                    
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                            <tr>
                                <form action="ajout.php" method="post">
                                    <input type="hidden" value="<?php echo $row["ID"] ?>">

                                    <td>
                                        <img src="<?php echo $row["CHEMIN_IMAGE"] ?>" width="100%" alt="">
                                    </td>
                                    <td>
                                        <?php 
                                        echo  $row["NOM"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo $row["PRENOM"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo  $row["DATE_NAISSANCE"] 
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo  $row["LIEU_HABITATION"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo  $row["TELEPHONE"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo  $row["EMAIL"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo  $row["PROFESSION"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo  $row["NIVEAU_ETUDE"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            echo  $row["STATUT"]
                                        ?>
                                    </td>
                                    <td><a href='modif.php?id=" <?php echo $row["ID"] ?>"'>Modifier</a></td>
                                    <td><a href='supp.php?id=" <?php echo $row["ID"]  ?> "'>supprimer</a></td>
                                </form>

                            </tr>
                            








                            <?php
                                $sum = $sum + 1 ; 
                                if ($row["STATUT"] == "CONFIRMÉ") {
                                    $comfirm = $comfirm + 1 ;
                                } else if ($row["STATUT"] == "EN ATTENTE") {
                                    $attente = $attente + 1 ;
                                }

                        
                                }
                                
                            }
                            ?>
                    </table>
                </div>
                <div class="col-2">
                        <p>nombres d'adhérants: <?php echo ($sum); ?></p>
                    <p>nombres confirmé: <?php echo ($comfirm); ?></p>
                    <p>nombres en attente: <?php echo ($attente); ?></p>

                </div>
            </div>
            
            
            
   
                     
        </div>
        

        
        <div class="deconexion">
            <a href="deconnexion.php">
            Déconnexion
            </a>
         </div>
       

        
       
    </div>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script> 
       
  
    <script src="../../script.js"></script>
</body>
</html>