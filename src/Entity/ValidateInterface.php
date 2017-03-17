<?php

namespace Dwr\GameOfLive\Entity;

interface ValidateInterface
{
    /**
     * @param ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator);

    /**
     * @param array $data
     * @return bool
     */
    public function isValid(array $data) : bool;
}
