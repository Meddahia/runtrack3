<?php 
 // 1) Créer un tableau vide et ajouter 20 valeurs aléatoires 
$tableau = []; 

// Générer 20 valeurs aléatoires entre 1 et 100 
for ($i = 0; $i < 20; $i++)
 { $tableau[] = rand(1, 100); 
}
 // Valeur minimale et maximale
$valeur_min = min($tableau);
$valeur_max = max($tableau); 

// Organiser le tableau dans un ordre croissant
  sort($tableau); ?>
  
  
<!DOCTYPE html> 
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
     <title>Tableau de Valeurs Aléatoires</title> 
     <link rel="stylesheet" href="exo_2.css"> 
    </head>
     <body> 
        <div class="container"> 
            <h1>
                Tableau de Valeurs Aléatoires
            </h1>
             <div class='result'>Tableau : 
                <span class='tableau'>
                <?php echo implode(', ', $tableau); ?>
            </span>
        </div> 
        <div class='result'>
            Valeur minimale : 
            <strong>
                <?php echo $valeur_min; ?>
            </strong>
        </div>
         <div class='result'>
            Valeur maximale : 
            <strong>
                <?php echo $valeur_max; ?>
        </strong>
    </div>
    <div class='result'>
        Tableau trié : 
        <span class='tableau'>
            <?php echo implode(', ', $tableau); ?>
        </span>
    </div> 
</div> 
<div class="footer">
     <p>
        &copy; 2024 Mon Tableau de Valeurs Aléatoires
    </p> 
</div>
 </body> 
 </html>
