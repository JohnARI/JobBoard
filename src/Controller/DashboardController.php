<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    /**
     * @Route("dashboard", name="app_dashboard")
     */
    public function index(): Response
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();
        $jobs = $this->entityManager->getRepository(Job::class)->findAll();

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
