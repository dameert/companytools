<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\DateTime;

use CompanyTools\Domain\Generic\ValueObject\Number\PositiveIntValue;

class YearValue extends PositiveIntValue
{
    public static function fromDateTime(\DateTime $dateTime): YearValue
    {
        return new self((int) $dateTime->format('Y'));
    }
}