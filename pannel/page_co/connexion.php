<?php
$servername = "localhost"; // Adresse du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = "Memlie234"; // Mot de passe MySQL
$dbname = "AJPCI"; // Nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]) ;
    $password = htmlspecialchars($_POST["password"]) ;

    // Vérifier les informations de connexion dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // L'utilisateur est authentifié avec succès
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;

        header("location: ../acceuil.php?"); // Rediriger vers la page du tableau de bord
        exit();
    } else {
        // Échec de l'authentification
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($conn);
}
?>
