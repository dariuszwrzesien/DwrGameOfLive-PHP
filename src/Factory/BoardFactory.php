<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Factory;

use Dwr\GameOfLive\Entity\Board;
use Dwr\GameOfLive\ValueObject\Dimension;
use Dwr\GameOfLive\ValueObject\Length;
use Dwr\GameOfLive\ValueObject\Width;

class BoardFactory
{
    /**
     * @param array $data
     * @return Board
     */
    public static function createBoard(array $data) : Board
    {
        $length = new Length($data['length']);
        $width = new Width($data['width']);
        $dimension = new Dimension($length, $width);

        return new Board($dimension);
    }
}
