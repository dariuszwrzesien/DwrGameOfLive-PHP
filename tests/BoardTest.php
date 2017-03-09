<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

use Dwr\GameOfLive\ValueObject\Length;
use Dwr\GameOfLive\ValueObject\Width;
use Dwr\GameOfLive\ValueObject\Dimension;
use LogicException;
use PHPUnit\Framework\TestCase;

class BoardTest extends TestCase
{

    public function testBoardDimension()
    {
        $length = new Length(3);
        $width = new Width(4);

        $dimension = new Dimension($length, $width);
        $board = new Board($dimension);

        $this->assertInstanceOf(Dimension::class, $board->dimension());
        $this->assertEquals($dimension, $board->dimension());
        $this->assertTrue($dimension->equals($board->dimension()));
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Minimum length: 3. Minimum width: 3.
     */
    public function testIfMinimumBoardSizeThrowsException()
    {
        $length = new Length(2);
        $width = new Width(2);

        $dimension = new Dimension($length, $width);
        new Board($dimension);
    }
}
