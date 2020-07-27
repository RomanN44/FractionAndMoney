<?php

namespace RomanN44\FractionAndMoney;

class Fraction {
    private $x;
    private $y;
    private $symvol;
    private const SEPARATING_MARK=',';
    public function __construct($x, $y, $symvol) {
        try {
            if(is_int($x) && is_int($y)) {
                $this->x=$x;
                if($y==0) {
                    throw new Exception("Деление на ноль.");
                } else {
                    $this->y=$y;
                }
            } else {
                throw new Exeption("Неверное число.");
            }
            if($symvol != '-' && $symvol !='+' && $symvol !='') {
                throw new Exception("Неверный знак.");
            } else {
                $this->symvol=$symvol;
            }
        }
        catch(Exception $e) {
            echo 'Выброшено исключение: ',  $e->getMessage(), "\n";
        }
    }
    public function ToString() {
        return $this->symvol.$this->x.self::SEPARATING_MARK.$this->y;
    }
    public function Addition() {
        return $this->x + $this->y;
    }
    public function Subtraction() {
        return $this->x - $this->y;
    } 
    public function Multiplication() {
        return $this->x * $this->y;
    }
    public function Division() {
        return $this->x / $this->y;
    }
    
}

?>