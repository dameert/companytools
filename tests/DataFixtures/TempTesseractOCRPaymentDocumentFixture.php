<?php

declare(strict_types=1);

namespace CompanyTools\Tests\DataFixtures;

use CompanyTools\Domain\Generic\ValueObject\File\FilePathValue;
use CompanyTools\Infrastructure\Services\TesseractOCRPaymentDocumentService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TempTesseractOCRPaymentDocumentFixture extends Fixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $paymentDocumentService = new TesseractOCRPaymentDocumentService();
        $bill = $paymentDocumentService->billFromFile(new FilePathValue('../DataFixtures/inputFiles/bill.pdf'));
        $invoice = $paymentDocumentService->invoiceFromFile(new FilePathValue('../DataFixtures/inputFiles/invoice.pdf'));

        $manager->persist($bill);
        $manager->persist($invoice);

        $manager->flush();
    }
}