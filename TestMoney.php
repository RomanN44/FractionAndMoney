<?php

namespace RomanN44\FractionAndMoney;

header('Content-Type: text/plain');

require_once('Money.php');

$test = new Money(1,2,'',"$");
echo $test->Formatting(); 

?>