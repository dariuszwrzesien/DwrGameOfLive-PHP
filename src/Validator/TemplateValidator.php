<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Validator;

use Dwr\GameOfLive\Entity\Board;
use Dwr\GameOfLive\Entity\Layout;
use Exception;

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
     * @param array $template
     * @throws Exception
     */
    public function __construct(array $template)
    {
        if (! $this->isStructureCorrect($template)) {
            throw new Exception('Wrong json template structure');
        }

        $this->board = $template['board'];
        $this->layout = $template['layout'];
        $this->validate();


    }

    private function isStructureCorrect(array $template)
    {
        if (array_key_exists('board', $template)
        && array_key_exists('layout', $template)
        ) {
            if (array_key_exists('length', $template['board'])
                && array_key_exists('width', $template['board'])) {
                foreach ($template['layout'] as $position) {
                    if (! array_key_exists('lat', $position)
                        || ! array_key_exists('lon', $position)) {
                            return false;
                    }
                }
                return true;
            }
        }
    }

    private function validate()
    {
//        if ($this->isCellLatitudeLesserOrEqualsBoardWidth() &&
//            $this->isCellLongitudeLesserOrEqualsBoardLength()) {
//            $this->isValid = true;
//        }
//
//        $this->isValid = false;
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
        return true;


        return $this->isValid;
    }
}
