<?php

namespace Dwr\GameOfLive\ValueObject;

class PositionTest extends \PHPUnit_Framework_TestCase
{
    public function testPosition()
    {
        $latitude = new Latitude(10);
        $longitude = new Longitude(15);
        $position = new Position($latitude, $longitude);

        $this->assertSame($latitude, $position->latitude());
        $this->assertSame($longitude, $position->longitude());

        $positionCoordinate = $position->coordinate();
        $this->assertSame($latitude, $positionCoordinate['latitude']);
        $this->assertSame($longitude, $positionCoordinate['longitude']);
    }

    public function testPositionToString()
    {
        $latitude = new Latitude(0);
        $longitude = new Longitude(5);

        $position = new Position($latitude, $longitude);
        $this->assertSame('0, 5', $position->__toString());
    }
}
