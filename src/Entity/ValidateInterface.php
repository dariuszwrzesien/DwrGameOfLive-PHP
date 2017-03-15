<?php

namespace Dwr\GameOfLive\Entity;

interface ValidateInterface
{
    public function isValid(string $json) : bool;
}