<?php
require_once ('Animaux.php');
require_once ('Oiseaux.php');
require_once ('Autruche.php');
require_once ('Colibri.php');
require_once ('Felins.php');
require_once ('Lion.php');
require_once ('Tigre.php');

// Création et affichage des informations de l'autruche
$autruche = new Autruche("Autruche Rapide", 200, 150, "herbivore");
$autruche->presentation();
echo "<br>";

// Création et affichage des informations du colibri
$colibri = new Colibri("Colibri Vif", 10, 0.005, "omnivore");
$colibri->presentation();
$colibri->atterir();  // Méthode spécifique au colibri
echo "<br>";

// Création et affichage des informations du lion
$lion = new Lion("Lion Majestueux", 120, 200, "carnivore");
$lion->presentation();
$lion->chasser();  // Méthode spécifique au lion
echo "<br>";

// Création et affichage des informations du tigre
$tigre = new Tigre("Tigre Féroce", 100, 180, "carnivore");
$tigre->presentation();
$tigre->chasser();  // Méthode spécifique au tigre
echo "<br>";
?>
