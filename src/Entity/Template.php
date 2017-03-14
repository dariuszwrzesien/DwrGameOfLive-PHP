<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;


use Dwr\GameOfLive\Factory\BoardFactory;
use Dwr\GameOfLive\Factory\LayoutFactory;

class Template implements ValidateInterface
{
    /**
     * @var Layout
     */
    private $layout;

    /**
     * @var Board
     */
    private $board;

    /**
     * Template constructor.
     * @param string $jsonTemplate
     */
    public function __construct(string $jsonTemplate)
    {
        $template = json_decode($jsonTemplate, true);
        $this->validate($template);

        $this->board = BoardFactory::createBoard($template['board']);
        $this->layout = LayoutFactory::createLayout($template['layout']);
    }

    /**
     * @return Layout
     */
    public function layout() : Layout
    {
        return $this->layout();
    }

    /**
     * @return Board
     */
    public function board() : Board
    {
        return $this->board();
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        //Implemenntacja walidacji
        return true;
    }
}
