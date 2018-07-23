<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\Number;

class FloatValue
{
    /**
     * @var float
     */
    private $value;

    public function __construct(float $float = null)
    {
        $this->value = (float) $float;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}