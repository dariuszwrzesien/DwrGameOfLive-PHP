<?php

namespace Dwr\GameOfLive\Factory;

use Dwr\GameOfLive\Entity\Layout;

class LayoutFactory
{
    /**
     * @param array $data
     * @return Layout
     */
    public static function createLayout(array $data)
    {
        return new Layout($data);
    }
}
