<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Document;

use CompanyTools\Domain\Company\CompanyName;

interface PaymentDocumentRepository
{
    /**
     * @return PaymentDocument[]
     */
    public function all(): array;

    public function byReference(ReferenceValue $reference): PaymentDocument;

    /**
     * @param CompanyName $companyName
     *
     * @return PaymentDocument[]
     */
    public function byCompanyName(CompanyName $companyName): array;
}