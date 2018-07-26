<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\Number;

use CompanyTools\Domain\Generic\ValueObject\Number\PositiveFloatException;
use CompanyTools\Domain\Generic\ValueObject\Number\PositiveFloatValue;
use PHPUnit\Framework\TestCase;

class PositiveFloatValueTest extends TestCase
{
    public function testEmpty()
    {
        $f = new PositiveFloatValue();
        $this->assertSame(0.00, $f->getValue());

        $f = new PositiveFloatValue(null);
        $this->assertSame(0.00, $f->getValue());
    }

    public function testNegativeFails()
    {
        $this->expectException(PositiveFloatException::class);
        new PositiveFloatValue(0-10.90);
    }

    public function testValue()
    {
        $f = new PositiveFloatValue(10.90);
        $this->assertSame(10.90, $f->getValue());

        $f = new PositiveFloatValue(10.00);
        $this->assertSame(10.0, $f->getValue());
    }

    public function testToString()
    {
        $f = new PositiveFloatValue(10.90);
        $this->assertSame('10.90', (string) $f);

        $f = new PositiveFloatValue(10.00);
        $this->assertSame('10.00', (string) $f);
    }
}