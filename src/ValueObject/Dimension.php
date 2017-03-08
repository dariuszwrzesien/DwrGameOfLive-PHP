<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

final class Dimension implements ValueObjectInterface
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
     * @param ValueObjectInterface $object
     * @return bool
     */
    public function equals(ValueObjectInterface $object) : bool
    {
        if (! $this->isDimension($object)) {
            throw new RuntimeException(
                "Passed value object has to be instance of Dimension"
            );
        }

        return $this->length === $object->length && $this->width === $object->width;
    }

    /**
     * @param ValueObjectInterface $object
     * @return bool
     */
    private function isDimension(ValueObjectInterface $object)
    {
        return $object instanceof Dimension;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->length . "&lowast;" . (string) $this->width;
    }
}
