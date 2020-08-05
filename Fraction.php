<?php

namespace RomanN44\FractionAndMoney;

class Fraction {
    private $intPart;
    private $fractionPart;
    private $symvol;
    private $separator;
    private $fraction;

    public function __construct($symvol, $intPart, $fractionPart, $separator = ',') // (+ 1 , 4)
    {
        try
        {
            if($symvol != '-' && $symvol != '+' && $symvol != '')
            {
                throw new Exception("Неверный знак!");
            } else {
                $this->symvol=$symvol;
            }
            if($separator >= '0' && $separator <='9')
            {
                throw new Exception("Неверный разделительный знак!");
            } else {
                $this->separator=$separator;
            }
            $this->intPart=$intPart;
            $this->fractionPart=$fractionPart;
            $this->fraction = $this->packToFraction();
        } 
        catch(Exception $e)
        {
            echo 'Выброшено исключение: ', $e->getMessage(), "\n";
        }
        // $this->symvol=$symvol;
        // $this->intPart=$intPart;
        // $this->separator=$separator;
        // $this->fractionPart=$fractionPart;
        // $this->fraction = $this->packToFraction();
    }
    
    protected function packToFraction()
    {
        return $this->symvol.$this->intPart.$this->separator.$this->fractionPart;
    }

    public function __toString()
    {
        return $this->fraction;
    }

    public function getSeparator()
    {
        return $this->separator;
    }

    public function getSymvol()
    {
        return $this->symvol;
    }

    public function getIntPart()
    {
        return $this->intPart;
    }

    public function getFractionPart()
    {
        return $this->fractionPart;
    }

    protected function toDouble()
    {
        if($this->separator == $this->symvol)
        {
            $position = strrpos($this->fraction, $this->separator);
            $fraction = substr_replace($this->fraction, '.', $position, -1 );
        }
        $chars = ['-', '+'];
        $fraction = str_replace($chars, '', $this->fraction);
        $fraction = str_replace($this->separator, '.', $fraction);
        if($this->symvol == '-')
        {
            return -doubleval($fraction);
        } else {
            return doubleval($fraction);
        }
       
    }

    public function addition(Fraction $secondFraction)
    {
       $fraction = $this->toDouble();
       $secondFraction = $secondFraction->toDouble();
       $newFraction = $fraction + $secondFraction;
       return $this->unpacking($newFraction);
    }

    public function subtraction(Fraction $secondFraction)
    {
       $fraction = $this->toDouble();
       $secondFraction = $secondFraction->toDouble();
       $newFraction = $fraction - $secondFraction;
       return $this->unpacking($newFraction);
    }

    public function multiplication(Fraction $secondFraction)
    {
       $fraction = $this->toDouble();
       $secondFraction = $secondFraction->toDouble();
       $newFraction = $fraction * $secondFraction;
       return $this->unpacking($newFraction);
    }

    public function division(Fraction $secondFraction)
    {
       $fraction = $this->toDouble();
       $secondFraction = $secondFraction->toDouble();
       try
       {
           if($secondFraction == 0)
           {
               throw new Exception("Деление на 0!");
           } else {
               $newFraction = $fraction / $secondFraction;
               return $this->unpacking($newFraction);
           }
       }
       catch(Exception $e)
       {
           echo 'Выброшено исключение: ', $e->getMessage(), "\n";
       }
    }

    public function comparison(Fraction $secondFraction)
    {
        //echo $secondFraction->toDouble();
        if($this->toDouble() > $secondFraction->toDouble())
        {
            return 1;
        } elseif($this->toDouble() < $secondFraction->toDouble()) {
            return -1;
        } else {
            return 0;
        }
    }
    
    protected function unpacking($fraction) //private
    {
        if($fraction > 0)
        {
            $newSymvol = '+';
        } elseif($fraction < 0) {
            $newSymvol = '-';
        } else  {
            $newSymvol = '';
        }

        $newIntPart = floor($fraction);
        $newFractionPart = $fraction - $newIntPart;
        $newFractionPart = $newFractionPart * pow(10,strlen($newFractionPart)-2);

        return new Fraction($newSymvol, abs($newIntPart),  $newFractionPart,'.');
    }

    public static function sort($array, $ask = true)
    {
        $count = count($array);   
        if($count == 1)
        {
            return $array;
        }     
        for ($i = 0; $i < $count; $i++) {
            for ($j = $count - 1; $j > $i; $j--) {
                if ($array[$j]->fractionPart > $array[$j - 1]->fractionPart) {
                    $tmp = $array[$j];
                    $array[$j] = $array[$j - 1];
                    $array[$j - 1] = $tmp;
                }
            }
        }
        if($ask == true)
        {
            $array = array_reverse($array);
        }
        return $array;
    }

}
?>