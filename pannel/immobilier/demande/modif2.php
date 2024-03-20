<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "config.php";

    $clientID = $_POST["clientID"] ;
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $type_demande = $_POST["demande"];
    $type_maison = $_POST["type_maison"];
    $nombre_pieces = $_POST["nombre_pieces"];

    $sql = "UPDATE Clients SET nom = '$nom', prenom = '$prenom', adresse = '$adresse', telephone = '$telephone', email = '$email', type_demande = '$type_demande', type_maison = '$type_maison', nombre_pieces = '$nombre_pieces' WHERE clientID = $clientID ";
    
    if (mysqli_query($conn, $sql)) {
        header("location: demand_immo.php");
        exit();
    } else {
        echo "Erreur de modification : " . mysqli_error($conn);
    } 
}
?>
