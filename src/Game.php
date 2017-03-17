<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

class Game
{
    /**
     * @var Board
     */
    private $board;

    /**
     * @var Layout
     */
    private $layout;

    /**
     * @var array
     */
    private $rules;

    /**
     * Game constructor.
     * @param Template $template
     * @param array $rules
     */
    public function __construct(Template $template, array $rules)
    {
        $this->board = $template->board();
        $this->layout = $template->layout();
        $this->rules = $this->rules;
    }

    public function run()
    {
        foreach ($this->rules as $rule) {
            $this->updateLayout($rule);
        }
    }
}
