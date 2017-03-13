<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

class Game
{
    /**
     * @var Template
     */
    private $template;

    /**
     * Game constructor.
     * @param Template $template
     */
    public function __construct(Template $template)
    {

        $this->template = $template;
    }



}
