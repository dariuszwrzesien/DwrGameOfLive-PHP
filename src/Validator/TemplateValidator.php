<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Validator;

use Dwr\GameOfLive\Entity\Board;
use Dwr\GameOfLive\Entity\Layout;
use Dwr\GameOfLive\Entity\Template;

class TemplateValidator implements ValidatorInterface
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
     * @var bool
     */
    private $isValid = false;

    /**
     * TemplateValidator constructor.
     * @param Template $template
     */
    public function __construct(array $template)
    {
//        $this->checkStructure($template);


        $this->board = $template->board();
        $this->layout = $template->layout();
        $this->validate();

    }

    private function validate()
    {
        if ($this->isCellLatitudeLesserOrEqualsBoardWidth() &&
            $this->isCellLongitudeLesserOrEqualsBoardLength()) {
            $this->isValid = true;
        }

        $this->isValid = false;
    }

    /**
     * @return bool
     */
    private function isCellLatitudeLesserOrEqualsBoardWidth()
    {
        $width = $this->board->dimension()->width()->value();

        foreach ($this->layout->getCells() as $cell) {
            if ($cell->position()->latitude()->value() >= $width) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    private function isCellLongitudeLesserOrEqualsBoardLength()
    {
        $length = $this->board->dimension()->length()->value();

        foreach ($this->layout->getCells() as $cell) {
            if ($cell->position()->longitude()->value() >= $length) {
                return false;
            }
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isValid() : bool
    {
        return $this->isValid;
    }
}
