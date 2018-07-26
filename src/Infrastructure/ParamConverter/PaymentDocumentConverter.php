<?php

declare(strict_types=1);

namespace CompanyTools\Infrastructure\ParamConverter;

use CompanyTools\Domain\Document\Bill;
use CompanyTools\Domain\Document\Invoice;
use CompanyTools\Domain\Document\InvoiceRepository;
use CompanyTools\Domain\Document\BillRepository;
use CompanyTools\Infrastructure\Services\TesseractOCRPaymentDocumentService;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaymentDocumentConverter implements ParamConverterInterface
{
    /**
     * @var BillRepository
     */
    private $billRepository;

    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    /**
     * @var TesseractOCRPaymentDocumentService
     */
    private $documentService;

    public function __construct(
        BillRepository $billRepository,
        InvoiceRepository $invoiceRepository,
        TesseractOCRPaymentDocumentService $documentService
    )
    {
        $this->billRepository = $billRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->documentService = $documentService;
    }

    /**
     * Stores the object in the request.
     *
     * @param Request $request
     * @param ParamConverter $configuration Contains the name, class and options of the object
     *
     * @return bool True if the object has been successfully set, else false
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $name = $configuration->getName();
        $class = $configuration->getClass();
        $value = $request->attributes->get($name, '');

        try {
            $reference = $this->documentService->createReferenceValue($value);
            $document = $this->getRepositoryForClass($class)->findByReference($reference);
        } catch (\Throwable $throwable) {
            throw new NotFoundHttpException();
        }

        $request->attributes->set($name, $document);
        return true;
    }

    private function getRepositoryForClass(string $class)
    {
        switch ($class) {
            case Bill::class:
                return $this->billRepository;
            default:
                return $this->invoiceRepository;
        }
    }

    /**
     * Checks if the object is supported.
     *
     * @param ParamConverter $configuration
     *
     * @return bool True if the object is supported, else false
     */
    public function supports(ParamConverter $configuration)
    {
        switch ($configuration->getClass()) {
            case Bill::class:
            case Invoice::class:
                return true;
            default:
                return false;
        }
    }
}