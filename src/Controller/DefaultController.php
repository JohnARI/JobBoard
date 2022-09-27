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
        if (!$this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_login');
        }
        if ($user = $this->getUser()) {
            $role = $user->getRole();
            switch ($role) {
                case 'Utilisateur':
                    return $this->redirectToRoute('user_home');
                case 'Recruteur':
                    return $this->redirectToRoute('recruiter_home');
                case 'Administrateur':
                    return $this->redirectToRoute('admin_home');
            }
        }
    }
}
