<?php
// class Eclairs, héritant de Patisserie

class Eclairs extends Patisserie
{
    public $saveurCreme;
    public $saveurGlacage;
    public $longueur;

        public function __construct($poids, $note, $prix,$saveurCreme,$saveurGlacage,$longueur)
        {
            parent::__construct($poids,$note,$prix);
            $this->saveurCreme = $saveurCreme;
            $this->saveurGlacage = $saveurGlacage;
            $this->longueur = $longueur;
        }

// affichage attributs eclair
        public function afficherEclair()
        {
            $this->presentation();
                echo " Saveur Crème: " . $this->saveurCreme . "<br>";
                echo " Saveur Glacage: " . $this->saveurGlacage  . "<br>";
                echo "Longeur: " . $this->longueur . "<br>";
        }

//modif saveur glacage
        public function ChangerGlacage($nouvelle_saveur_glacage)
        {
            $this-> saveurGlacage = $nouvelle_saveur_glacage;
        }
    
//modif saveur creme
        public function ChangerCreme($nouvelle_saveur_creme)
        {
            $this->saveurCreme = $nouvelle_saveur_creme;
        }
}
?>