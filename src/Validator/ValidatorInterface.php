<?php
declare(strict_types=1);

namespace Dwr\GameOfLive\Validator;

interface ValidatorInterface
{
    public function isValid() : bool;
}
