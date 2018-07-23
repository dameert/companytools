<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Document;

class Bill extends PaymentDocument
{
    public static function fromPaymentDocument(PaymentDocument $paymentDocument): Bill
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