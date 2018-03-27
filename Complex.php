<?php

class Complex {

    private $realPart;

    private $imaginaryPart;

    /**
     * Complex constructor.
     * @param     $realPart
     * @param int $imaginaryPart
     */
    public function __construct($realPart, $imaginaryPart = 0) {
        $this->realPart = $realPart;
        $this->imaginaryPart = $imaginaryPart;
    }

    /**
     * @return mixed
     */
    public function getRealPart() {
        return $this->realPart;
    }


    /**
     * @return int
     */
    public function getImaginaryPart() {
        return $this->imaginaryPart;
    }

    /**
     * (a + bi) + (c + di) = (a + c) + (b + d)i
     * @param \Complex $a
     * @param \Complex $b
     * @return \Complex
     */
    public static function summ(Complex $a, Complex $b) {
        $realPart = $a->getRealPart() + $b->getRealPart();
        $imaginaryPart = $a->getImaginaryPart() + $b->getImaginaryPart();
        $c = new Complex($realPart, $imaginaryPart);
        return $c;
    }

    /**
     * (a + bi) - (c + di) = (a - c) + (b - d)i
     * @param \Complex $a
     * @param \Complex $b
     * @return \Complex
     */
    public static function subtraction(Complex $a, Complex $b) {
        $realPart = $a->getRealPart() - $b->getRealPart();
        $imaginaryPart = $a->getImaginaryPart() - $b->getImaginaryPart();
        $c = new Complex($realPart, $imaginaryPart);
        return $c;
    }


    /**
     * (a + bi) · (c + di) = (ac – bd) + (ad + bc)i
     * @param \Complex $a
     * @param \Complex $b
     * @return \Complex
     */
    public static function multiplication(Complex $a, Complex $b) {
        $realPart = $a->getRealPart() * $b->getRealPart()
          - $a->getImaginaryPart() * $b->imaginaryPart;
        $imaginaryPart = $a->getRealPart() * $b->getImaginaryPart()
          + $a->getImaginaryPart() * $b->realPart;
        $c = new Complex($realPart, $imaginaryPart);
        return $c;
    }


    /**
     * (a + bi) / (c + di) = (ac + bd)/(c^2+d^2) + (bc – ad)/(c^2+d^2)
     * @param \Complex $a
     * @param \Complex $b
     * @return \Complex
     */
    public static function division(Complex $a, Complex $b) {
        $denominator = pow($b->getRealPart(), 2) + pow($b->getImaginaryPart(), 2);
        if ($denominator) {
            $realPart = ($a->getRealPart() * $b->getRealPart()
                + $a->getImaginaryPart() * $b->imaginaryPart)
              / $denominator;
            $imaginaryPart = ($a->getImaginaryPart() * $b->getRealPart()
                - $a->getRealPart() * $b->imaginaryPart)
              / $denominator;
            $c = new Complex($realPart, $imaginaryPart);
            return $c;
        } else {
            // Division by zero
            return false;
        }
    }
}