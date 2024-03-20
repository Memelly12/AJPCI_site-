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
<section>
           <div class="container-fluid text-dark "  id="contact">
            <div class="row justify-content-center footer">
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

           <?php 
                        error_reporting(E_ALL);
                        ini_set('display_errors', 1);


                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                
                                $connexion = new mysqli("localhost", "root", "Memlie234", "AJPCI");
                            
                                $nom =  $_POST["nom"];
                                $prenom = $_POST["prenom"];
                                $telephone = $_POST["telephone"];
                                $email = $_POST["email"];
                                $message = $_POST["message"];
                                
                                // Récupérez les autres champs saisis ici
                            
                                // Requête SQL d'insertion
                                $sql = "INSERT INTO RECUP_SITE (NOM, PRENOM, TELEPHONE, EMAIL, MESSAGE) VALUES ('$nom', '$prenom', '$telephone', '$email', '$message')";
                            
                                if (mysqli_query($connexion, $sql)) {
                                    
                ?>
                <script>
                    alert("Message envoyé")
                </script>
                <?php
                                         
                                    
                                } else {
                                    echo "Erreur lors de l'ajout du contact : " . mysqli_error($connexion);
                                }
                            
                                // Fermeture de la connexion
                                mysqli_close($connexion);
                            }
            ?>
                   

        </section>



        <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
</body>
</html>