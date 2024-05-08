<?php
class Ucet {
    public $zustatek;
    public $kontokorent;

    public function __construct() {
        $this->zustatek = 0;
    }

    public function vklad($castka) {
        if ($this->kontokorent->getZustatekKontokorentu() < 0) {
            $overdraftDeposit = min($castka, -$this->kontokorent->getZustatekKontokorentu());
            $this->kontokorent->vklad($overdraftDeposit);
            $castka -= $overdraftDeposit;
        }

        $this->zustatek += $castka;
    }

    public function vyber($castka) {
        if ($this->zustatek >= $castka) {
            $this->zustatek -= $castka;
        } elseif ($this->kontokorent->getZustatekKontokorentu() > -10000 && $this->kontokorent->getZustatekKontokorentu() <= 10000 && $this->zustatek <= 0) {
            $difference = $castka - $this->zustatek;
            $this->zustatek = 0;
            $this->kontokorent->vyber($difference);
        }
    }

    public function getZustatek() {
        return $this->zustatek;
    }

    public function setKontokorent($kontokorent) {
        $this->kontokorent = $kontokorent;
    }
}