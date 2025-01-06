<?php
require_once ("oiseaux.php");

class Autruche extends Oiseaux
{
    // Constructeur qui hérite de Oiseaux
    public function __construct($nom, $taille, $poids, $alimentation)
    {
        // Appelle le constructeur de la classe parente avec l'argument 'false' pour 'peuxVoler'
        parent::__construct($nom, $taille, $poids, $alimentation, false);
    }

    // Méthode de présentation spécifique à l'Autruche
    public function presentation()
    {
        // Appelle la méthode 'presentation()' de la classe parente 'Oiseaux'
        parent::presentation();
        echo "C'est une autruche. <br>";
    }
}
?>
