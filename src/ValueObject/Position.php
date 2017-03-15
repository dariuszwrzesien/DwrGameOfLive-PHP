<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

final class Position implements ValueObjectInterface
{
    /**
     * @var array
     */
    private $coordinate;

    /**
     * Position constructor.
     * @param Latitude $latitude
     * @param Longitude $longitude
     */
    public function __construct(Latitude $latitude, Longitude $longitude)
    {
        $this->coordinate = [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    }

    /**
     * @return Latitude
     */
    public function latitude() : Latitude
    {
        return $this->coordinate['latitude'];
    }

    /**
     * @return Longitude
     */
    public function longitude() : Longitude
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
        if ($object instanceof Position) {
            return $this->latitude()->equals($object->latitude()) && $this->longitude()->equals($object->longitude());
        }
        return false;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s, %s', $this->latitude(), $this->longitude());
    }
}
