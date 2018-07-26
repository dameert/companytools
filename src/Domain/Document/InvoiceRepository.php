<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Document;

use CompanyTools\Domain\Company\CompanyName;

interface InvoiceRepository
{
    public function create(Invoice $document): void;

    public function update(Invoice $document): void;

    public function findByReference(ReferenceValue $reference): Invoice;

    /**
     * @return Invoice[]
     */
    public function findAll(): array;

    /**
     * @return Invoice[]
     */
    public function findByCompanyName(CompanyName $companyName): array;
}