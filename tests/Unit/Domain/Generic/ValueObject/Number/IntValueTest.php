<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\Number;

use CompanyTools\Domain\Generic\ValueObject\Number\IntValue;
use PHPUnit\Framework\TestCase;

class IntValueTest extends TestCase
{
    public function testEmpty()
    {
        $i = new IntValue();
        $this->assertSame(0, $i->getValue());

        $i = new IntValue(null);
        $this->assertSame(0, $i->getValue());
    }

    public function testValue()
    {
        $i = new IntValue(13);
        $this->assertSame(13, $i->getValue());

        $i = new IntValue(-13);
        $this->assertSame(-13, $i->getValue());
    }

    public function testToString()
    {
        $i = new IntValue(13);
        $this->assertSame('13', (string) $i);

        $i = new IntValue(-13);
        $this->assertSame('-13', (string) $i);
    }
}