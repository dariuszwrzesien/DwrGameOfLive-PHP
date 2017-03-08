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
        $latitude = new Latitude(0);
        $longitude = new Longitude(5);

        $position = new Position($latitude, $longitude);
        $this->assertSame('0, 5', $position->__toString());
    }
}
