<?php

require 'Complex.php';

class ComplexTests extends PHPUnit_Framework_TestCase {

    public function testSumm() {
        $a = new Complex(1, 1);
        $b = new Complex(2, 2);
        $c = new Complex(3, 3);
        $this->assertEquals($c, Complex::summ($a, $b));

        $a = new Complex(1);
        $b = new Complex(0, -1);
        $c = new Complex(1, -1);
        $this->assertEquals($c, Complex::summ($a, $b));

        $a = new Complex(-1, -1);
        $b = new Complex(-2, -2);
        $c = new Complex(-3, -3);
        $this->assertEquals($c, Complex::summ($a, $b));
    }

    public function testSubtraction() {
        $a = new Complex(3, 3);
        $b = new Complex(2, 2);
        $c = new Complex(1, 1);
        $this->assertEquals($c, Complex::subtraction($a, $b));

        $a = new Complex(3);
        $b = new Complex(2, 2);
        $c = new Complex(1, -2);
        $this->assertEquals($c, Complex::subtraction($a, $b));

        $a = new Complex(0, -3);
        $b = new Complex(-2, -1);
        $c = new Complex(2, -2);
        $this->assertEquals($c, Complex::subtraction($a, $b));

    }

    public function testMultiplication() {
        $a = new Complex(1, 1);
        $b = new Complex(2, 2);
        $c = new Complex(0, 4);
        $this->assertEquals($c, Complex::multiplication($a, $b));

        $a = new Complex(1);
        $b = new Complex(2, 2);
        $c = new Complex(2, 2);
        $this->assertEquals($c, Complex::multiplication($a, $b));

        $a = new Complex(0, 2);
        $b = new Complex(2, 2);
        $c = new Complex(-4, 4);
        $this->assertEquals($c, Complex::multiplication($a, $b));
    }

    public function testDivision() {
        $a = new Complex(1, 1);
        $b = new Complex(2, 2);
        $c = new Complex(0.5);
        $this->assertEquals($c, Complex::division($a, $b));

        $a = new Complex(1);
        $b = new Complex(2, -2);
        $c = new Complex(0.25, 0.25);
        $this->assertEquals($c, Complex::division($a, $b));

        $a = new Complex(1, 2);
        $b = new Complex(0, -2);
        $c = new Complex(-1, 0.5);
        $this->assertEquals($c, Complex::division($a, $b));

        $a = new Complex(1, 1);
        $b = new Complex(0, 0);
        $this->assertFalse(Complex::division($a, $b));
    }
}