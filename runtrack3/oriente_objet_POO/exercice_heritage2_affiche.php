<?php
require_once ('Animaux.php');
require_once ('oiseaux.php');
require_once ('Autruche.php');
require_once ('Colibri.php');
require_once ('felins.php');
require_once ('lion.php');
require_once ('tigre.php');

$autruche = new Autruche ( " Autruche Rapide", 200,  150 , "herbivore", false);
$autruche -> presentation();
    echo "<br>";


$colibri = new Colibri (  "Colibri vif",  10,   0.005 ,  "omnivore",true);
$colibri -> presentation();
$colibri -> atterir();
    echo "<br>";


$lion = new Lion ( "Lion Majestueux", 120,  200 , "carnivore");
$lion -> presentation();
$lion -> chasser();
echo "<br>";


$tigre = new Tigre ( "Tigre Féroce", 100,  180 , "carnivore");
$tigre -> presentation();
$tigre -> chasser();
echo "<br>";
$tigre -> presentation();
?>