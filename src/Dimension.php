<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

final class Dimension
{
    /**
     * @var int
     */
    private $length;

    /**
     * @var int
     */
    private $width;

    /**
     * Dimension constructor.
     * @param int $length
     * @param int $width
     */
    public function __construct(int $length, int $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function length() : int
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function width() : int
    {
        return $this->width;
    }

    /**
     * @param Dimension $object
     * @return bool
     */
    public function equals(Dimension $object) : bool
    {
        return $this->length === $object->length && $this->width === $object->width;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->length . "&lowast;" . (string) $this->width;
    }
}
