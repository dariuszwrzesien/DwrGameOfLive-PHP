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
     * @return array
     */
    public function getNeighbours(Cell $cell)
    {
        $latitude = $cell->position()->latitude()->value();
        $longitude = $cell->position()->longitude()->value();

        $neighbours = [];
        foreach ($this->cells as $cell) {
            $neighbourLatitude = $cell->position()->latitude()->value();
            $neighbourLongitude = $cell->position()->longitude()->value();

            if ($neighbourLatitude === ($latitude - 1) && $neighbourLongitude === ($longitude - 1)) {
                $neighbours[] = $cell;
            }

            if ($neighbourLatitude === ($latitude - 1) && $neighbourLongitude === $longitude) {
                $neighbours[] = $cell;
            }

            if ($neighbourLatitude === ($latitude - 1) && $neighbourLongitude === ($longitude + 1)) {
                $neighbours[] = $cell;
            }

            if ($neighbourLatitude === $latitude && $neighbourLongitude === ($longitude - 1)) {
                $neighbours[] = $cell;
            }

            if ($neighbourLatitude === $latitude && $neighbourLongitude === ($longitude + 1)) {
                $neighbours[] = $cell;
            }

            if ($neighbourLatitude === ($latitude + 1) && $neighbourLongitude === ($longitude - 1)) {
                $neighbours[] = $cell;
            }

            if ($neighbourLatitude === ($latitude + 1) && $neighbourLongitude === $longitude) {
                $neighbours[] = $cell;
            }

            if ($neighbourLatitude === ($latitude + 1) && $neighbourLongitude === ($longitude + 1)) {
                $neighbours[] = $cell;
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
