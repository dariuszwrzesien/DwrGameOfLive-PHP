<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

use InvalidArgumentException;

class NaturalTest extends \PHPUnit_Framework_TestCase
{
    public function testNaturalPositiveInt()
    {
        $int = 101;
        $natural = new Natural($int);

        $this->assertSame($int, $natural->value());
    }

    public function testNaturalPositiveZero()
    {
        $int = 0;
        $natural = new Natural($int);

        $this->assertSame($int, $natural->value());
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Natural value has to be equal or greater than 0.
     */
    public function testNaturalNegativeThrowException()
    {
        $int = -123;
        new Natural($int);
    }
}
