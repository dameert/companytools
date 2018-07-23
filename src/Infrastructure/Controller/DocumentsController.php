<?php

declare(strict_types=1);

namespace CompanyTools\Infrastructure\Controller;

use CompanyTools\Domain\Document\PaymentDocument;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/documents")
 */
class DocumentsController extends Controller
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
     * @Route("/{document}", name="documents_document")
     */
    public function document(PaymentDocument $document)
    {
        return $this->render('documents/document.html.twig', ['document' => $document]);
    }
}