<?php

declare(strict_types=1);

namespace CompanyTools\Infrastructure\Services;

use CompanyTools\Application\PaymentDocumentService;
use CompanyTools\Domain\Document\PaymentDocument;
use CompanyTools\Domain\Generic\ValueObject\File\FilePathValue;

class TesseractOCRPaymentDocumentService extends PaymentDocumentService
{

    protected function documentFromFile(FilePathValue $filePathValue): PaymentDocument
    {
        // TODO: Implement documentFromFile() method.
        $referenceValue = "reference";
        $companyName = "company";
        $dayValue = new \DateTime('now');
        $vatAmout = 0.00;
        $totalAmount = 0.00;
        $year= 2018;
        $month = 1;

        return $this->createPaymentDocument(
            $referenceValue,
            $companyName,
            $dayValue,
            $vatAmout,
            $totalAmount,
            $year,
            $month
        );
    }
}