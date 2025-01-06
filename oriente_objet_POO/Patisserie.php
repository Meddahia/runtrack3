<?php

//Clzss patissseries


class Patisserie
{
    public $poids;
    public $note;
    public $prix;

        public function __construct($poids,$note,$prix)
        {
            $this->poids = $poids;
            $this->note = $note;
            $this->prix = $prix;
        }

//affichage des atributs patisseire

        public function presentation()
        {
            echo"Poids:" . $this->poids ."<br>";
            echo"Note:" . $this->note ."<br>";
            echo"Prix:" . $this->prix ."<br>";
        }

//modif poids patisserie 

          public function setPoids($nouveau_poids)
        {
            $this->poids = $nouveau_poids;
        }

//modif prix patisserie 

        public function setPrix($nouveau_prix)
        {
            $this->prix = $nouveau_prix;
        }


//modif note patisserie 

        public function setNote($nouvelle_note)
        { 
        if   ($nouvelle_note >= 0 && $nouvelle_note <= 5)
        {
            $this->note = $nouvelle_note;
        } 
        else 
        {
            echo "Erreur: La note doit etre entre 0 et 5 <br>";
        }
    }
}

?>
