<?php

declare(strict_types=1);

namespace CompanyTools\Infrastructure\Persistence\Doctrine\Repository;

use CompanyTools\Domain\Company\CompanyName;
use CompanyTools\Domain\Document\Invoice;
use CompanyTools\Domain\Document\InvoiceRepository;
use CompanyTools\Domain\Document\PaymentDocument;
use CompanyTools\Domain\Document\ReferenceValue;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;

class DoctrineInvoiceRepository implements InvoiceRepository
{
    /**
     * @var EntityRepository
     */
    private $repository;

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $entityManager = $managerRegistry->getManagerForClass(Invoice::class);
        $this->repository = $entityManager->getRepository(Invoice::class);
        $this->em = $entityManager;
    }

    public function create(Invoice $document): void
    {
        $this->em->persist($document);
        $this->em->flush();
    }

    public function update(Invoice $document): void
    {
        $this->em->persist($document);
        $this->em->flush();
    }

    public function findByReference(ReferenceValue $reference): Invoice
    {
        if (null === $document = $this->repository->findOneBy(['referenceValue' => $reference->getValue()])) {
            throw new EntityNotFoundException($reference->getValue());
        }

        return $document;
    }

    /**
     * @return PaymentDocument[]
     */
    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    /***
     * @return PaymentDocument[]
     */
    public function findByCompanyName(CompanyName $companyName): array
    {
        // TODO: Implement findByCompanyName() method.
    }
}