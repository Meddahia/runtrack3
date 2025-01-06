<?php
include 'Patisserie.php';
include 'eclaire.php';
include 'Religieuse.php';


//cratation eclair
$moneclair = new Eclairs (150, 4,2.5, 'chocolat','vanille',12);
$moneclair->afficherEclair();

//modif glacage

$moneclair-> ChangerGlacage('caramel');
$moneclair->afficherEclair();

//cree une religieuse
$maReligieuse = new Religieuse(100, 5, 3.0,'café','chocolat',true);
$maReligieuse->afficherReligieuse();

//modif 1er boule retirer Chantilly 

$maReligieuse-> modifierPremierBoule('vanille');
$maReligieuse->setChantilly(false);
$maReligieuse->afficherReligieuse();
?>
