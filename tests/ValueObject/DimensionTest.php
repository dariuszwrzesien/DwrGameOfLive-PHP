<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

class DimensionTest extends \PHPUnit_Framework_TestCase
{

    public function testIfDimensionEquals()
    {
        $length = new Length(3);
        $width = new Width(4);

        $dimension = new Dimension($length, $width);
        $otherDimension = new Dimension($length, $width);

        $this->assertTrue($dimension->equals($otherDimension));
    }

    public function testIfDimensionNotEquals()
    {
        $length1 = new Length(3);
        $width1 = new Width(4);

        $length2 = new Length(4);
        $width2 = new Width(5);

        $dimension = new Dimension($length1, $width1);
        $otherDimension = new Dimension($length2, $width2);

        $this->assertFalse($dimension->equals($otherDimension));
    }

    public function testDimensionToString()
    {
        $length = new Length(3);
        $width = new Width(4);

        $dimension = new Dimension($length, $width);
        $this->assertSame('3&lowast;4', $dimension->__toString());
    }
}
