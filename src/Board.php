<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

use LogicException;

class Board
{
    const MIN_LENGTH = 3;
    const MIN_WIDTH = 3;

    /**
     * @var Dimension
     */
    private $dimension;

    /**
     * Board constructor.
     * @param Dimension $dimension
     */
    public function __construct(Dimension $dimension)
    {
        if (! $this->isMinDimension($dimension)) {
            throw new LogicException(
                "Minimum length: " . self::MIN_LENGTH .
                ". Minimum width: " . self::MIN_WIDTH . "."
            );
        }
        $this->dimension = $dimension;
    }

    /**
     * @return Dimension
     */
    public function dimension():Dimension
    {
        return $this->dimension;
    }

    /**
     * @param Dimension $dimension
     * @return bool
     */
    private function isMinDimension(Dimension $dimension)
    {
        if ($dimension->length() < self::MIN_LENGTH) {
            return false;
        }

        if ($dimension->width() < self::MIN_WIDTH) {
            return false;
        }

        return true;
    }
}
