<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

use Dwr\GameOfLive\ValueObject\Position;

class Cell
{
    /**
     * @var Position
     */
    private $position;

    /**
     * Cell constructor.
     * @param Position $position
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    /**
     * @return Position
     */
    public function position() : Position
    {
        return $this->position();
    }
}
