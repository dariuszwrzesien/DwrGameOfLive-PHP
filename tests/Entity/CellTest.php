<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\ValueObject\Latitude;
use Dwr\GameOfLive\ValueObject\Longitude;
use Dwr\GameOfLive\ValueObject\Position;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{
    public function testCellLive()
    {
        $position = new Position(new Latitude(0), new Longitude(0));
        $cell = new Cell($position);

        $this->assertSame(true, $cell->isLive());
    }

    public function testCellPosition()
    {
        $position = new Position(new Latitude(0), new Longitude(0));
        $cell = new Cell($position);

        $this->assertSame($position, $cell->position());
    }
}
