<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

class DimensionTest extends \PHPUnit_Framework_TestCase
{

    public function testIfDimensionEquals()
    {
        $dimension = new Dimension(3, 4);
        $otherDimension = new Dimension(3, 4);

        $this->assertTrue($dimension->equals($otherDimension));
    }

    public function testIfDimensionNotEquals()
    {
        $dimension = new Dimension(3, 4);
        $otherDimension = new Dimension(4, 3);

        $this->assertFalse($dimension->equals($otherDimension));
    }
}
