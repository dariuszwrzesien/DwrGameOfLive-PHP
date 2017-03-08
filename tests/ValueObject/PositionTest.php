<?php

namespace Dwr\GameOfLive\ValueObject;


class PositionTest extends \PHPUnit_Framework_TestCase
{
    public function testPosition()
    {
//        $position = new Position(1, 2);

    }

    public function testPositionToString()
    {
        $position = new Position(0, 5);
        $this->assertSame('0, 5', $position->__toString());
    }
}
