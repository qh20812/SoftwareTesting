<?php

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testPower()
    {
        $calc = new Calculator();
        $this->assertEquals(8, $calc->luyThua(2, 3), 'luyThua(2, 3) phải trả về 8');
        $this->assertEquals(1, $calc->luyThua(5, 0), 'luyThua(5, 0) phải trả về 1');
        $this->assertEquals(0.25, $calc->luyThua(2, -2), 'luyThua(2, -2) phải trả về 0.25');
        $this->assertEquals(1, $calc->luyThua(0, 0), 'luyThua(0, 0) phải trả về 1');
        $this->assertEquals(0, $calc->luyThua(0, 5), 'luyThua(0, 5) phải trả về 0');
        $this->assertEquals(-8, $calc->luyThua(-2, 3), 'luyThua(-2, 3) phải trả về -8');
        $this->assertEquals(16, $calc->luyThua(-2, 4), 'luyThua(-2, 4) phải trả về 16');
    }

    public function testRootN()
    {
        $calc = new Calculator();
        $this->assertEquals(2, $calc->canBacN(8, 3), 'canBacN(8, 3) phải trả về 2');
        $this->assertEquals(3, $calc->canBacN(9, 2), 'canBacN(9, 2) phải trả về 3');
        $this->assertEquals(1, $calc->canBacN(1, 5), 'canBacN(1, 5) phải trả về 1');
        $this->assertEquals(-2, $calc->canBacN(-8, 3), 'canBacN(-8, 3) phải trả về -2');
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Không thể căn bậc chẵn của số âm");
        $calc->canBacN(-16, 2);
    }

    public function testLog10()
    {
        $calc = new Calculator();
        $this->assertEquals(2, $calc->log10(100), 'log10(100) phải trả về 2');
        $this->assertEquals(0, $calc->log10(1), 'log10(1) phải trả về 0');
        $this->assertEquals(3, $calc->log10(1000), 'log10(1000) phải trả về 3');
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Logarit chỉ xác định với số dương");
        $calc->log10(0);
    }

    public function testLn()
    {
        $calc = new Calculator();
        $this->assertEquals(0, $calc->ln(1), 'ln(1) phải trả về 0');
        $this->assertEquals(log(2), $calc->ln(2), 'ln(2) phải trả về log(2)');
        $this->assertEquals(log(10), $calc->ln(10), 'ln(10) phải trả về log(10)');
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Logarit chỉ xác định với số dương");
        $calc->ln(-1);
    }

    public function testAbs()
    {
        $calc = new Calculator();
        $this->assertEquals(5, $calc->abs(5), 'abs(5) phải trả về 5');
        $this->assertEquals(5, $calc->abs(-5), 'abs(-5) phải trả về 5');
        $this->assertEquals(0, $calc->abs(0), 'abs(0) phải trả về 0');
        $this->assertEquals(1.5, $calc->abs(-1.5), 'abs(-1.5) phải trả về 1.5');
    }

    public function testIntegerPart()
    {
        $calc = new Calculator();
        $this->assertEquals(5, $calc->phanNguyen(5.7), 'phanNguyen(5.7) phải trả về 5');
        $this->assertEquals(-5, $calc->phanNguyen(-5.7), 'phanNguyen(-5.7) phải trả về -5');
        $this->assertEquals(0, $calc->phanNguyen(0.99), 'phanNguyen(0.99) phải trả về 0');
        $this->assertEquals(10, $calc->phanNguyen(10.01), 'phanNguyen(10.01) phải trả về 10');
    }

    public function testFractionPart()
    {
        $calc = new Calculator();
        $this->assertEqualsWithDelta(0.7, $calc->phanThapPhan(5.7), 1e-9, 'phanThapPhan(5.7) phải trả về 0.7');
        $this->assertEqualsWithDelta(-0.7, $calc->phanThapPhan(-5.7), 1e-9, 'phanThapPhan(-5.7) phải trả về -0.7');
        $this->assertEqualsWithDelta(0.99, $calc->phanThapPhan(0.99), 1e-9, 'phanThapPhan(0.99) phải trả về 0.99');
        $this->assertEqualsWithDelta(0.01, $calc->phanThapPhan(10.01), 1e-9, 'phanThapPhan(10.01) phải trả về 0.01');
    }

    public function testAdd()
    {
        $calc = new Calculator();
        $this->assertEquals(15, $calc->cong(5, 10), 'cong(5, 10) phải trả về 15');
        $this->assertEquals(0, $calc->cong(-5, 5), 'cong(-5, 5) phải trả về 0');
        $this->assertEquals(-10, $calc->cong(-5, -5), 'cong(-5, -5) phải trả về -10');
        $this->assertEquals(2.5, $calc->cong(1.5, 1.0), 'cong(1.5, 1.0) phải trả về 2.5');
        $this->assertEquals(100, $calc->cong(50, 50), 'cong(50, 50) phải trả về 100');
        $this->assertEquals(0, $calc->cong(0, 0), 'cong(0, 0) phải trả về 0');
        $this->assertEquals(1e6, $calc->cong(5e5, 5e5), 'cong(5e5, 5e5) phải trả về 1e6');
        $this->assertEquals(1e6, $calc->cong(1e6, 0), 'cong(1e6, 0) phải trả về 1e6');
        $this->assertEquals(0, $calc->cong(PHP_INT_MAX, -PHP_INT_MAX), 'cong(PHP_INT_MAX, -PHP_INT_MAX) phải trả về 0');
        $this->assertEquals(0, $calc->cong(PHP_INT_MIN, -PHP_INT_MIN), 'cong(PHP_INT_MIN, -PHP_INT_MIN) phải trả về 0');
    }
    public function testSubtract()
    {
        $calc = new Calculator();
        $this->assertEquals(-5, $calc->tru(5, 10), 'tru(5, 10) phải trả về -5');
        $this->assertEquals(-10, $calc->tru(-5, 5), 'tru(-5, 5) phải trả về -10');
        $this->assertEquals(0, $calc->tru(-5, -5), 'tru(-5, -5) phải trả về 0');
        $this->assertEquals(0.5, $calc->tru(1.5, 1.0), 'tru(1.5, 1.0) phải trả về 0.5');
        $this->assertEquals(0, $calc->tru(50, 50), 'tru(50, 50) phải trả về 0');
        $this->assertEquals(0, $calc->tru(0, 0), 'tru(0, 0) phải trả về 0');
        $this->assertEquals(0, $calc->tru(5e5, 5e5), 'tru(5e5, 5e5) phải trả về 0');
        $this->assertEquals(1e6, $calc->tru(1e6, 0), 'tru(1e6, 0) phải trả về 1e6');
        $this->assertEquals(2 * PHP_INT_MAX, $calc->tru(PHP_INT_MAX, -PHP_INT_MAX), 'tru(PHP_INT_MAX, -PHP_INT_MAX) phải trả về 2*PHP_INT_MAX');
        $this->assertEquals(2 * PHP_INT_MIN, $calc->tru(PHP_INT_MIN, -PHP_INT_MIN), 'tru(PHP_INT_MIN, -PHP_INT_MIN) phải trả về 2*PHP_INT_MIN');
    }
    public function testMultiply()
    {
        $calc = new Calculator();
        $this->assertEquals(50, $calc->nhan(5, 10), 'nhan(5, 10) phải trả về 50');
        $this->assertEquals(-25, $calc->nhan(-5, 5), 'nhan(-5, 5) phải trả về -25');
        $this->assertEquals(25, $calc->nhan(-5, -5), 'nhan(-5, -5) phải trả về 25');
        $this->assertEquals(1.5, $calc->nhan(1.5, 1.0), 'nhan(1.5, 1.0) phải trả về 1.5');
        $this->assertEquals(2500, $calc->nhan(50, 50), 'nhan(50, 50) phải trả về 2500');
        $this->assertEquals(0, $calc->nhan(0, 0), 'nhan(0, 0) phải trả về 0');
        $this->assertEquals(2.5e11, $calc->nhan(5e5, 5e5), 'nhan(5e5, 5e5) phải trả về 2.5e11');
        $this->assertEquals(0, $calc->nhan(1e6, 0), 'nhan(1e6, 0) phải trả về 0');
        $this->assertEquals(-PHP_INT_MAX * PHP_INT_MAX, $calc->nhan(PHP_INT_MAX, -PHP_INT_MAX), 'nhan(PHP_INT_MAX, -PHP_INT_MAX) phải trả về -PHP_INT_MAX * PHP_INT_MAX');
        $this->assertEquals(-pow(PHP_INT_MIN, 2), $calc->nhan(PHP_INT_MIN, -PHP_INT_MIN), 'nhan(PHP_INT_MIN, -PHP_INT_MIN) phải trả về -pow(PHP_INT_MIN, 2)');
    }
    public function testDivide()
    {
        $calc = new Calculator();
        $this->assertEquals(2, $calc->chia(10, 5), 'chia(10, 5) phải trả về 2');
        $this->assertEquals(-1, $calc->chia(-5, 5), 'chia(-5, 5) phải trả về -1');
        $this->assertEquals(1, $calc->chia(-5, -5), 'chia(-5, -5) phải trả về 1');
        $this->assertEquals(1.5, $calc->chia(1.5, 1.0), 'chia(1.5, 1.0) phải trả về 1.5');
        $this->assertEquals(1, $calc->chia(50, 50), 'chia(50, 50) phải trả về 1');
        $this->assertEquals(0, $calc->chia(0, 5), 'chia(0, 5) phải trả về 0');
        $this->assertEquals(1, $calc->chia(5e5, 5e5), 'chia(5e5, 5e5) phải trả về 1');
        $this->assertEquals(-1, $calc->chia(PHP_INT_MAX, -PHP_INT_MAX), 'chia(PHP_INT_MAX, -PHP_INT_MAX) phải trả về -1');
        $this->assertEquals(1, $calc->chia(PHP_INT_MIN, PHP_INT_MIN), 'chia(PHP_INT_MIN, PHP_INT_MIN) phải trả về 1');
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Không thể chia cho 0");
        $calc->chia(5, 0);
    }
    public function testSquareRoot()
    {
        $calc = new Calculator();
        $this->assertEquals(5, $calc->canBacHai(25), 'canBacHai(25) phải trả về 5');
        $this->assertEquals(0, $calc->canBacHai(0), 'canBacHai(0) phải trả về 0');
        $this->assertEquals(sqrt(2), $calc->canBacHai(2), 'canBacHai(2) phải trả về sqrt(2)');
        $this->assertEquals(sqrt(1e6), $calc->canBacHai(1e6), 'canBacHai(1e6) phải trả về sqrt(1e6)');
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Không thể căn bậc hai của số âm");
        $calc->canBacHai(-25);
    }
    public function testCubeRoot()
    {
        $calc = new Calculator();
        $this->assertEquals(3, $calc->canBacBa(27), 'canBacBa(27) phải trả về 3');
        $this->assertEquals(0, $calc->canBacBa(0), 'canBacBa(0) phải trả về 0');
        $this->assertEquals(-3, $calc->canBacBa(-27), 'canBacBa(-27) phải trả về -3');
        $this->assertEquals(pow(1e6, 1 / 3), $calc->canBacBa(1e6), 'canBacBa(1e6) phải trả về pow(1e6, 1/3)');
        $this->assertEquals(-pow(1e6, 1 / 3), $calc->canBacBa(-1e6), 'canBacBa(-1e6) phải trả về -pow(1e6, 1/3)');
    }
}
