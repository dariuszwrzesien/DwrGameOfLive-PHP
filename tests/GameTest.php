<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

use Dwr\GameOfLive\Entity\Template;
use Dwr\GameOfLive\Rules\ConwayRules;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     *
     * @dataProvider templateProvider
     *
     * @param string $jsonTemplate Template in json
     * @param int    $runs         How many steps game should take
     * @param int    $expected     Expected number of cells in layout
     */
    public function testIfRunOnGivenTemplateReturnsExpectedResult(string $jsonTemplate, int $runs, int $expected)
    {
        $template = new Template($jsonTemplate);
        $game = new Game($template, new ConwayRules());
        $game->run($runs);

        $this->assertEquals($expected, count($game->getLayout()->getCells()));
    }

    /**
     * @return array
     */
    public function templateProvider()
    {
        return [
            ['{
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
            }', 1, 0],
            ['{
                "board": {
                    "length": 5,
                    "width": 5
                },
                "layout": {
                  "1": {
                    "lat": 2,
                    "lon": 4
                  },
                  "2": {
                    "lat": 2,
                    "lon": 2
                  },
                  "3": {
                    "lat": 4,
                    "lon": 4
                  },
                  "4": {
                    "lat": 4,
                    "lon": 2
                  }
                }
            }', 1, 0],
            ['{
                "board": {
                    "length": 5,
                    "width": 5
                },
                "layout": {
                  "1": {
                    "lat": 2,
                    "lon": 3
                  },
                  "2": {
                    "lat": 3,
                    "lon": 4
                  },
                  "3": {
                    "lat": 3,
                    "lon": 2
                  },
                  "4": {
                    "lat": 4,
                    "lon": 3
                  }
                }
            }', 1, 4]
        ];
    }
}
