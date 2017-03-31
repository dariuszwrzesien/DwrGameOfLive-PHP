<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Rules;

use Dwr\GameOfLive\Entity\Layout;

class ConwayRules implements RuleInterface
{
//    private $cellsPositions = [];
//
//    public function __construct(Layout $layout)
//    {
//        foreach ($layout->getCells() as $cell) {
//            $this->cellsPositions = $cell->getPosition();
//        }
//    }

    /**
     * Any live cell with fewer than two live neighbours dies, as if caused by underpopulation.
     */
    public function underPopulation()
    {
//        foreach ($this->cellsPositions as $position) {
//            var_dump($position);
//        }
//
//        die(__FILE__ . ':'. __LINE__);
    }

    /**
     * Any live cell with two or three live neighbours lives on to the next generation.
     */
    public function stayLive()
    {

    }

    /**
     * Any live cell with more than three live neighbours dies, as if by overpopulation.
     */
    public function overPopulation()
    {

    }

    /**
     * Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction.
     */
    public function reproduction()
    {

    }
}