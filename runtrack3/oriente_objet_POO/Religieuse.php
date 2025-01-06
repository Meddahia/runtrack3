<?php
//class Religieuse qui herite patisserie 

class Religieuse extends Patisserie
{
    public $saveurPremierBoule;
    public $saveurDeusiemeBoule;
    public $supplementChantilly;

        public function __construct($poids, $note, $prix,$saveurPremierBoule,$saveurDeusiemeBoule,$supplementChantilly)
        {
            parent::__construct($poids,$note,$prix);
            $this->saveurPremierBoule = $saveurPremierBoule;
            $this->saveurDeusiemeBoule = $saveurDeusiemeBoule;
            $this->supplementChantilly = $supplementChantilly;
        }

//affiche attributs Religieuse
        public function afficherReligieuse()
{
            $this->presentation();
                echo " Saveur 1er boule: " . $this->saveurPremierBoule . "<br>";
                echo " Saveur 2eme boule: " . $this->saveurDeusiemeBoule  . "<br>";
                echo "Chantilly: " . ($this->supplementChantilly ? "OUI" :"NON"). "<br>";
}

//modif saveur 1er boule

        public function modifierPremierBoule ($nouvelle_saveur)
        {
            $this->saveurPremierBoule = $nouvelle_saveur;
        }

//modif saveur 2eme bouke 

        public function modifierDeusiemeBoule($nouvelle_saveur)
        {
            $this->saveurDeusiemeBoule = $nouvelle_saveur;
        }

//oui/non chantilly

        public function setChantilly($supplement)
        {
            $this->supplementChantilly = $supplement;
        }
}
?>