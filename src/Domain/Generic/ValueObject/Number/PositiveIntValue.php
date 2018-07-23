<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\Number;

class PositiveIntValue extends IntValue
{
    public function __construct(int $int = null)
    {
        parent::__construct($int);
        if ($this->getValue() < 0) {
            throw new PositiveIntException();
        }
    }
}