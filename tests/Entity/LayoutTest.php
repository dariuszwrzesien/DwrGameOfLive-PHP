<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\ValueObject\Latitude;
use Dwr\GameOfLive\ValueObject\Longitude;
use Dwr\GameOfLive\ValueObject\Position;
use PHPUnit\Framework\TestCase;

class LayoutTest extends TestCase
{
    public function testLayoutCell()
    {
        $layoutArray = [
            ["lat" => 1, "lon" => 1],
            ["lat" => 2, "lon" => 2],
            ["lat" => 3, "lon" => 3]
        ];

        $layout = new Layout($layoutArray);
        $cells = $layout->getCells();

        $position1 = new Position(
            new Latitude(1),
            new Longitude(1)
        );

        $position2 = new Position(
            new Latitude(2),
            new Longitude(2)
        );

        $position3 = new Position(
            new Latitude(3),
            new Longitude(3)
        );

        $this->assertTrue($cells[0]->position()->equals($position1));
        $this->assertTrue($cells[1]->position()->equals($position2));
        $this->assertTrue($cells[2]->position()->equals($position3));
    }
}