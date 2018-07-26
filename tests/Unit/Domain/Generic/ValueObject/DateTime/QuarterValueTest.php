<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Generic\ValueObject\DateTime;

use CompanyTools\Domain\Generic\ValueObject\DateTime\MonthValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\QuarterValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\YearValue;
use PHPUnit\Framework\TestCase;

class QuarterValueTest extends TestCase
{
    public function testFromDateTime()
    {
        $yv = $this->createMock(YearValue::class);
        $yv->expects(self::once())
            ->method('getValue')
            ->willReturn(2018);

        $mv = $this->createMock(MonthValue::class);
        $mv->expects(self::exactly(2))
            ->method('getValue')
            ->willReturn(7);

        $q = new QuarterValue($yv, $mv);
        $qfdt = QuarterValue::fromDateTime(new \DateTime('23-7-2018'));

        $this->assertEquals($q->getYearValue()->getValue(), $qfdt->getYearValue()->getValue());
        $this->assertEquals($q->getMonthValue()->getValue(), $qfdt->getMonthValue()->getValue());
        $this->assertEquals($q->getQuarter(), $qfdt->getQuarter());
    }

    public function testYearValue()
    {
        $yv = $this->createMock(YearValue::class);
        $yv->expects(self::exactly(2))
            ->method('getValue')
            ->willReturn(2018);

        $mv = $this->createMock(MonthValue::class);
        $mv->expects(self::once())
            ->method('getValue')
            ->willReturn(7);

        $q = new QuarterValue($yv, $mv);
        $this->assertEquals($yv->getValue(), $q->getYearValue()->getValue());
    }

    public function testMonthValue()
    {
        $yv = $this->createMock(YearValue::class);

        $mv = $this->createMock(MonthValue::class);
        $mv->expects(self::exactly(3))
            ->method('getValue')
            ->willReturn(7);

        $q = new QuarterValue($yv, $mv);
        $this->assertEquals($mv->getValue(), $q->getMonthValue()->getValue());

    }

    public function testQuarter()
    {
        $yv = $this->createMock(YearValue::class);

        $quarters = [1,1,1,2,2,2,3,3,3,4,4,4];

        for ($month = 1; $month <= count($quarters); $month++) {
            $mv = $this->createMock(MonthValue::class);
            $mv->expects(self::once())
                ->method('getValue')
                ->willReturn($month);

            $q = new QuarterValue($yv, $mv);
            $this->assertEquals($quarters[$month-1], $q->getQuarter(), sprintf('Failure for month %b', $month));
        }
    }

    public function testToString()
    {
        $mv = $this->createMock(MonthValue::class);
        $mv->expects(self::once())
            ->method('getValue')
            ->willReturn(7);

        $yv = $this->createMock(YearValue::class);
        $yv->expects(self::once())
            ->method('__toString')
            ->willReturn('2018');

        $q = new QuarterValue($yv, $mv);
        $this->assertSame('2018 Q3', (string) $q);
    }
}