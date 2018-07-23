<?php

declare(strict_types=1);

namespace CompanyTools\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends Controller
{
    /**
     * @Route("/", name="dashboard")
     */
    public function dashboard()
    {
        return $this->render('dashboard/dashboard.html.twig');
    }
}