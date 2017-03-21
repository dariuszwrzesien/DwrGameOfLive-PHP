<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Exception\TemplateException;
use Dwr\GameOfLive\Factory\BoardFactory;
use Dwr\GameOfLive\Factory\LayoutFactory;
use Dwr\GameOfLive\Factory\ValidatorFactory;
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
     * @throws TemplateException
     */
    public function __construct(string $jsonTemplate)
    {
        $template = json_decode($jsonTemplate, true);

        if (! $this->isValid($template)) {
            throw new TemplateException('Wrong json template data.');
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
     * @param array $array
     * @return bool
     */
    private function isValid(array $array) : bool
    {
        $this->setValidator(ValidatorFactory::createTemplateValidator($array));
        return $this->validator->isValid();
    }
}
