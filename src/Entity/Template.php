<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Factory\BoardFactory;
use Dwr\GameOfLive\Factory\LayoutFactory;
use Dwr\GameOfLive\Validator\ValidatorInterface;

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
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * Template constructor.
     * @param string $jsonTemplate
     */
    public function __construct(string $jsonTemplate)
    {
        $template = json_decode($jsonTemplate, true);

        if (! $this->isValidTemplate($template)) {
            throw new Exception('Incorrect json template');
        }

        $this->board = BoardFactory::createBoard($template['board']);
        $this->layout = LayoutFactory::createLayout($template['layout']);
    }

    /**
     * @return Layout
     */
    public function layout() : Layout
    {
        return $this->layout;
    }

    /**
     * @return Board
     */
    public function board() : Board
    {
        return $this->board;
    }

    /**
     * @param ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function isValid(array $data): bool
    {
        return $this->validator->isValid();
    }
}
