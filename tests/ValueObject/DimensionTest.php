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
        $dimension = new Dimension(new Length(3), new Width(4));
        $otherDimension = new Dimension(new Length(4), new Width(5));

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
