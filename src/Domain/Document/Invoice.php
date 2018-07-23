<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Document;

class Invoice extends PaymentDocument
{
    public static function fromPaymentDocument(PaymentDocument $paymentDocument): Invoice
    {
        return new static(
            $paymentDocument->getReferenceValue(),
            $paymentDocument->getCompanyName(),
            $paymentDocument->getDayValue(),
            $paymentDocument->getVatAmount(),
            $paymentDocument->getTotalAmount(),
            $paymentDocument->getQuarterValue()
        );
    }
}