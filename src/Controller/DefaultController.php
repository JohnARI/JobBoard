<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        if (!$this->isGranted('ROLE_USER')) { // Si l'utilisateur n'est pas connecté
            return $this->redirectToRoute('app_login'); 
        }
        if ($user = $this->getUser()) { // Si l'utilisateur est connecté
            $role = $user->getRole();
            switch ($role) {
                case 'Utilisateur': // Si l'utilisateur est un utilisateur
                    return $this->redirectToRoute('app_user_home');
                case 'Recruteur': // Si l'utilisateur est un recruteur
                    return $this->redirectToRoute('app_recruiter_home');
                case 'Administrateur': // Si l'utilisateur est un administrateur
                    return $this->redirectToRoute('admin_home');
            }
        }
    }
}
