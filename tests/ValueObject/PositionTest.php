<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
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

    public function testPositionEquals()
    {
        $latitude = new Latitude(10);
        $longitude = new Longitude(15);
        $position1 = new Position($latitude, $longitude);
        $position2 = new Position($latitude, $longitude);

        $this->assertTrue($position1->equals($position2));
    }

    public function testPositionNotEquals()
    {
        $position1 = new Position(new Latitude(10), new Longitude(15));
        $position2 = new Position(new Latitude(0), new Longitude(1));

        $this->assertFalse($position1->equals($position2));
    }

    public function testPositionNotEqualsWhenWrongInstance()
    {
        $position = new Position(new Latitude(10), new Longitude(15));
        $dimension = new Dimension(new Length(10), new Width(15));

        $this->assertFalse($position->equals($dimension));
    }

    public function testPositionToString()
    {
        $latitude = new Latitude(0);
        $longitude = new Longitude(5);

        $position = new Position($latitude, $longitude);
        $this->assertSame('0, 5', (string) $position);
    }
}
