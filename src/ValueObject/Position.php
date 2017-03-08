<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

use LogicException;
use RuntimeException;

final class Position implements ValueObjectInterface
{
    /**
     * @var array
     */
    private $coordinate;

    /**
     * Position constructor.
     * @param int $latitude
     * @param int $longitude
     *
     * @throws LogicException
     */
    public function __construct(int $latitude, int $longitude)
    {
        if ($this->isAvailablePosition($latitude, $longitude)) {
            throw new LogicException(
                "Latitude and longitude cannot be less than 0."
            );
        }
        $this->coordinate = [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    }

    /**
     * @param int $latitude
     * @param int $longitude
     * @return bool
     */
    private function isAvailablePosition(int $latitude, int $longitude) : bool
    {
        return $latitude <= 0 && $longitude <= 0;
    }

    /**
     * @return int
     */
    public function latitude() : int
    {
        return $this->coordinate['latitude'];
    }

    /**
     * @return int
     */
    public function longitude() : int
    {
        return $this->coordinate['longitude'];
    }

    /**
     * @return array
     */
    public function coordinate() : array
    {
        return $this->coordinate;
    }

    /**
     * @param ValueObjectInterface $object
     * @return bool
     */
    public function equals(ValueObjectInterface $object) : bool
    {
        if (! $this->isPosition($object)) {
            throw new RuntimeException(
                "Passed value object has to be instance of Position"
            );
        }

        return $this->latitude() === $object->latitude() && $this->longitude() === $object->longitude();
    }

    private function isPosition(ValueObjectInterface $object)
    {
        return $object instanceof Position;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->latitude() . ", " . (string) $this->longitude();
    }
}
