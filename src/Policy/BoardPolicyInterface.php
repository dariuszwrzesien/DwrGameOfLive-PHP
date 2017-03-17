<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Policy;

use Dwr\GameOfLive\ValueObject\Dimension;

interface BoardPolicyInterface
{
    /**
     * Board constructor.
     * @param Dimension $dimension
     */
    public function __construct(Dimension $dimension);

    /**
     * @param Dimension $dimension
     * @return bool
     */
    public function isMinimumSize(Dimension $dimension) : bool;
}
