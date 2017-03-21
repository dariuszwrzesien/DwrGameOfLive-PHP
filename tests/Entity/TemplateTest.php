<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\ValueObject\Dimension;
use Dwr\GameOfLive\ValueObject\Length;
use Dwr\GameOfLive\ValueObject\Width;
use PHPUnit\Framework\TestCase;

class TemplateTest extends TestCase
{
    public function testIfTemplateIsInstanceOfValidateInterface()
    {
        $json = '{
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

        $this->assertInstanceOf('Dwr\\GameOfLive\\Entity\\ValidateInterface', new Template($json));
    }

    public function testIfTemplateCreatesLayout()
    {
        $json = '{
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

        $cell = array(
            'lat' => 2,
            'lon' => 2
        );

        $layout = new Layout([$cell]);
        $template = new Template($json);

        $this->assertEquals($layout, $template->layout());
    }

    public function testIfTemplateCreatesBoard()
    {
        $json = '{
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

        $board = new Board(
            new Dimension(
                new Length(3),
                new Width(3)
            )
        );

        $template = new Template($json);

        $this->assertEquals($board, $template->board());
    }
    
    public function testIfTemplateIsValid()
    {
        $json = '{
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

        $template = new Template($json);
        $this->assertTrue($template->isValid(json_decode($json, true)));
    }
}
