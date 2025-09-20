<?php
class Calculator
{
    public function cong($a, $b)
    {
        return $a + $b;
    }
    public function tru($a, $b)
    {
        return $a - $b;
    }
    public function nhan($a, $b)
    {
        return $a * $b;
    }
    public function chia($a, $b)
    {
        if ($b == 0) {
            throw new InvalidArgumentException("Không thể chia cho 0");
        }
        return $a / $b;
    }
    public function canBacHai($a)
    {
        if ($a < 0) {
            throw new InvalidArgumentException("Không thể căn bậc hai của số âm");
        }
        return sqrt($a);
    }
    public function canBacBa($a)
    {
        return $a < 0 ? -pow(abs($a), 1 / 3) : pow($a, 1 / 3);
    }
    public function luyThua($a, $b)
    {
        return pow($a, $b);
    }
    public function canBacN($a, $n)
    {
        if ($n == 0) {
            throw new InvalidArgumentException("Không thể căn bậc 0");
        }
        if ($a < 0 && $n % 2 == 0) {
            throw new InvalidArgumentException("Không thể căn bậc chẵn của số âm");
        }
        return $a < 0 ? -pow(abs($a), 1 / $n) : pow($a, 1 / $n);
    }

    public function log10($a)
    {
        if ($a <= 0) {
            throw new InvalidArgumentException("Logarit chỉ xác định với số dương");
        }
        return log10($a);
    }
    public function ln($a)
    {
        if ($a <= 0) {
            throw new InvalidArgumentException("Logarit chỉ xác định với số dương");
        }
        return log($a);
    }
    public function abs($a)
    {
        return abs($a);
    }
    public function phanNguyen($a)
    {
        return intval($a);
    }
    public function phanThapPhan($a)
    {
        return $a - intval($a);
    }
}
