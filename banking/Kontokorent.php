<?php
class Kontokorent extends Ucet {
    const LIMIT = -50000;
    const MAX_BALANCE = 50000;

    public $zustatekKontokorentu = 0;

    public function getZustatekKontokorentu() {
        return $this->zustatekKontokorentu;
    }

    public function setZustatekKontokorentu($castka) {
        $this->zustatekKontokorentu = $castka;
    }

    public function vklad($castka) {
        if ($this->zustatekKontokorentu + $castka > self::MAX_BALANCE) {
            $castka = self::MAX_BALANCE - $this->zustatekKontokorentu;
        }

        $this->zustatekKontokorentu += $castka;
        if ($this->zustatekKontokorentu < 0) {
            $debt = abs($this->zustatekKontokorentu);
            if ($this->zustatek >= $debt) {
                $this->zustatek -= $debt;
                $this->zustatekKontokorentu = 0;
            } else {
                $this->zustatek = 0;
                $this->zustatekKontokorentu += $castka;
            }
        }
    }

    public function vyber($castka) {
        if ($this->zustatekKontokorentu >= $castka) {
            $this->zustatekKontokorentu -= $castka;
        } elseif ($this->zustatek + $this->zustatekKontokorentu >= $castka) {
            $difference = $castka - $this->zustatekKontokorentu;
            $this->zustatek -= $difference;
            $this->zustatekKontokorentu = 0;
        } elseif ($this->zustatek >= abs($castka)) {
            $this->zustatek += $castka;
            $this->zustatekKontokorentu = self::LIMIT;
        } else {
            echo "Nedostatečný zůstatek na účtě a kontokorentu";
        }
    }
}
?>
