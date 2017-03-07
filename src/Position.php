<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

class Position
{
    private $coordinate;

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

    private function isAvailablePosition(int $latitude, int $longitude) : bool
    {
        return $latitude <= 0 && $longitude <= 0;
    }

    public function latitude() : int
    {
        return $this->coordinate['latitude'];
    }

    public function longitude() : int
    {
        return $this->coordinate['longitude'];
    }

    public function coordinate() : array
    {
        return $this->coordinate;
    }

    /**
     * @param position $object
     * @return bool
     */
    public function equals(Position $object) : bool
    {
        return $this->latitude() === $object->latitude() && $this->longitude() === $object->longitude();
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->latitude() . ", " . (string) $this->longitude();
    }
}