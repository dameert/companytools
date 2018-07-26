<?php

declare(strict_types=1);

namespace CompanyTools\Infrastructure\Controller;

use CompanyTools\Domain\Document\Bill;
use CompanyTools\Domain\Document\Invoice;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/documents")
 */
class DocumentsController extends AbstractController
{
    /**
     * @Route("/", name="documents")
     */
    public function documents()
    {
        return $this->render('documents/documents.html.twig');
    }

    /**
     * @Route("/upload", name="documents_upload")
     */
    public function upload()
    {
        return $this->render('documents/upload.html.twig');
    }

    /**
     * @Route("/bill/{document}", name="documents_bill")
     */
    public function bill(Bill $document)
    {
        return $this->render('documents/document.html.twig', ['document' => $document]);
    }

    /**
     * @Route("/invoice/{document}", name="documents_invoice")
     */
    public function invoice(Invoice $document)
    {
        return $this->render('documents/document.html.twig', ['document' => $document]);
    }
}