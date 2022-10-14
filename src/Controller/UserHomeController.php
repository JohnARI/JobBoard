<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\JobTypes;
use App\Form\SearchType;
use App\Repository\JobRepository;
use App\Repository\JobTypesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserHomeController extends AbstractController
{

    /**
     * @Route("/home", name="app_user_home")
     */
    public function index(PaginatorInterface $paginator, Request $request, JobRepository $jobRepository, JobTypesRepository $jobTypesRepository): Response
    {
        $jobs = new Job(); // Création d'un objet Job
        $jobTypes = new JobTypes(); // Création d'un objet JobTypes
        $jobs = $jobRepository->findAll(); //Récupération de tous les jobs
        $jobTypes = $jobTypesRepository->findAll(); //Récupération de tous les types de jobs
        $jobsPage = $paginator->paginate(
            $jobs, // Requête contenant les données à paginer (ici nos jobs)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        $formSearch = $this->createForm(SearchType::class); // Creation du formulaire de recherche
        $formSearch->handleRequest($request); // Envoie de la data

        if ($formSearch->isSubmitted() && $formSearch->isValid()) { // Si le formulaire est valide
            $value = $formSearch['jobType']->getData(); // Recupération de l'entrée utilisateur
            if ($value != 'All' && $value != '') { // Si l'entrée n'est pas null
                $jobs = $jobRepository->findBySearch($value); // Recherche des jobs en lien avec l'entrée de l'utilisateur
                $jobsPage = $paginator->paginate(
                    $jobs,
                    $request->query->getInt('page', 1),
                    10
                );
            }
            if ($value == 'All' || $value == '') { // Si l'utilisateur ne fais pas de recherche spécifique
                $jobs = $jobRepository->findAll();
                $jobsPage = $paginator->paginate(
                    $jobs,
                    $request->query->getInt('page', 1),
                    10
                );
            }
        }

        return $this->render('home/user_home.html.twig', [
            'jobsPage' => $jobsPage, // On passe les jobs à la vue
            'jobTypes' => $jobTypes, // On passe les types de jobs à la vue
            'formSearch' => $formSearch->createView(), // On passe le formulaire à la vue
        ]);
    }
}
