<?php
/**
 * Created by PhpStorm.
 * User: darek
 * Date: 14.03.17
 * Time: 00:53
 */

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Factory\CellFactory;

class Layout
{
    private $layout;

    public function __construct(array $layout)
    {
        foreach ($layout as $key => $item) {
            $this->layout[] = CellFactory::createCell($item);
        }
    }
}
