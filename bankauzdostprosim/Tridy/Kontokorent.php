<?php
class Kontokorent extends Ucet {
    public $zustatekKontokorentu = 0;
    function Vklad($castkaVkladu){
        $this->zustatekKontokorentu += $castkaVkladu;
    }

    function Vyber($castkaVyberu) {
        $this->zustatekKontokorentu -= $castkaVyberu;
    }
}
?>

