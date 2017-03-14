<?php

namespace Dwr\GameOfLive\Factory;

use Dwr\GameOfLive\Board;
use Dwr\GameOfLive\ValueObject\Dimension;
use Dwr\GameOfLive\ValueObject\Length;

class BoardFactory
{
    /**
     * @param array $data
     * @return Board
     */
    public static function createBoard(array $data)
    {
        $length = new Length($data['length']);
        $width = new Width($data['width']);
        $dimension = new Dimension($length, $width);

        return new Board($dimension);
    }
}
