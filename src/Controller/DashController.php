<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashController extends AbstractController
{
    #[Route('/dash', name: 'app_dash')]
    public function dash(): Response
    {
        return $this->render('dashboard/dashboard2024.html.twig', [
            'controller_name' => 'DashController',
        ]);
    }

    // TODO : Les autres routes du controller Dash

}
