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
     *
     * @param int $howManySteps
     */
    public function run(int $howManySteps = 1)
    {
        while ($howManySteps > 0) {
            $this->updateLayout($this->rule, $this->layout);
            $howManySteps--;
        }
    }

    /**
     * @param RuleInterface $rule
     * @param Layout $layout
     *
     * @return Layout
     */
    private function updateLayout(RuleInterface $rule, Layout $layout) : Layout
    {
        return $rule->checkRules($layout);
    }

    /**
     * @return Layout
     */
    public function getLayout() : Layout
    {
        return $this->layout;
    }
}
