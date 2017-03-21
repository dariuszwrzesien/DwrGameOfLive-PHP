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

    /**
     * @param string $json
     * @param int $length
     * @param int $width
     *
     * @dataProvider validTemplateProvider
     */
    public function testIfTemplateIsValid(string $json, int $length, int $width)
    {
        $template = new Template($json);
        $this->assertSame($length, $template->board()->dimension()->length()->value());
        $this->assertSame($width, $template->board()->dimension()->width()->value());
    }

    /**
     * @dataProvider invalidDataTemplateProvided
     * @param string $json
     *
     * @expectedException \Dwr\GameOfLive\Exception\BadTemplateDataException
     * @expectedExceptionMessage Wrong json template data.
     */
    public function testIfTemplateHasInvalidData(string $json)
    {
        new Template($json);
    }

    /**
     * @dataProvider invalidStructureTemplateProvided
     * @param string $json
     *
     * @expectedException \Dwr\GameOfLive\Exception\BadTemplateStructureException
     * @expectedExceptionMessage Wrong json template structure.
     */
    public function testIfTemplateHasInvalidStructure(string $json)
    {
        new Template($json);
    }

    public function validTemplateProvider()
    {
        return [
            ['{"board": {"length": 3,"width": 3},"layout": {"1": {"lat": 2,"lon": 2}}}', 3, 3],
            ['{"board": {"length": 10,"width": 15},"layout": {"1": {"lat": 14,"lon": 9}}}', 10, 15]
        ];
    }

    public function invalidDataTemplateProvided()
    {
        return [
            ['{"board": {"length": 3,"width": 3},"layout": {"1": {"lat": 4,"lon": 5}}}']
        ];
    }

    public function invalidStructureTemplateProvided()
    {
        return [
            ['{"board": {"l": 3,"w": 3},"layout": {"1": {"lat": 2,"lon": 2}}}'],
            ['{"board": {"length": 3,"width": 3},"layout": {"1": {"latitude": 1,"long": 1}}}'],
            ['{"board": {"length": 3,"width": 3},"layout": {"1":{}, "2": {"latitude": 1,"long": 1}}}'],
            ['{"board": {},"layout": {"1": {"latitude": 4,"long": 5}}}'],
        ];
    }
}
