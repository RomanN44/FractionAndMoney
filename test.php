<?php

namespace RomanN44\FractionAndMoney;


require_once('Fraction.php');
require_once('Money.php');

echo "<h1>Проверка класса Fraction</h1>";
echo "<h2>Компоратор</h2>";
$testBase = new Fraction('',4,5,'.');
$testBase1 = new Fraction('+',4,5);
$testBase2 = new Fraction('-',1,7,',');

if($testBase->comparison($testBase1) == 0)
{
    echo "4,5 = 4,5<br>";
}
if($testBase2->comparison($testBase1) == -1)
{
    echo "-1,7 < 4,5<br>";
}
if($testBase->comparison($testBase2) == 1)
{
    echo "4,5 > -1,7<br>";
}
echo "<h2>Сложение</h2>";
echo "4,5+4,5 = ".$testBase->addition($testBase1)."<br>";
echo "<h2>Вычитание</h2>";
echo "-1,7-4,5 = ".$testBase2->subtraction($testBase1)."<br>";
echo "<h2>Умножение</h2>";
echo "4,5*4,5 = ".$testBase->multiplication($testBase1)."<br>";
echo "<h2>Деление</h2>";
echo "4,5/(-1,7) = ".$testBase2->division($testBase1)."<br>";
echo "<h2>Сортировка</h2>";
echo "До сортировки<br>";
$test0 = new Fraction('',rand(0, 1000), rand(0, 100));
echo $test0."<br>";
$test1 = new Fraction('',rand(0, 1000), rand(0, 100));
echo $test1."<br>";
$test2 = new Fraction('',rand(0, 1000), rand(0, 100));
echo $test2."<br>";
$test3 = new Fraction('',rand(0, 1000), rand(0, 100));
echo $test3."<br>";
$test4 = new Fraction('',rand(0, 1000), rand(0, 100));
echo $test4."<br>";

$array = array($test0,$test1,$test2,$test3,$test4);
$array = Fraction::sort($array,true);
echo "Сортировка по возрастанию<br>";
for ($i = 0; $i < 5; $i++) 
{
    echo $array[$i];
    echo "<br>";
}
$array = array($test0,$test1,$test2,$test3,$test4);
$array = Fraction::sort($array,false);

echo "Сортировка по убыванию<br>";
for ($i = 0; $i < 5; $i++) 
{
    echo $array[$i];
    echo "<br>";
}


echo "<h1>Тестирование класса Money</h1>";
echo "<h2>Форматирование</h2>";
$testMoney = new Money('$','',981234,2457);
echo $testMoney->Formatting();
?>