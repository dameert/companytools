<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\String;

class StringValue
{
    /**
     * @var string
     */
    protected $value;

    public function __construct(string $string = null)
    {
        $this->value = (string) $string;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}