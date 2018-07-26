<?php

declare(strict_types=1);

namespace CompanyTools\Infrastructure\Persistence\Doctrine\Repository;

use CompanyTools\Domain\Company\CompanyName;
use CompanyTools\Domain\Document\Bill;
use CompanyTools\Domain\Document\PaymentDocument;
use CompanyTools\Domain\Document\BillRepository;
use CompanyTools\Domain\Document\ReferenceValue;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;

class DoctrineBillRepository implements BillRepository
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
        $entityManager = $managerRegistry->getManagerForClass(Bill::class);
        $this->repository = $entityManager->getRepository(Bill::class);
        $this->em = $entityManager;
    }

    public function create(Bill $document): void
    {
        $this->em->persist($document);
        $this->em->flush();
    }

    public function update(Bill $document): void
    {
        $this->em->persist($document);
        $this->em->flush();
    }

    public function findByReference(ReferenceValue $reference): Bill
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