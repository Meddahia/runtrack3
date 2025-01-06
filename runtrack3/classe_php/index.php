<?php
require_once ('user-pdo.php');
// Exemple de test
$user = new Userpdo('localhost', 'username', 'password', 'classes');
$result = $user->register("Tom13", "azerty", "thomas@gmail.com", "Thomas", "DUPONT");
var_dump($result);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page Web</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<header>
    <h1>Bienvenue sur ma page</h1>
</header>

<main>
    <form>
        <label for="login">Login:</label>
        <input type="text" id="login" name="login">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password">

        <button type="submit">S'inscrire</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 Mon Site Web</p>
</footer>

</body>
</html>
