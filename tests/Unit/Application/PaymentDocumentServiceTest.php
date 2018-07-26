<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Unit\Application;

use CompanyTools\Application\PaymentDocumentService;
use CompanyTools\Domain\Document\Bill;
use CompanyTools\Domain\Document\Invoice;
use CompanyTools\Domain\Document\PaymentDocument;
use CompanyTools\Domain\Document\ReferenceValue;
use CompanyTools\Domain\Generic\ValueObject\File\FilePathValue;
use PHPUnit\Framework\TestCase;

class PaymentDocumentServiceTest extends TestCase
{
    private $pds;
    private $pd;

    public function setUp()
    {
        parent::setUp();
        $this->pd = $this->createMock(PaymentDocument::class);
        $this->pds = $this->createMock(PaymentDocumentService::class);
        $this->pds->method('documentFromFile')->willReturn($this->pd);
    }

    public function testCreateReferenceValue()
    {
        $rv = $this->pds->createReferenceValue('CompanyTools');

        $this->assertInstanceOf(ReferenceValue::class, $rv);
    }

    public function testInvoiceFromFile()
    {
        $this->assertInstanceOf(Invoice::class, $this->pds->invoiceFromFile($this->createMock(FilePathValue::class)));
    }

    public function testBillFromFile()
    {
        $this->assertInstanceOf(Bill::class, $this->pds->billFromFile($this->createMock(FilePathValue::class)));
    }
}