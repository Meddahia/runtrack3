<?php
require_once ("Animaux.php");
class Oiseaux extends Animaux
{
    public $peuxVoler;
    public $estEnVol;

    public function __construct( $nom,$taille,$poids,$alimentation,$peuxVoler)
    {
        parent::__construct($nom,$taille,$poids,$alimentation);
            $this ->peuxVoler = $peuxVoler;
            $this ->estEnVol = false;
    }

    public function presention()
    {
        parent::presentation();
            echo "Peut voler:" . ($this -> peuxVoler ? " oui" : " non") . "<br>";
            echo "est en vol:" . ($this -> estEnVol ? " oui" : " non") . "<br>";
    }

    public function atterir()
{
        if ($this ->peuxVoler && $this -> estEnVol)
    {
        $this -> estEnVol = false ;
            echo $this -> nom . " a atterri. <br>";
    }
    else 
    {
        echo $this -> nom . " ne peut pas atterir. <br>";
    }
}
}
?>