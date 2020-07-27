<?php

namespace RomanN44\FractionAndMoney;
require_once('Fraction.php');

class Money extends Fraction {
    private $currency;
    public function __construct($x, $y, $symvol, $currency) {
        parent::__construct($x, $y, $symvol);
        $this->currency=$currency;
    }
    public function Formatting () {
        return parent::ToString().$this->currency;
    }
}

?>