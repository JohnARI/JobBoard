<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/profil/{id}', name: 'app_my_profile')]
    public function myProfil($id): Response
    {

        $myProfil = $this->getUser();
        $user = $this->entityManager->getRepository(User::class)->find($id);

        return $this->render('profil/index.html.twig', [
            'myProfil' => $myProfil,
            'user' => $user,
        ]);
    }
}
