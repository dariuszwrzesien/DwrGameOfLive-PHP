<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Factory;

use Dwr\GameOfLive\Entity\Board;
use Dwr\GameOfLive\ValueObject\Length;
use Dwr\GameOfLive\ValueObject\Width;
use Dwr\GameOfLive\ValueObject\Dimension;
use PHPUnit\Framework\TestCase;

class BoardFactoryTest extends TestCase
{
    public function testBoardCreation()
    {
        $data = [
            'length' => 10,
            'width' => 20,
        ];

        $length = new Length(10);
        $width = new Width(20);
        $dimension = new Dimension($length, $width);

        $this->assertEquals(new Board($dimension), BoardFactory::createBoard($data));
    }
}
