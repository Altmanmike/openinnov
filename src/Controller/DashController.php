<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashController extends AbstractController
{
    #[Route('/dash2', name: 'app_dash2')]
    public function dash_index(): Response
    {
        return $this->render('dashboard/dash_index.html.twig', [
            'controller_name' => 'DashController',
        ]);
    }

    #[Route('/dash', name: 'app_dash')]
    public function dashboard(): Response
    {
        return $this->render('dashboard/dashboard.html.twig', [
            'controller_name' => 'DashController',
        ]);
    }

    #[Route('/dash/budget', name: 'app_dash_budget')]
    public function dash_budget(): Response
    {
        return $this->render('dashboard/budgets/dash_budget.html.twig', [
            'controller_name' => 'DashController',
        ]);
    }

    // TODO : Les autres routes du controller Dash
}
