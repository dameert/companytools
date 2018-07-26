<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\DateTime;

use CompanyTools\Domain\Generic\ValueObject\DateTime\DayValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\MonthValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\QuarterValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\YearValue;
use PHPUnit\Framework\TestCase;

class DayValueTest extends TestCase
{
    public function testFromString()
    {
        $d = new DayValue(new \DateTime('24-7-2018'));
        $ds = DayValue::fromString('24-07-2018');
        $this->assertEquals($d, $ds);
    }

    public function testFromQuarterValue()
    {
        $mv = $this->createMock(MonthValue::class);
        $mv->expects(self::once())
            ->method('__toString')
            ->willReturn('7');

        $yv = $this->createMock(YearValue::class);
        $yv->expects(self::once())
            ->method('__toString')
            ->willReturn('2018');

        $qv = $this->createMock(QuarterValue::class);
        $qv->expects(self::once())
            ->method('getMonthValue')
            ->willReturn($mv);
        $qv->expects(self::once())
            ->method('getYearValue')
            ->willReturn($yv);

        $dfqv = DayValue::fromQuarterValue($qv);
        $this->assertEquals(new \DateTime('1-7-2018'), $dfqv->getValue());
    }

    public function testValue()
    {
        $d = new DayValue(new \DateTime('24-07-2018'));
        $this->assertEquals(new \DateTime('24-7-2018'), $d->getValue());
    }

    public function testMonthValue()
    {
        $mv = $this->createMock(MonthValue::class);
        $mv->expects(self::once())
            ->method('getValue')
            ->willReturn(7);

        $d = new DayValue(new \DateTime('24-07-2018'));
        $this->assertSame($mv->getValue(), $d->getMonthValue()->getValue());

    }

    public function testYearValue()
    {
        $yv = $this->createMock(YearValue::class);
        $yv->expects(self::once())
            ->method('getValue')
            ->willReturn(2018);

        $d = new DayValue(new \DateTime('24-07-2018'));
        $this->assertSame($yv->getValue(), $d->getYearValue()->getValue());
    }

    public function testToString()
    {
        $d = new DayValue(new \DateTime('4-7-2018'));
        $this->assertSame('04-07-2018', (string) $d);
    }
}