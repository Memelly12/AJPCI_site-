<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

if (isset($_GET["id"])) {
    require_once "../config.php";

    $clientID = $_GET["id"];

    // Requête SQL de suppression
    $sql = "DELETE FROM ADHERANTS WHERE ID = $clientID";

    if (mysqli_query($conn, $sql)) {
        header("Location: offres.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du client : " . mysqli_error($conn);
    }

    // Fermeture de la connexion
    mysqli_close($conn);
} else {
    echo "ID de contact non spécifié.";
}
?>