<?php
class Vetement {
    public $type;
    public $couleur;
    public $taille;
    public $prix;
    public $etat;

    public function __construct($type, $couleur, $taille, $prix, $etat) {
        $this->type = $type;
        $this->couleur = $couleur;
        $this->taille = $taille;
        $this->prix = $prix;
        $this->etat = $etat;
    }

    // Méthode presentation 
    public function presentation() {
        echo "<p>Type : " . $this->type . "</p>";
        echo "<p>Couleur : " . $this->couleur . "</p>";
        echo "<p>Taille : " . $this->taille . "</p>";
        echo "<p>Prix : " . $this->prix . " €</p>";
        echo "<p>État : " . $this->etat . "</p>";
    }

    // Méthode modifierVetement
    public function modifierVetement($type, $couleur, $taille, $prix, $etat) {
        $this->type = $type;
        $this->couleur = $couleur;
        $this->taille = $taille;
        $this->prix = $prix;
        $this->etat = $etat;
    }

// méthode getAttributs retorne le array 
    public function getAttributs() {
        return array($this->type, $this->couleur, $this->taille, $this->prix, $this->etat);
    }
}

//cration de l'objet vetement
$monVetement = new Vetement("T-shirt", "Bleu", "M", 19.99, "Neuf");

// Modification des attributs via le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $couleur = $_POST['couleur'];
    $taille = $_POST['taille'];
    $prix = $_POST['prix'];
    $etat = $_POST['etat'];

    // Modification de l'objet Vetement
    $monVetement->modifierVetement($type, $couleur, $taille, $prix, $etat);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vêtement</title>
    <link rel="stylesheet" href="vetement.css">
</head>
<body>

    <div class="container">
        <h1>Présentation du vêtement</h1>
        <div class="vetement">
            <?php
            // Affichage des attributs du vêtement
            $monVetement->presentation();
            ?>
        </div>

        <h2>Modifier le vêtement</h2>
        <form method="post" action="">
            <?php 
            // Récupére les attributs actuels
            list($type, $couleur, $taille, $prix, $etat) = $monVetement->getAttributs();
            ?>
            <label for="type">Type :</label>
            <input type="text" name="type" value="<?php echo $type; ?>" required><br>

            <label for="couleur">Couleur :</label>
            <input type="text" name="couleur" value="<?php echo $couleur; ?>" required><br>

            <label for="taille">Taille :</label>
            <input type="text" name="taille" value="<?php echo $taille; ?>" required><br>

            <label for="prix">Prix :</label>
            <input type="number" step="0.01" name="prix" value="<?php echo $prix; ?>" required><br>

            <label for="etat">État :</label>
            <input type="text" name="etat" value="<?php echo $etat; ?>" required><br>

            <input type="submit" value="Modifier">
        </form>
    </div>

</body>
</html>