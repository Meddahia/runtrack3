<?php
// Vérification que les données ont été passées en GET
if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['age'])) {
    // Récupérer les valeurs et les sécuriser avec htmlspecialchars pour éviter les injections XSS
    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $age = htmlspecialchars($_GET['age']);
} else {
    // Si les données ne sont pas disponibles, rediriger ou afficher une erreur
    echo "Données manquantes. Veuillez remplir le formulaire correctement.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations soumises</title>
    <link rel="stylesheet" href="exo_4.css">
</head>
<body>
    <div class="container">
        <h1>Vos informations</h1>
        <p><strong>Nom :</strong> <?= $nom ?></p>
        <p><strong>Prénom :</strong> <?= $prenom ?></p>
        <p><strong>Âge :</strong> <?= $age ?></p>
        <!-- Bouton pour revenir au formulaire -->
        <a href="exo_4.php" class="btn">Retour au formulaire</a>
    </div>
</body>
</html>