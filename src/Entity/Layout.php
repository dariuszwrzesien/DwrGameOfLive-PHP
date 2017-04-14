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
        foreach ($layout as $item) {
            $this->cells[] = CellFactory::createCell($item);
        }
    }

    /**
     * @return array
     */
    public function getCells() : array
    {
        return $this->cells;
    }

    /**
     * @param Cell $cell
     * @return int
     */
    public function countNeighbours(Cell $cell)
    {
        $x = $cell->position()->latitude()->value();
        $y = $cell->position()->longitude()->value();

        $neighbourMesh = [
            [-1, -1], [-1, 0], [-1, 1],
            [ 0, -1],          [ 0, 1],
            [ 1, -1], [ 1, 0], [ 1, 1]
        ];

        $neighbours = 0;
        foreach ($this->cells as $cell) {

            $xNeighbour = $cell->position()->latitude()->value();
            $yNeighbour = $cell->position()->longitude()->value();

            foreach ($neighbourMesh as $offset) {
                if ($xNeighbour + $offset[0] === $x && $yNeighbour + $offset[1] === $y) {
                    $neighbours++;
                }
            }
        }

        return $neighbours;
    }

    /**
     * @param $key
     */
    public function removeCell($key)
    {
        unset($this->cells[$key]);
    }
}
