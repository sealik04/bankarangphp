<?php
class Kontokorent extends Ucet
{
    const LIMIT = -10000;

    public $zustatekKontokorentu;

    public function __construct()
    {
        parent::__construct();
        $this->zustatekKontokorentu = 0;
    }

    public function getZustatekKontokorentu()
    {
        return $this->zustatekKontokorentu;
    }


    public function vklad($castka)
    {
        if ($this->zustatekKontokorentu < 0) {

            $this->zustatekKontokorentu += $castka;

            if ($this->zustatekKontokorentu > 0) {
                $this->castka += $this->zustatekKontokorentu;
                $this->zustatekKontokorentu = 0;
            }
        }else {
            $this->castka += $castka;
        }
    }

    public function vyber($castka)
    {
    if ($castka > $this->getZustatek() && $this->zustatekKontokorentu > -10000) {
    $difference = $castka - $this->zustatek;
        $this->zustatek = 0;
        $this->zustatekKontokorentu -= $difference;
        }
    }
}
?>