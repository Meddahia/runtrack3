<?php
class  Félins extends Animaux
{
    public function chasser()
    {
        echo $this -> nom . " en train de chasser .<br>";
        $this -> poids += 5;
    }

    public function presentation()
        {
            parent::presentation();
                echo " C'est un Felin. <br>";
        }
}

?>