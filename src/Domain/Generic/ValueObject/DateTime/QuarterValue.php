<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\DateTime;

class QuarterValue
{
    /**
     * @var YearValue
     */
    private $yearValue;

    /**
     * @var MonthValue
     */
    private $monthValue;

    /**
     * @var int
     */
    private $quarter;

    public function __construct(YearValue $yearValue, MonthValue $monthValue)
    {
        $this->yearValue = $yearValue;
        $this->monthValue = $monthValue;
        $this->quarter = ceil($monthValue->getValue() / 3);
    }

    public static function fromDayValue(DayValue $day)
    {
        return new self($day->getYearValue(), $day->getMonthValue());
    }

    public function getYearValue(): YearValue
    {
        return $this->yearValue;
    }

    public function getMonthValue(): MonthValue
    {
        return $this->monthValue;
    }

    public function getQuarter(): int
    {
        return $this->quarter;
    }

    public function getValue(): DayValue
    {
        return DayValue::fromQuarterValue($this);
    }

    public function __toString(): string
    {
        return $this->getYearValue() . ' Q' . $this->value;
    }

}