<?php

declare(strict_types=1);

namespace CompanyTools\Application;

use CompanyTools\Domain\Company\CompanyName;
use CompanyTools\Domain\Document\Amount;
use CompanyTools\Domain\Document\Bill;
use CompanyTools\Domain\Document\Invoice;
use CompanyTools\Domain\Document\PaymentDocument;
use CompanyTools\Domain\Document\ReferenceValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\DayValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\MonthValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\QuarterValue;
use CompanyTools\Domain\Generic\ValueObject\DateTime\YearValue;
use CompanyTools\Domain\Generic\ValueObject\File\FilePathValue;

abstract class PaymentDocumentService
{
    public function invoiceFromFile(FilePathValue $filePathValue): Invoice
    {
        $paymentDocument = $this->documentFromFile($filePathValue);
        return Invoice::fromPaymentDocument($paymentDocument);
    }

    public function billFromFile(FilePathValue $filePathValue): Bill
    {
        $paymentDocument = $this->documentFromFile($filePathValue);
        return Bill::fromPaymentDocument($paymentDocument);
    }

    public function createReferenceValue(string $value): ReferenceValue
    {
        return new ReferenceValue($value);
    }

    protected function createPaymentDocument(
        string $referenceValue,
        string $companyName,
        \DateTime $dayValue,
        float $vatAmount,
        float $totalAmount,
        int $year,
        int $month
    ): PaymentDocument
    {
        return new PaymentDocument(
            new ReferenceValue($referenceValue),
            new CompanyName($companyName),
            new DayValue($dayValue),
            new Amount($vatAmount),
            new Amount($totalAmount),
            new QuarterValue(new YearValue($year), new MonthValue($month))
        );
    }

    protected abstract function documentFromFile(FilePathValue $filePathValue): PaymentDocument;

}