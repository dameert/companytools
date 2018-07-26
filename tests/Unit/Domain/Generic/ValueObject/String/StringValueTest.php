<?php

declare(strict_types=1);

namespace Beeriously\Tests\Unit\Domain\Generic\ValueObject\String;

use CompanyTools\Domain\Generic\ValueObject\String\StringValue;
use PHPUnit\Framework\TestCase;

class StringValueTest extends TestCase
{
    public function testEmpty()
    {
        $s = new StringValue();
        $this->assertSame('', $s->getValue());

        $s = new StringValue(null);
        $this->assertSame('', $s->getValue());

        $s = new StringValue('');
        $this->assertSame('', $s->getValue());
    }

    public function testValue()
    {
        $s = new StringValue('CompanyTools');
        $this->assertSame('CompanyTools', $s->getValue());
    }

    public function testToString()
    {
        $s = new StringValue('CompanyTools');
        $this->assertSame('CompanyTools', (string) $s);
    }
}
