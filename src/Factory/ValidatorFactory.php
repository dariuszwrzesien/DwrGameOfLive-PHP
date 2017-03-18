<?php

namespace Dwr\GameOfLive\Factory;

use Dwr\GameOfLive\Validator\TemplateValidator;

class ValidatorFactory
{
    /**
     * @param array $templateValidator
     * @return TemplateValidator
     */
    public static function createTemplateValidator(array $templateValidator) : TemplateValidator
    {
        return new TemplateValidator($templateValidator);
    }
}
