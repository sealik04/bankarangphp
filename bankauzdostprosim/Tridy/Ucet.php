<?php
class Ucet {
    public $zustatek = 0;

    function Vklad($castkaVkladu){
        $this->zustatek += $castkaVkladu;
    }

    function Vyber($castkaVyberu) {
        $this->zustatek -= $castkaVyberu;
    }

}
?>