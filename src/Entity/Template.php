<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Factory\BoardFactory;

class Template implements ValidateInterface
{

    private $layout;

    private $board;
    
    public function __construct(string $jsonTemplate)
    {

        $template = json_decode($jsonTemplate, true);
        $this->validate($template);

        $this->board = BoardFactory::createBoard($template['board']);
        $this->layout = LayoutFactory::createLayout($template['layout']);
    }

    public function isValid(): bool
    {
        return true;
    }
}
