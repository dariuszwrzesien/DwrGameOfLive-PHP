<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Validator;

use Dwr\GameOfLive\Entity\Board;
use Dwr\GameOfLive\Entity\Layout;
use Dwr\GameOfLive\Exception\TemplateException;

final class TemplateValidator implements ValidatorInterface
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
    private $isValid;

    /**
     * TemplateValidator constructor.
     * @param array $template
     * @throws TemplateException
     */
    public function __construct(array $template)
    {
        if (! $this->isStructureCorrect($template)) {
            throw new TemplateException('Wrong json template structure.');
        }

        $this->board = $template['board'];
        $this->layout = $template['layout'];
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

    /**
     * @return bool
     */
    private function isCellLatitudeLesserOrEqualsBoardWidth()
    {
        $width = $this->board['width'];

        foreach ($this->layout as $cell) {
            if ($cell['lat'] >= $width) {

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
        $length = $this->board['length'];

        foreach ($this->layout as $cell) {
            if ($cell['lon'] >= $length) {

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
        if ($this->isCellLatitudeLesserOrEqualsBoardWidth() &&
            $this->isCellLongitudeLesserOrEqualsBoardLength()) {

            return true;
        }

        return false;
    }
}
