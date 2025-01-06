<?php
require_once("felins.php");
class Lion extends Félins
{
    public function presentation()
    {
        parent::presentation();
            echo "C'est un Lion . <br>";
    }
}

?>