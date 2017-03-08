<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\ValueObject;

class Natural
{
    /**
     * @var int
     */
    protected $value;

    /**
     * Returns a new Latitude object
     *
     * @param $value
     * @throws InvalidNativeArgumentException
     */
    public function __construct(int $value)
    {
        $options = array(
            'options' => array(
                'min_range' => 0
            )
        );
        $value = filter_var($value, FILTER_VALIDATE_INT, $options);
        if (false === $value) {
            throw new InvalidNativeArgumentException($value, array('int (>=0)'));
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value() : int
    {
        return $this->value;
    }
}
