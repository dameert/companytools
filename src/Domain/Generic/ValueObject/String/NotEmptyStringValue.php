<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Generic\ValueObject\String;

class NotEmptyStringValue extends StringValue
{
    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new NotEmptyStringException();
        }
        parent::__construct($value);
    }
}