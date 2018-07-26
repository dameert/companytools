<?php

declare(strict_types=1);

namespace Beeriously\Tests\Unit\Domain\Generic\ValueObject\String;

use CompanyTools\Domain\Generic\ValueObject\String\NotEmptyStringException;
use CompanyTools\Domain\Generic\ValueObject\String\NotEmptyStringValue;
use PHPUnit\Framework\TestCase;

class NotEmptyStringValueTest extends TestCase
{
    public function testEmptyFails()
    {
        $this->expectException(NotEmptyStringException::class);
        new NotEmptyStringValue('');
    }

    public function testValue()
    {
        $s = new NotEmptyStringValue('CompanyTools');
        $this->assertSame('CompanyTools', $s->getValue());
    }

    public function testToString()
    {
        $s = new NotEmptyStringValue('CompanyTools');
        $this->assertSame('CompanyTools', (string) $s);
    }
}