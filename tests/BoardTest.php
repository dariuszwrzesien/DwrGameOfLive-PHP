<?php

namespace Dwr\GameOfLive;

class ExampleTest extends \PHPUnit_Framework_TestCase
{

    public function testBoardDimension()
    {
        $dimension = 3;
        $board = new Board($dimension);
        $this->assertEquals($dimension, $board->getDimension);
    }

}
