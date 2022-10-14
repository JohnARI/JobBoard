<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profil/{id}', name: 'app_my_profile')]
    public function myProfil($id, UserRepository $userRepository): Response
    {
        return $this->render('profil/index.html.twig', [
            'myProfil' => $this->getUser(), // On récupére l'utilisateur connecté
            'user' => $userRepository->find($id), // On récupére l'utilisateur avec l'id passé en paramètre
        ]);
    }
}
