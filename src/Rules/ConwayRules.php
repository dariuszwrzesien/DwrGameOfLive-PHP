<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Rules;

use Dwr\GameOfLive\Entity\Cell;
use Dwr\GameOfLive\Entity\Layout;

/**
 * Class ConwayRules
 *
 * 1. Any live cell with fewer than two live neighbours dies, as if caused by underpopulation. [underPopulation]
 * 2. Any live cell with more than three live neighbours dies, as if by overpopulation. [overpopulation]
 * 3. Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction. [reproduction]
 * 4. Any live cell with two or three live neighbours lives on to the next generation. [do not have to be implemented]
 *
 * @package Dwr\GameOfLive\Rules
 */
final class ConwayRules implements RuleInterface
{
    /**
     * @var Layout
     */
    private $layout;

    /**
     * @var array
     */
    private $operations = [];

    /**
     * @param Layout $layout
     * @return Layout
     */
    public function checkRules(Layout $layout)
    {
        $this->layout = $layout;

        foreach ($layout->getCells() as $key => $cell) {
            $this->underPopulation($key, $cell);
            $this->overPopulation($key, $cell);
        }

        $this->reproduction();
        $this->apply();

        return $this->layout;
    }

    /**
     * Any live cell with fewer than two live neighbours dies, as if caused by underpopulation.
     *
     * @param int $cellIndex
     * @param Cell $cell
     */
    private function underPopulation(int $cellIndex, Cell $cell)
    {
        if ($this->layout->countNeighbours($cell) < 2) {
            $this->operations[] = ['removeCell' => $cellIndex];
        }
    }

    /**
     * Any live cell with more than three live neighbours dies, as if by overpopulation.
     *
     * @param int $cellIndex
     * @param Cell $cell
     */
    private function overPopulation(int $cellIndex, Cell $cell)
    {
        if ($this->layout->countNeighbours($cell) > 3) {
            $this->operations[] = ['removeCell' => $cellIndex];
        }
    }

    /**
     * Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.
     */
    private function reproduction()
    {
//        if ($this->layout->countNeighboursOfCellZone($cell) === 3) {
//            $this->action[] = ['addCell' => $coordinate];
//        }
    }

    /**
     * Applies changes to layout
     */
    private function apply()
    {
        foreach ($this->operations as $actions) {
            foreach ($actions as $action => $item) {
                $this->layout->$action($item);
            }
        }
    }
}
