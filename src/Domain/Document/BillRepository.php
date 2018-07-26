<?php

declare(strict_types=1);

namespace CompanyTools\Domain\Document;

use CompanyTools\Domain\Company\CompanyName;

interface BillRepository
{
    public function create(Bill $document): void;

    public function update(Bill $document): void;

    public function findByReference(ReferenceValue $reference): Bill;

    /**
     * @return Bill[]
     */
    public function findAll(): array;

    /**
     * @return Bill[]
     */
    public function findByCompanyName(CompanyName $companyName): array;
}