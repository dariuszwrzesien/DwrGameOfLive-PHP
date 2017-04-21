<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Factory\CellFactory;

class Layout
{
    /**
     * @var array
     */
    private $cells;

    /**
     * Layout constructor.
     * @param array $layout
     */
    public function __construct(array $layout)
    {
        $this->cells = [];
        foreach ($layout as $coordinate) {
            $this->cells[] = CellFactory::createCell($coordinate);
        }
    }

    /**
     * @return array
     */
    public function getCells() : array
    {
        return $this->cells;
    }

    public function countLiveNeighbours(Cell $cell)
    {
        $neighbourMesh = [
            [-1, -1], [-1, 0], [-1, 1],
            [ 0, -1],          [ 0, 1],
            [ 1, -1], [ 1, 0], [ 1, 1]
        ];

        return $this->countNeighbours($cell, $neighbourMesh);
    }

    public function countDeadNeighbours(Cell $cell)
    {
        $neighbourMesh = [
            [-2, -2], [-2, 1], [-2, 2],
            [ 1, -2],          [ 1, 2],
            [ 2, -2], [ 2, 1], [ 2, 2]
        ];

        return $this->countNeighbours($cell, $neighbourMesh);
    }

    /**
     * @param Cell $cell
     * @param array $mesh
     * @return int
     */
    private function countNeighbours(Cell $cell, array $mesh)
    {
        $x = $cell->position()->latitude()->value();
        $y = $cell->position()->longitude()->value();

        $neighbours = 0;
        foreach ($this->cells as $cell) {
            $xNeighbour = $cell->position()->latitude()->value();
            $yNeighbour = $cell->position()->longitude()->value();

            foreach ($mesh as $offset) {
                if ($xNeighbour + $offset[0] === $x && $yNeighbour + $offset[1] === $y) {
                    $neighbours++;
                }
            }
        }

        return $neighbours;
    }

    /**
     * @param array $coordinate
     */
    public function addCell(array $coordinate)
    {
        $this->cells[] = CellFactory::createCell($coordinate);
    }

    /**
     * @param $key
     */
    public function removeCell($key)
    {
        unset($this->cells[$key]);
    }
}
