<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil/{id}', name: 'app_my_profile')]
    public function myProfil(): Response
    {

        $myProfil = $this->getUser();


        return $this->render('profil/index.html.twig', [
            'myProfil' => $myProfil,
        ]);
    }
}
