<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\Number;

use CompanyTools\Domain\Generic\ValueObject\Number\FloatValue;
use PHPUnit\Framework\TestCase;

class FloatValueTest extends TestCase
{
    public function testEmpty()
    {
        $f = new FloatValue();
        $this->assertSame(0.00, $f->getValue());

        $f = new FloatValue(null);
        $this->assertSame(0.00, $f->getValue());
    }

    public function testValue()
    {
        $f = new FloatValue(10.90);
        $this->assertSame(10.90, $f->getValue());

        $f = new FloatValue(10.90);
        $this->assertSame(10.9, $f->getValue());

        $f = new FloatValue(0-10.90);
        $this->assertSame(-10.90, $f->getValue());
    }

    public function testToString()
    {
        $f = new FloatValue(10.90);
        $this->assertSame('10.90', (string) $f);

        $f = new FloatValue(0-10.90);
        $this->assertSame('-10.90', (string) $f);
    }
}