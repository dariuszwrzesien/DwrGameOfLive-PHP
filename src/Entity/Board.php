<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Policy\BoardPolicy;
use Dwr\GameOfLive\ValueObject\Dimension;
use LogicException;

class Board implements BoardPolicy
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
        if (! $this->isMinimumSize($dimension)) {
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
    public function dimension() : Dimension
    {
        return $this->dimension;
    }

    /**
     * @param Dimension $dimension
     * @return bool
     */
    public function isMinimumSize(Dimension $dimension) : bool
    {
        if ($dimension->length()->value() < self::MIN_LENGTH) {
            return false;
        }

        if ($dimension->width()->value() < self::MIN_WIDTH) {
            return false;
        }

        return true;
    }
}
