<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

interface ValueObjectInterface
{
    /**
     * @param ValueObjectInterface $object
     * @return bool
     */
    public function equals(ValueObjectInterface $object) : bool;

    /**
     * @return string
     */
    public function __toString() : string;
}
