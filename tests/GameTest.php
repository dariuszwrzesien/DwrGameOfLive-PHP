<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

use Dwr\GameOfLive\Entity\Template;
use Dwr\GameOfLive\Rules\ConwayRules;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testIfOneRunOnDotTemplateReturnsEmptyLayoutBecauseOfUnderPopulation()
    {
        $jsonTemplate = '{
            "board": {
                "length": 3,
                "width": 3
            },
            "layout": {
              "1": {
                "lat": 2,
                "lon": 2
              }
            }
        }';

        $template = new Template($jsonTemplate);
        $game = new Game($template, new ConwayRules());
        $game->run(1);

        foreach ($game->getLayout()->getCells() as $cell) {
            var_dump($cell->position()->latitude()->value());
            var_dump($cell->position()->longitude()->value());
        }

        die(__FILE__ . ':'. __LINE__);


    }
}
