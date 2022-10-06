<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecruiterHomeController extends AbstractController
{
    #[Route('/recruiter/home', name: 'app_recruiter_home')]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('home/recruiter_home.html.twig', [
            'users' => $userRepository->findByRole('ROLE_USER'), // On récupére tous les utilisateurs avec le rôle ROLE_USER
        ]);
    }
}
