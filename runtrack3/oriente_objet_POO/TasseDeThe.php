<?php
class TasseDeThe {
    public $quantiteActuelle;
    public $quantiteMaximum;
    public $estChaud;

    // Constructeur
    public function __construct($quantiteMaximum, $estChaud) {
        $this->quantiteMaximum = $quantiteMaximum;
        $this->quantiteActuelle = $quantiteMaximum; // Par défaut,  tasse pleine
        $this->estChaud = $estChaud; // Vrai si thé est chaud, faux sinon
    }

    // Méthode pour afficher les info tasse
    public function afficherTasse() {
        echo "<div class='tasse-info'>";
        echo "<p>Quantité actuelle de thé : " . $this->quantiteActuelle . " ml</p>";
        echo "<p>Quantité maximum de la tasse : " . $this->quantiteMaximum . " ml</p>";
        echo "<p>Est-ce que le thé est chaud ? " . ($this->estChaud ? "Oui" : "Non") . "</p>";
        echo "</div>";
    }

    // Méthode pour boire (vide la tasse)
    public function boire() {
        $this->quantiteActuelle = 0;
    }

    // Méthode pour remplir la tasse
    public function remplir() {
        $this->quantiteActuelle = $this->quantiteMaximum;
    }
}

// Initialisation de la tasse de thé
$tasse = new TasseDeThe(250, true); // Tasse de 250 ml, thé chaud

// Si l'utilisateur a cliqué sur "boire"
if (isset($_POST['boire'])) {
    $tasse->boire();
}

// Si l'utilisateur a cliqué sur "remplir"
if (isset($_POST['remplir'])) {
    $tasse->remplir();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasse de Thé</title>
    <link rel="stylesheet" href="TasseDeThe.css">
</head>
<body>

<div class="container">
    <h1>Ma Tasse de Thé</h1>

    <!-- Afficher les informations de la tasse -->
    <?php $tasse->afficherTasse(); ?>

    <!-- Formulaire pour boire ou remplir la tasse -->
    <form method="post">
        <button type="submit" name="boire" class="btn">Boire tout le thé</button>
        <button type="submit" name="remplir" class="btn">Remplir la tasse</button>
    </form>
</div>

</body>
</html>