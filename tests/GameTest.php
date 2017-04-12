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

        $this->assertEquals(0, count($game->getLayout()->getCells()));
    }
}
