<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserroomController extends AbstractController
{
    #[Route('/userroom', name: 'app_userroom')]
    public function index(): Response
    {
        return $this->render('userroom/index.html.twig', [
            'controller_name' => 'UserroomController',
        ]);
    }
}
