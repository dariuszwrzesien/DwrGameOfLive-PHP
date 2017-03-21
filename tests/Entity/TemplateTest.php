<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\ValueObject\Dimension;
use Dwr\GameOfLive\ValueObject\Length;
use Dwr\GameOfLive\ValueObject\Width;
use Dwr\GameOfLive\Exception\TemplateException;
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

    /**
     * @dataProvider validTemplateProvider
     * @param string $json
     */
//    public function testIfTemplateIsValid(string $json)
//    {
//        $template = new Template($json);
//        $this->assert();
//    }

    /**
     * @dataProvider invalidTemplateProvider
     * @param string $json
     *
     * @expectedException TemplateException
     * @expectedExceptionMessage Wrong json template data.
     */
    public function testIfTemplateHasInValidData(string $json)
    {
        new Template($json);
    }

    /**
     * @dataProvider invalidDataTemplateProvider
     * @param string $json
     *
     * @expectedException TemplateException
     * @expectedExceptionMessage Wrong json template structure.
     */
    public function testIfTemplateHasInValidStructure(string $json)
    {
        new Template($json);
    }

    public function validTemplateProvider()
    {
        return [
            ['{"board": {"length": 3,"width": 3},"layout": {"1": {"lat": 2,"lon": 2}}}']
        ];
    }

    public function invalidDataTemplateProvider()
    {
        return [
            ['{"board": {"length": 3,"width": 3},"layout": {"1": {"lat": 4,"lon": 5}}}']
        ];
    }

    public function invalidStructureTemplateProvider()
    {
        return [
            ['{"board": {"l": 3,"w": 3},"layout": {"1": {"lat": 4,"lon": 5}}}'],
            ['{"board": {"length": 3,"width": 3},"layout": {"1": {"latitude": 4,"long": 5}}}'],
            ['{"board": {"length": 3,"width": 3},"layout": {}'],
            ['{"board": {},"layout": {"1": {"latitude": 4,"long": 5}}}'],
        ];
    }
}
