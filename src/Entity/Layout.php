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
     */
    public function getNeighbours(Cell $cell)
    {
        $neighbours = [];
        foreach ($this->cells as $cell) {

            //TODO: check neighbourhood for cells

            $neighbours[] = $cell;
        }

    }

    /**
     * @param $key
     */
    public function removeCell($key)
    {
        unset($this->cells[$key]);
    }
}
