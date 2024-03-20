<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require_once('header.php') ?> 
    <?php
        session_start(); 

        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        
            // Affichez le nom d'utilisateur
            echo "Bienvenue, $username !";
        } else {
            header("Location: page_co/index.php");
    exit();
        }
    ?>
    
    <div class="container-fluid text-align-center ">
        <div class="row text-align-center titre_page">
            <h4>Boite de reception </h4>
            <?php echo "Bienvenue, $username !"; ?>
        </div>
    </div>
        
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-10">
                <?php
                    require_once "config.php";
                   // Récupérer les messages depuis la base de données
                    $sql = "SELECT * FROM RECUP_SITE ORDER BY date_message DESC";
                    $result = mysqli_query($conn, $sql);

                    // Afficher les messages
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo "<strong>NOM ET PRENOM:</strong> " . htmlspecialchars($row['NOM']) . " " . htmlspecialchars($row['PRENOM']) . "<br>" ;
                    echo "<strong> NUMERO DE TELEPHONE: </strong> " . htmlspecialchars($row['TELEPHONE']) . "<br>";
                    echo "<strong> Email: </strong> " . htmlspecialchars($row['EMAIL']) . "<br>";
                    echo " <strong>Message: </strong> " . htmlspecialchars($row['MESSAGE']) . "<br>";
                    echo " <strong>Date d'envoi: </strong> " . htmlspecialchars($row['date_message']) ."<br>" ;
                    echo "<a href='supp2.php?id=" . $row["id"] . "'>supprimer</a> <br><hr>";
                    }

                    // Fermer la connexion
                    mysqli_close($conn);
                ?>


            </div>
        </div>
    </div>


 <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
 </script>    
 <script src="script.js">
    
 </script>
</body>
</html>