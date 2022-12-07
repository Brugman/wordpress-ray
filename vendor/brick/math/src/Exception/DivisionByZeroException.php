<?php

declare (strict_types=1);
namespace Spatie\WordPressRay\Brick\Math\Exception;

/**
 * Exception thrown when a division by zero occurs.
 */
class DivisionByZeroException extends MathException
{
    /**
     * @return DivisionByZeroException
     */
    public static function divisionByZero() : DivisionByZeroException
    {
        return new self('Division by zero.');
    }
    /**
     * @return DivisionByZeroException
     */
    public static function denominatorMustNotBeZero() : DivisionByZeroException
    {
        return new self('The denominator of a rational number cannot be zero.');
    }
}
