<?php

namespace RomanN44\FractionAndMoney;
require_once('Fraction.php');

class Money extends Fraction {
    private $currency;
    public function __construct($currency, $symvol, $intPart,  $fractionPart, $separator = ',') {
        parent::__construct($symvol, $intPart,  $fractionPart, $separator);
        $this->currency=$currency;
    }
    public function Formatting () {
        return number_format(parent::toDouble(), 3, ',', ' ')." ".$this->currency;
    }
}

// $test = new Money('$','-',90000,233333);
// echo $test->Formatting();
?>