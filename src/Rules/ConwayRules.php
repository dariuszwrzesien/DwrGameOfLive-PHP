<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Rules;

use Dwr\GameOfLive\Entity\Layout;

final class ConwayRules implements RuleInterface
{
    /**
     * @var Layout
     */
    private $layout;

    /**
     * @param Layout $layout
     */
    public function checkRules(Layout $layout)
    {
        $this->layout = $layout;

        $cellsPositions = [];
        foreach ($layout->getCells() as $cell) {
            $cellsPositions[] = $cell->getPosition();
        }

        $this->underPopulation($cellsPositions);
    }

    /**
     * Any live cell with fewer than two live neighbours dies, as if caused by underpopulation.
     *
     * @param array $cellsPositions
     */
    private function underPopulation(array $cellsPositions)
    {
        foreach ($cellsPositions as $position) {
            var_dump($position);
        }

        die(__FILE__ . ':'. __LINE__);
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