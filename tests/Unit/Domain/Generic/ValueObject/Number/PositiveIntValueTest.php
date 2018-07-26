<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\Number;

use CompanyTools\Domain\Generic\ValueObject\Number\IntValue;
use CompanyTools\Domain\Generic\ValueObject\Number\PositiveIntException;
use CompanyTools\Domain\Generic\ValueObject\Number\PositiveIntValue;
use PHPUnit\Framework\TestCase;

class PositiveIntValueTest extends TestCase
{
    public function testEmpty()
    {
        $i = new PositiveIntValue();
        $this->assertSame(0, $i->getValue());

        $i = new PositiveIntValue(null);
        $this->assertSame(0, $i->getValue());
    }

    public function testNegativeFails()
    {
        $this->expectException(PositiveIntException::class);
        new PositiveIntValue(-12);
    }

    public function testValue()
    {
        $i = new PositiveIntValue(13);
        $this->assertSame(13, $i->getValue());
    }

    public function testToString()
    {
        $i = new PositiveIntValue(13);
        $this->assertSame('13', (string) $i);
    }
}