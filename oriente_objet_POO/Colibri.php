<?php
class Colibri extends Oiseaux
{
    public function __construct($nom, $taille, $poids, $alimentation)
    {
        parent::__construct($nom, $taille, $poids, $alimentation,true);
    }
    public function presentation()
    {
        parent::presention();
            echo "C'est un Colibri. <br>";
    }
}
?>