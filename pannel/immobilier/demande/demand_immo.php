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
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light text-dark">
            <div class="container-fluid d-flex align-items-center">
                
                 <a href="#" class="navbar-brand"><img src="../../image/logo.jpeg" width="20%" alt=""></a>
                 <button class="navbar-toggler mx-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse  navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-md-0">
                        <li class="nav-item">
                        <a class="nav-link  me-3 nav_acceuil"  id="Boite" aria-current="page" href="../../acceuil.php"><i class="bi bi-envelope"></i>boite de reception</a> 
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  me-3 nav_acceuil dropdown-toggle"  id="DashImmo" onclick="" aria-current="page" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-house-door-fill"></i>dashboard immobilier</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Demandes</a></li>
                                <li><a class="dropdown-item" href="../offres/offres.php">Offres</a></li>
                                
                                
                               
                            </ul>
                    
                        </li>
                        <li class="nav-item">
                        <a class="nav-link me-3 nav_prop" id="DashMar" onclick=""  href="#about"><i class="bi bi-people-fill"></i> dashboard marketing </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#services" onclick="activeVeh()" id="DashVeh" class="nav-link me-3 nav_services dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-car-front-fill"></i>dashboard véhicules</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php">Demandes</a></li>
                                <li><a class="dropdown-item" href="../../vehicules/offfres/offres.php">Offres</a></li>

                                
                               
                            </ul>
                        
                        </li>
                        <li class="nav-item">
                       
                        </li>
                    </ul>
      
                </div>
            </div>


        </nav>
    </header>
    <?php
        session_start(); 

        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        
            // Affichez le nom d'utilisateur
            echo "Bienvenue, $username !";
        } else {
            header("Location: ../../page_co/index.php");
    exit();
        }
    ?>
    <div class="dashboard">
        <div class="titre_page container-fluid">
        <h1> tableau de bord demandes immobilière </h1> 
        </div>
        
        <div class= "menu">
            <a href="#ajouter" id="ajouter_contact"  onclick="afficherFormulaireAjout()">
            <i class="fas fa-user-plus"> ajouter un nouveau client</i>
            </a>
            <a href="#container" onclick="afficherTableauRepertoire()" > Afficher le répertoire de client</a>
            <a href="#" onclick="afficherBoiteReception()" > Boite de reception</a>
            
        </div>


        <div id="formulaire_ajout" class="formulaire_ajout">
            <form action="ajout.php" method="post">
                <h2>Ajouter un nouveau client</h2>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required><br>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required><br>
                <label for="adresse">adresse :</label>
                <input type="text" name="adresse" id="adresse"><br>
                <label for="telephone">telephone :</label>
                <input type="text" name="telephone" id="telephone" required> <br>
                <label for="email">email :</label>
                <input type="email" name="email" id="email"> <br>
                <label for="demande">type de demande</label>
                <input type="text" name="demande" id="demande"> <br>
                <label for="type_maison">type de maison :</label>
                <input type="text" name="type_maison" id="type_maison">
                <label for="nombre_pieces">nombre de pieces ;</label>
                <input type="number" name="nombre_pieces" id="nombre_pieces">

                <button type="submit">Enregistrer</button>
            </form>

            
        </div>
        
        
        <div class="container" id="container"  >
            <h2>Répertoire</h2>
            <table>
                <tr >
                    <th>codeClient</th>
                    <th>Nom</th>
                    <th>Prénom</th> <!-- Ajoutez ici les autres en-têtes de colonnes -->
                    <th>adresse</th>
                    <th>telephone</th>
                    <th>email</th>
                    <th>type_demande</th>
                    <th>type_maison</th>
                    <th>nombre_pieces</th>
                    
                </tr>
        
                <?php
                require_once "config.php";
        
                // Requête SQL de sélection pour afficher tous les contacts
                $sql = "SELECT * FROM Clients";
                $result = mysqli_query($conn, $sql);
        
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["codeClient"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>"; 
                        echo "<td>" . $row["adresse"] . "</td>";
                        echo "<td>" . $row["telephone"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["type_demande"] . "</td>";
                        echo "<td>" . $row["type_maison"] . "</td>";
                        echo "<td>" . $row["nombre_pieces"] . "</td>";
                        echo "<td><a href='modif.php?id=" . $row["clientID"] . "'>Modifier</a></td>";
                        echo "<td><a href='supp.php?id=" . $row["clientID"] . "'>supprimer</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun contact trouvé.</td></tr>";
                }
        
                // Fermeture de la connexion
                mysqli_close($conn);
                ?>
            </table>
   
                     
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