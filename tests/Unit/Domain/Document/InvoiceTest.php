<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Domain\Document;

use CompanyTools\Domain\Company\CompanyName;
use CompanyTools\Domain\Document\Amount;
use CompanyTools\Domain\Document\Invoice;
use CompanyTools\Domain\Document\PaymentDocument;
use CompanyTools\Domain\Document\ReferenceValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\DayValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\QuarterValue;
use PHPUnit\Framework\TestCase;

class InvoiceTest extends TestCase
{
    public function testFromPaymentDocument()
    {
        $rf = $this->createMock(ReferenceValue::class);
        $rf->expects(self::exactly(2))->method('getValue')->willReturn('aValue');
        $cn = $this->createMock(CompanyName::class);
        $dv = $this->createMock(DayValue::class);
        $va = $this->createMock(Amount::class);
        $ta = $this->createMock(Amount::class);
        $qv = $this->createMock(QuarterValue::class);

        $pd = $this->createMock(PaymentDocument::class);
        $pd->expects(self::once())->method('getReferenceValue')->willReturn($rf);
        $pd->expects(self::once())->method('getCompanyName')->willReturn($cn);
        $pd->expects(self::once())->method('getDayValue')->willReturn($dv);
        $pd->expects(self::once())->method('getVatAmount')->willReturn($va);
        $pd->expects(self::once())->method('getTotalAmount')->willReturn($ta);
        $pd->expects(self::once())->method('getQuarterValue')->willReturn($qv);

        $i = Invoice::fromPaymentDocument($pd);

        $this->assertSame($rf->getValue(), $i->getReferenceValue()->getValue());
        $this->assertSame($cn, $i->getCompanyName());
        $this->assertSame($dv, $i->getDayValue());
        $this->assertSame($va, $i->getVatAmount());
        $this->assertSame($ta, $i->getTotalAmount());
        $this->assertSame($qv, $i->getQuarterValue());
    }
}