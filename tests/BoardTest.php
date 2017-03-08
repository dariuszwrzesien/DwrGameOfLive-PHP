<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

use LogicException;
use Dwr\GameOfLive\ValueObject\Dimension;

class BoardTest extends \PHPUnit_Framework_TestCase
{

    public function testBoardDimension()
    {
        $dimension = new Dimension(3, 4);
        $board = new Board($dimension);

        $this->assertInstanceOf(Dimension::class, $board->dimension());
        $this->assertEquals($dimension, $board->dimension());
        $this->assertTrue($dimension->equals($board->dimension()));
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Minimum length: 3. Minimum width: 3.
     */
    public function testIfMinimumBoardDimensionThrowsException()
    {
        $dimension = new Dimension(2, 2);
        new Board($dimension);
    }
}
