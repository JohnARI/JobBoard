<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Sector;
use App\Entity\JobTypes;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
     * @Route("/home", name="app_user_home")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $jobs = new Job(); // Création d'un objet Job
        $jobTypes = new JobTypes(); // Création d'un objet JobTypes
        $sectors = new Sector();
        $sectors = $this->entityManager->getRepository(Sector::class)->findAll();
        $jobs = $this->entityManager->getRepository(Job::class)->findAll(); //Récupération de tous les jobs
        $jobTypes = $this->entityManager->getRepository(JobTypes::class)->findAll(); //Récupération de tous les types de jobs
        $jobsPage = $paginator->paginate(
            $jobs, // Requête contenant les données à paginer (ici nos jobs)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        $formSearch = $this->createForm(SearchType::class);
        $formSearch->handleRequest($request);

        if ($formSearch->isSubmitted() && $formSearch->isValid()) {
            $value = $formSearch['jobType']->getData();
            if($value != 'All' && $value != '') {
            $jobs = $this->entityManager->getRepository(Job::class)->findBySearch($value);
            $jobsPage = $paginator->paginate(
                $jobs, // Requête contenant les données à paginer (ici nos jobs)
                $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
                10 // Nombre de résultats par page
            );
        } 
            if ($value == 'All' || $value == '') {
                $jobs = $this->entityManager->getRepository(Job::class)->findAll();
                $jobsPage = $paginator->paginate(
                $jobs, // Requête contenant les données à paginer (ici nos jobs)
                $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
                10 // Nombre de résultats par page
            );
        }
        }

        return $this->render('home/user_home.html.twig', [
            'jobsPage' => $jobsPage, // On passe les jobs à la vue
            'jobTypes' => $jobTypes, // On passe les types de jobs à la vue
            'sectors' => $sectors, // On passe les types de jobs à la vue
            'formSearch' => $formSearch->createView(),
        ]);
    }
}
