<?php

namespace App\Controller;

use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserHomeController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/user/home", name="app_user_home")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $jobs = new Job(); // Création d'un objet Job
        $jobs = $this->entityManager->getRepository(Job::class)->findAll(); //Récupération de tous les jobs
        $jobsPage = $paginator->paginate(
            $jobs, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );
        return $this->render('home/user_home.html.twig', [
            'controller_name' => 'UserHomeController',
            'jobsPage' => $jobsPage, // On passe les jobs à la vue
        ]);
    }
}
