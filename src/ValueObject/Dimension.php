<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

final class Dimension implements ValueObjectInterface
{
    /**
     * @var Length
     */
    private $length;

    /**
     * @var Width
     */
    private $width;

    /**
     * Dimension constructor.
     * @param Length $length
     * @param Width $width
     */
    public function __construct(Length $length, Width $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    /**
     * @return Length
     */
    public function length() : Length
    {
        return $this->length;
    }

    /**
     * @return Width
     */
    public function width() : Width
    {
        return $this->width;
    }

    /**
     * @param ValueObjectInterface $object
     * @return bool
     */
    public function equals(ValueObjectInterface $object) : bool
    {
        if ($object instanceof Dimension) {
            return $this->length->equals($object->length) && $this->width->equals($object->width);
        }

        return false;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s&lowast;%s', $this->length->__toString(), $this->width->__toString());
    }
}
