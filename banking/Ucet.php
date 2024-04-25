<?php
class Ucet {
    private $zustatek;
    private $kontokorent;

    public function __construct(Kontokorent $kontokorent) {
        $this->zustatek = 0;
        $this->kontokorent = $kontokorent;
    }

    public function vklad($castka) {
        $this->zustatek += $castka;

        if ($this->kontokorent->getZustatekKontokorentu() < 0) {
            $this->kontokorent->vyber(min(-$this->kontokorent->getZustatekKontokorentu(), $castka));
            $this->zustatek -= min(-$this->kontokorent->getZustatekKontokorentu(), $castka);
        }
    }

    public function vyber($castka) {
        if ($castka > $this->zustatek) {
            $difference = $castka - $this->zustatek;

            if ($this->kontokorent->getZustatekKontokorentu() >= $difference) {
                $this->kontokorent->vyber($difference);
                $this->zustatek = 0;
            } else {
                throw new Exception("Not enough funds in account or kontokorent to complete transaction.");
            }
        } else {
            $this->zustatek -= $castka;
        }
    }

    public function getZustatek() {
        return $this->zustatek;
    }
}
?>
