<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

 session_start(); // Démarrer la session (assurez-vous de démarrer la session sur chaque page où vous souhaitez accéder aux données de session)

// Récupérez le nom d'utilisateur depuis la session
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    
} else {
    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas authentifié
    header("Location: ../page_co/index.php");
    exit();
}

if (isset($_GET["id"])) {
    require_once "config.php";

    $clientID = $_GET["id"];

    // Requête SQL de suppression
    $sql = "DELETE FROM RECUP_SITE WHERE id = $clientID";

    if (mysqli_query($conn, $sql)) {
        header("Location: acceuil.php?username=$username");
        exit();
    } else {
        echo "Erreur lors de la suppression du MESSAGE : " . mysqli_error($conn);
    }

    // Fermeture de la connexion
    mysqli_close($conn);
} else {
    echo "ID de contact non spécifié.";
}
?>
