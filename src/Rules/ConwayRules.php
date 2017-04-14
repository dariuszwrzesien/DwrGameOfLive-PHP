<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Rules;

use Dwr\GameOfLive\Entity\Cell;
use Dwr\GameOfLive\Entity\Layout;

final class ConwayRules implements RuleInterface
{
    /**
     * @var Layout
     */
    private $layout;

    /**
     * @param Layout $layout
     * @return Layout
     */
    public function checkRules(Layout $layout)
    {
        $this->layout = $layout;

        foreach ($layout->getCells() as $key => $cell) {
            $this->underPopulation($key, $cell);
        }

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
            $this->layout->removeCell($cellIndex);
        }
    }

    /**
     * Any live cell with two or three live neighbours lives on to the next generation.
     */
    private function stayLive()
    {

    }

    /**
     * Any live cell with more than three live neighbours dies, as if by overpopulation.
     */
    private function overPopulation()
    {

    }

    /**
     * Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.
     */
    private function reproduction()
    {

    }

    
}
