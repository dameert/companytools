<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\DateTime;

use CompanyTools\Domain\Generic\ValueObject\DateTime\MonthException;
use CompanyTools\Domain\Generic\ValueObject\DateTime\MonthValue;
use PHPUnit\Framework\TestCase;

class MonthValueTest extends TestCase
{
    public function testFromDateTime()
    {
        $m = new MonthValue(7);
        $mfdt = MonthValue::fromDateTime(new \DateTime('1-7-2018'));

        $this->assertEquals($m, $mfdt);
    }

    public function testMonthZeroFails()
    {
        $this->expectException(MonthException::class);
        new MonthValue(0);
    }

    public function testMonthFails()
    {
        $this->expectException(MonthException::class);
        new MonthValue(13);
    }

    public function testValue()
    {
        $m = new MonthValue(2);
        $this->assertSame(2, $m->getValue());
    }

    public function testToString()
    {
        $m = new MonthValue(2);
        $this->assertSame('2', (string) $m);
    }
}