<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecruiterHomeController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/recruiter/home', name: 'app_recruiter_home')]
    public function index(): Response
    {
        $users = $this->entityManager->getRepository(User::class)->findByRole('ROLE_USER'); // On récupére tous les utilisateurs avec le rôle ROLE_USER
        return $this->render('home/recruiter_home.html.twig', [
            'users' => $users,
        ]);
    }
}
