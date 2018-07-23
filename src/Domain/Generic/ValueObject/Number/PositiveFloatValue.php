<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\Number;

class PositiveFloatValue extends FloatValue
{
    public function __construct(float $float = null)
    {
        parent::__construct($float);
        if ($this->getValue() < 0) {
            throw new PositiveFloatException();
        }
    }
}