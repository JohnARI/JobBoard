<?php

namespace App\Controller;

use App\Entity\JobTypes;
use App\Form\JobTypesType;
use App\Service\FileUploader;
use App\Repository\JobTypesRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin/jobtypes")
 */
class JobTypesController extends AbstractController
{
    /**
     * @Route("/", name="app_job_types_index", methods={"GET"})
     */
    public function index(JobTypesRepository $jobTypesRepository): Response
    {
        return $this->render('dashboard/crud/job_types/index.html.twig', [
            'job_types' => $jobTypesRepository->findAll(), // On récupère tous les types de jobs
        ]);
    }

    /**
     * @Route("/new", name="app_job_types_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FileUploader $fileUploader, JobTypesRepository $jobTypesRepository): Response
    {
        $jobType = new JobTypes(); // Instanciation de l'entité JobTypes
        $form = $this->createForm(JobTypesType::class, $jobType); // Création du formulaire
        $form->handleRequest($request); // Traitement du formulaire

        if ($form->isSubmitted() && $form->isValid()) { // Si le formulaire est soumis et valide
            $file = $form->get('picture')->getData();
            if ($file) {
                $jobType->setPicture($fileUploader->upload($file, '/jobType'));
            }
            $jobTypesRepository->add($jobType, true); // On enregistre le type de job en base de données

            return $this->redirectToRoute('app_job_types_index', [], Response::HTTP_SEE_OTHER); // Redirection vers la liste des types de jobs
        }

        return $this->renderForm('dashboard/crud/job_types/new.html.twig', [
            'job_type' => $jobType, // On passe le type de job à la vue
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_job_types_show", methods={"GET"})
     */
    public function show(JobTypes $jobType): Response
    {
        return $this->render('dashboard/crud/job_types/show.html.twig', [
            'job_type' => $jobType,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_job_types_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, JobTypes $jobType, FileUploader $fileUploader, JobTypesRepository $jobTypesRepository): Response
    {
        $form = $this->createForm(JobTypesType::class, $jobType); // Création du formulaire avec les données du type de job
        $fileSystem = new Filesystem();
        $oldFileName = $jobType->getPicture();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('picture')->getData();
            if ($file && $oldFileName) {
                $projectDir = $this->getParameter('kernel.project_dir');
                $fileSystem->remove($projectDir . '/public/uploads/jobType/' . $oldFileName);

                $jobType->setPicture($fileUploader->upload($file, '/jobType'));
            } else if ($file && !$oldFileName) {
                $jobType->setPicture($fileUploader->upload($file, '/jobType'));
            } else {
                $jobType->setpicture($oldFileName);
            }
            $jobTypesRepository->add($jobType, true);

            return $this->redirectToRoute('app_job_types_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dashboard/crud/job_types/edit.html.twig', [
            'job_type' => $jobType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_job_types_delete", methods={"POST"})
     */
    public function delete(Request $request, JobTypes $jobType): Response
    {
        if ($this->isCsrfTokenValid('delete' . $jobType->getId(), $request->request->get('_token'))) { // Vérification du token CSRF
            $this->jobTypesRepository->remove($jobType, true); // Suppression du type de job en base de données
        }

        return $this->redirectToRoute('app_job_types_index', [], Response::HTTP_SEE_OTHER);
    }
}
