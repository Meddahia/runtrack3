<?php
// index.php

// 1) Fonction pour convertir des euros en dollars
function eurosDollars($prixEuros) {
    $tauxConversion = 1.1; // Taux de conversion fixe
    return round($prixEuros * $tauxConversion, 2);
}

// 2) Fonction pour calculer le prix final après réduction
function calculerPrix($prixBase, $reduction) {
    return round($prixBase * (1 - $reduction / 100), 2);
}

// 3) Fonction pour calculer la somme du panier
function sommePanier($listePrix) {
    return round(array_sum($listePrix), 2);
}

// Exemple d'utilisation des fonctions
$prixArticle1 = 50; // en euros
$prixArticle2 = 30; // en euros
$reduction = 10;    // réduction de 10%

$prixEnDollars = eurosDollars($prixArticle1);
$prixFinal = calculerPrix($prixArticle1, $reduction);
$panier = [$prixArticle1, $prixArticle2];
$sommeTotal = sommePanier($panier);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculateur de Prix</title>
    <link rel="stylesheet" href="exo_3.css">
</head>
<body>
    <div class="container">
        <h1>Calculateur de Prix</h1>
        
        <div class='result'>
            Prix en Euros : 
            <strong>
                <?php echo $prixArticle1; ?> €
            </strong>
        </div>
        
        <div class='result'>
            Prix en Dollars :
            <strong>
                <?php echo $prixEnDollars; ?> $
            </strong>
        </div>
        
        <div class='result'>
            Prix final après réduction de
             <?php echo $reduction; ?>% : 
            <strong>
                <?php echo $prixFinal; ?> €
            </strong>
        </div>
        
        <div class='result'>
            Somme du panier (articles à 50 € et 30 €) : 
            <strong>
                <?php echo $sommeTotal; ?> €
            </strong>
        </div>
    </div>
    
    <div class="footer">
        <p>
            &copy; 2024 Mon Calculateur de Prix
        </p>
    </div>
</body>
</html>