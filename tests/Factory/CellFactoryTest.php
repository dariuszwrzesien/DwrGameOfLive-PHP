<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Factory;

use Dwr\GameOfLive\Entity\Cell;
use Dwr\GameOfLive\ValueObject\Latitude;
use Dwr\GameOfLive\ValueObject\Longitude;
use Dwr\GameOfLive\ValueObject\Position;
use PHPUnit\Framework\TestCase;

class CellFactoryTest extends TestCase
{
    public function testCellCreation()
    {
        $data = [
            'lat' => 10,
            'lon' => 20,
        ];

        $lat = new Latitude(10);
        $lon = new Longitude(20);
        $position = new Position($lat, $lon);

        $this->assertEquals(new Cell($position), CellFactory::createCell($data));
    }
}
