<?php

class Animaux
{
    public $nom;
    public $taille;
    public $poids;
    public $alimentation;

//constructeur  nitialise atributs 
    public function __construct($nom,$taille,$poids,$alimentation)
        {
            $this->nom = $nom;
            $this->taille = $taille;
            $this->poids = $poids;

//validation de l'alimentation
                if(in_array($alimentation,['carnivore','herbivore','omnivore']))
                {
                    $this -> alimentation = $alimentation;
                }
//exeption si vleur alimentation incorecte
                else
                {
                    throw new Exception("L'alimentation doit etre 'carnivore','herbivore'ou 'omnivore'.");
                }
        }

//affichage caracteristique de l'animal
    public function presentation()
    {
        echo "Nom:" . $this -> nom . "<br>";
        echo "Taille:" . $this -> taille . "<br>";
        echo "Poids:" . $this -> poids . "<br>"; 
        echo "Alimentation: " . $this -> alimentation . "<br>";
    }
}
?>