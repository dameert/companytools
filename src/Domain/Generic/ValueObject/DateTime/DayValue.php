<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\DateTime;

class DayValue
{
    /**
     * @var \DateTime
     */
    protected $value;

    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $value): DayValue
    {
        return new self(new \DateTime($value));
    }

    public static function fromQuarterValue(QuarterValue $quarterValue): DayValue
    {
        $day = '1-'.$quarterValue->getMonthValue().'-'.$quarterValue->getYearValue();
        return new self(new \DateTime($day));
    }

    public function getValue(): \DateTime
    {
        return $this->value;
    }

    public function getMonthValue(): MonthValue
    {
        return new MonthValue((int) $this->value->format('n'));
    }

    public function getYearValue(): YearValue
    {
        return new YearValue((int) $this->value->format('Y'));
    }

    public function __toString()
    {
        return $this->value->format('d-m-Y');
    }
}