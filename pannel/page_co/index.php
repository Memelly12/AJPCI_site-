<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <fieldset>
            <legend>
                formulaire de connexion
            </legend>
            <form action="connexion.php" method="post">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required> <br>
                
                <button type="submit">Se connecter</button>
            </form>
        </fieldset>
    </div>
</body>
</html>
