<?php
class Ucet {
    public $zustatek;
    public $kontokorent;

    public function __construct() {
        $this->zustatek = 0;
    }

    public function vklad($castka) {
        $this->zustatek += $castka;
    }

    public function vyber($castka) {
        if ($this->zustatek >= $castka) {
            $this->zustatek -= $castka;
        }
    }

    public function getZustatek() {
        return $this->zustatek;
    }

    public function setKontokorent($kontokorent) {
        $this->kontokorent = $kontokorent;
    }
}