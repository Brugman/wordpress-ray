<?php

declare (strict_types=1);
namespace Spatie\WordPressRay\Brick\Math\Internal\Calculator;

use Spatie\WordPressRay\Brick\Math\Internal\Calculator;
/**
 * Calculator implementation built around the bcmath library.
 *
 * @internal
 */
class BcMathCalculator extends Calculator
{
    /**
     * {@inheritdoc}
     */
    public function add(string $a, string $b) : string
    {
        return \bcadd($a, $b, 0);
    }
    /**
     * {@inheritdoc}
     */
    public function sub(string $a, string $b) : string
    {
        return \bcsub($a, $b, 0);
    }
    /**
     * {@inheritdoc}
     */
    public function mul(string $a, string $b) : string
    {
        return \bcmul($a, $b, 0);
    }
    /**
     * {@inheritdoc}
     */
    public function divQ(string $a, string $b) : string
    {
        return \bcdiv($a, $b, 0);
    }
    /**
     * {@inheritdoc}
     */
    public function divR(string $a, string $b) : string
    {
        return \bcmod($a, $b);
    }
    /**
     * {@inheritdoc}
     */
    public function divQR(string $a, string $b) : array
    {
        $q = \bcdiv($a, $b, 0);
        $r = \bcmod($a, $b);
        return [$q, $r];
    }
    /**
     * {@inheritdoc}
     */
    public function pow(string $a, int $e) : string
    {
        return \bcpow($a, (string) $e, 0);
    }
    /**
     * {@inheritDoc}
     */
    public function sqrt(string $n) : string
    {
        return \bcsqrt($n, 0);
    }
}