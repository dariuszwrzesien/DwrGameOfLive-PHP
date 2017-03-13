<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

use PHPUnit\Framework\TestCase;

class LongitudeTest extends TestCase
{
    public function testLongitudeEquals()
    {
        $longitude1 = new Longitude(10);
        $longitude2 = new Longitude(10);

        $this->assertTrue($longitude1->equals($longitude2));
    }

    public function testLongitudeNotEquals()
    {
        $longitude1 = new Longitude(10);
        $longitude2 = new Longitude(11);

        $this->assertFalse($longitude1->equals($longitude2));
    }

    public function testLongitudeToString()
    {
        $longitude = new Longitude(100);
        $this->assertSame('100', (string) $longitude);
    }
}
