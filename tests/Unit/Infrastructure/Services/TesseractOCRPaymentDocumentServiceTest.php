<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Infrastructure\Services;

use CompanyTools\Domain\Document\Bill;
use CompanyTools\Domain\Document\Invoice;
use CompanyTools\Domain\Document\ReferenceValue;
use CompanyTools\Domain\Generic\ValueObject\File\FilePathValue;
use CompanyTools\Infrastructure\Services\TesseractOCRPaymentDocumentService;
use PHPUnit\Framework\TestCase;

class TesseractOCRPaymentDocumentServiceTest extends TestCase
{
    public function testCreateReferenceValue()
    {
        $s = new TesseractOCRPaymentDocumentService();
        $rv = $s->createReferenceValue('CompanyTools');

        $this->assertInstanceOf(ReferenceValue::class, $rv);
        $this->assertSame('CompanyTools', $rv->getValue());
    }

    public function testInvoiceFromFile()
    {
        $fpv = $this->createMock(FilePathValue::class);
        $s = new TesseractOCRPaymentDocumentService();

        $this->assertInstanceOf(Invoice::class, $s->invoiceFromFile($fpv));
    }

    public function testBillFromFile()
    {
        $fpv = $this->createMock(FilePathValue::class);
        $s = new TesseractOCRPaymentDocumentService();

        $this->assertInstanceOf(Bill::class, $s->billFromFile($fpv));
    }
}