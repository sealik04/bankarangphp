<?php
class Kontokorent extends Ucet
{
    const LIMIT = -10000;

    public $zustatekKontokorentu;

    public function __construct()
    {
        parent::__construct();
        $this->zustatekKontokorentu = 10000;
    }

    public function getZustatekKontokorentu()
    {
        return $this->zustatekKontokorentu;
    }


    public function vklad($castka)
    {
        $this->zustatekKontokorentu += $castka;
    }

    public function vyber($castka)
    {
        if($this->zustatekKontokorentu > -10000 && $this->zustatekKontokorentu < 10000 || $this->zustatekKontokorentu > -10000 && $this->zustatekKontokorentu < 10000 & $this->zustatek == 0){
            $this->zustatekKontokorentu -= $castka;
        }
    }
}
?>