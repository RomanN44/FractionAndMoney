<?php

namespace RomanN44\FractionAndMoney;

header('Content-Type: text/plain');

require_once('Fraction.php');

$test = new Fraction(6,7,'-');

echo $test->ToString()"\n";
echo $test->Addition()."\n";
echo $test->Subtraction()."\n";
echo $test->Multiplication()."\n";
echo $test->Division()."\n";

?>