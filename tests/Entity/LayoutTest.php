<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Factory\CellFactory;
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

    public function testIfNumberOfLayoutCellsEqualsNumberOfCellsInArray()
    {
        $layoutArray = [
            ["lat" => 1, "lon" => 1],
            ["lat" => 2, "lon" => 2],
            ["lat" => 3, "lon" => 3]
        ];

        $layout = new Layout($layoutArray);

        $this->assertCount(3, $layout->getCells());
    }

    /**
     *
     * @dataProvider layoutProvider
     *
     * @param $layoutArray
     * @param $expect
     */
    public function testIfGetNeighboursReturnCorrectValues($layoutArray, $expect)
    {
        $position = new Position(new Latitude(2), new Longitude(2));
        $cell = new Cell($position);
        $layout = new Layout($layoutArray);

        $this->assertEquals($expect, $layout->countLiveNeighbours($cell));
    }

    public function layoutProvider()
    {
        return [
            [[
                ["lat" => 1, "lon" => 1],
                ["lat" => 2, "lon" => 2]
            ], 1],
            [[
                ["lat" => 1, "lon" => 1],
                ["lat" => 1, "lon" => 2],
                ["lat" => 2, "lon" => 2],
                ["lat" => 4, "lon" => 2]
            ], 2],
            [[
                ["lat" => 1, "lon" => 1],
                ["lat" => 1, "lon" => 2],
                ["lat" => 1, "lon" => 3],
                ["lat" => 2, "lon" => 1],
                ["lat" => 2, "lon" => 3],
                ["lat" => 3, "lon" => 1],
                ["lat" => 3, "lon" => 2],
                ["lat" => 3, "lon" => 3]
            ], 8],
            [[
                ["lat" => 1, "lon" => 4],
                ["lat" => 5, "lon" => 2],
                ["lat" => 6, "lon" => 3],
                ["lat" => 1, "lon" => 4],
            ], 0],
        ];
    }

    public function testRemoveCellFromLayout()
    {
        $schema = [
            ["lat" => 1, "lon" => 1],
            ["lat" => 1, "lon" => 2],
            ["lat" => 1, "lon" => 3],
            ["lat" => 2, "lon" => 1],
            ["lat" => 2, "lon" => 3],
            ["lat" => 3, "lon" => 1],
            ["lat" => 3, "lon" => 2],
            ["lat" => 3, "lon" => 3]
        ];

        $layout = new Layout($schema);
        $this->assertCount(8, $layout->getCells());

        $layout->removeCell(0);
        $this->assertCount(7, $layout->getCells());

        $layout->removeCell(2);
        $this->assertCount(6, $layout->getCells());

        $layout->removeCell(3);
        $layout->removeCell(4);
        $layout->removeCell(5);
        $layout->removeCell(6);
        $layout->removeCell(7);
        $this->assertCount(1, $layout->getCells());

        $cell = CellFactory::createCell(["lat" => 1, "lon" => 2]);
        $remainingCell = $layout->getCells()[1]; //index [1] hasn't been removed previously

        $this->assertEquals($cell->position(), $remainingCell->position());

    }

    public function testAddCellToLayout()
    {
        $schema = [
            ["lat" => 1, "lon" => 1]
        ];

        $layout = new Layout($schema);
        $this->assertCount(1, $layout->getCells());

        $coordinateForNewCell = ["lat" => 2, "lon" => 2];
        $layout->addCell($coordinateForNewCell);
        $this->assertCount(2, $layout->getCells());

        $cell = CellFactory::createCell($coordinateForNewCell);
        $newCell = $layout->getCells()[1];

        $this->assertEquals($cell->position(), $newCell->position());
    }
}
