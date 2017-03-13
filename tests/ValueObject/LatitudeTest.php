<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

use PHPUnit\Framework\TestCase;

class LatitudeTest extends TestCase
{
    public function testLatitudeEquals()
    {
        $latitude1 = new Latitude(10);
        $latitude2 = new Latitude(10);

        $this->assertTrue($latitude1->equals($latitude2));
    }

    public function testLatitudeNotEquals()
    {
        $latitude1 = new Latitude(10);
        $latitude2 = new Latitude(11);

        $this->assertFalse($latitude1->equals($latitude2));
    }

    public function testLatitudeNotEqualsWhenWrongInstance()
    {
        $latitude = new Latitude(10);
        $longitude = new Longitude(10);

        $this->assertFalse($latitude->equals($longitude));
    }

    public function testLatitudeToString()
    {
        $latitude = new Latitude(100);
        $this->assertSame('100', (string) $latitude);
    }
}
