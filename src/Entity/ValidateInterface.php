<?php

namespace Dwr\GameOfLive\Entity;

use Dwr\GameOfLive\Validator\ValidatorInterface;

interface ValidateInterface
{
    /**
     * @param ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator);
}
