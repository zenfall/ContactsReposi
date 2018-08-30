<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<?php

unset($_SESSION["maSession"]);
//session tuer quandl'utilisateur se deconnecte
?>
<form action="menu.php" method="post" >
    <div>
        <label>Email</label>
        <input type="email" name="email" placeholder="Email">
    </div>
    <div>
        <label>Mot de passe</label>
        <input type="password" name="mdp" placeholder="Mot de passe">
    </div>
    <div>
        <input type="submit" name="valider" value="Log In">
    </div>
</form>
</body>
</html>