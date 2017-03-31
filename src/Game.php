<?php
declare(strict_types=1);

namespace Dwr\GameOfLive;

use Dwr\GameOfLive\Entity\Layout;
use Dwr\GameOfLive\Entity\Template;
use Dwr\GameOfLive\Rules\RuleInterface;

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
     * @var RuleInterface
     */
    private $rule;


    /**
     * Game constructor.
     * @param Template $template
     * @param RuleInterface $rule
     */
    public function __construct(Template $template, RuleInterface $rule)
    {
        $this->rule = $rule;
        $this->board = $template->board();
        $this->layout = $template->layout();
    }

    /**
     * Runs the game
     */
    public function run()
    {
        foreach ($this->rule as $rule) {
            $this->updateLayout($rule);
        }
    }

    /**
     * @return Layout
     */
    public function getLayout() : Layout
    {
        return $this->layout;
    }
}
