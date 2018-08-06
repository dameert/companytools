<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Integration\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DocumentsControllerTest extends WebTestCase
{
    public function testDocuments()
    {
        $c = static::createClient();
        $c->request('GET', '/documents/');

        $this->assertEquals(200, $c->getResponse()->getStatusCode());
    }

    public function testUpload()
    {
        $c = static::createClient();
        $c->request('GET', '/documents/upload');

        $this->assertEquals(200, $c->getResponse()->getStatusCode());
    }

    public function testBill()
    {
        $c = static::createClient();
        $c->request('GET', '/documents/bill/reference');

        $this->assertEquals(200, $c->getResponse()->getStatusCode());
    }

    public function testBillNotFound()
    {
        $c = static::createClient();
        $c->request('GET', '/documents/bill/reference-does-not-exist');

        $this->assertEquals(404, $c->getResponse()->getStatusCode());
    }

    public function testInvoice()
    {
        $c = static::createClient();
        $c->request('GET', '/documents/invoice/reference');

        $this->assertEquals(200, $c->getResponse()->getStatusCode());
    }

    public function testInvoiceNotFound()
    {
        $c = static::createClient();
        $c->request('GET', '/documents/invoice/reference-does-not-exist');

        $this->assertEquals(404, $c->getResponse()->getStatusCode());
    }
}