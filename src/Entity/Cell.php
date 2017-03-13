<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\ValueObject\Position;

class Cell
{
    /**
     * @var Position
     */
    private $position;

    /**
     * @var bool
     */
    private $isLive;

    /**
     * Cell constructor.
     * @param Position $position
     */
    public function __construct(Position $position)
    {
        $this->position = $position;
        $this->isLive = true;
    }

    /**
     * @return Position
     */
    public function position() : Position
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function isLive() : bool
    {
        return $this->isLive;
    }
}
