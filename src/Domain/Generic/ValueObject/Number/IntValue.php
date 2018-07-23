<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\Number;

class IntValue
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $int = null)
    {
        $this->value = (int) $int;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}