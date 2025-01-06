<?php
require_once("felins.php");
class Tigre extends Félins
{
    public function presentation()
    {
        parent::presentation();
            echo "C'est un Tigre . <br>";
    }
}
?>