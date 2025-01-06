<?php
$erreur = "";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $age = trim($_POST['age']);

    // Vérifier que tous les champs sont remplis
    if (empty($nom) || empty($prenom) || empty($age)) {
        $erreur = "Tous les champs doivent être remplis.";
    } elseif (!is_numeric($age) || $age < 18 || $age > 30) {
        // Vérification de la validité de l'âge
        $erreur = "L'âge doit être un nombre valide entre 18 et 30.";
    } else {
        // Si tout est valide, redirection vers la page de traitement
        header("Location: exo_4bis.php?nom=" . urlencode($nom) . "&prenom=" . urlencode($prenom) . "&age=" . urlencode($age));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="exo_4.css">
</head>
<body>
    <div class="container">
        <h1>Formulaire d'inscription</h1>

        <!-- Affichage des erreurs s'il y en a -->
        <?php if (!empty($erreur)): ?>
            <div class="erreur"><?= htmlspecialchars($erreur) ?></div>
        <?php endif; ?>

        <form action="exo_4.php" method="POST"> <!-- Correction ici pour envoyer le formulaire à la même page -->
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" value="<?= isset($nom) ? htmlspecialchars($nom) : ''; ?>" required>

            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" value="<?= isset($prenom) ? htmlspecialchars($prenom) : ''; ?>" required>

            <label for="age">Âge :</label>
            <input type="number" name="age" id="age" min="18" max="30" value="<?= isset($age) ? htmlspecialchars($age) : ''; ?>" required>

            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>