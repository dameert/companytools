<?php

declare(strict_types=1);

namespace CompanyTools\Tests\Integration\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DashboardControllerTest extends WebTestCase
{
    public function testDashboard()
    {
        $c = static::createClient();
        $c->request('GET', '/');

        $this->assertEquals(200, $c->getResponse()->getStatusCode());
    }
}