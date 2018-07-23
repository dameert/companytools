<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\DateTime;

class MonthValue
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $month)
    {
        if ($month < 1 && $month > 12) {
            throw new MonthException();
        }
        $this->value = $month;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }
}