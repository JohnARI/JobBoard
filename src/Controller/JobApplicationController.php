<?php

namespace App\Controller;

use App\Form\JobType;
use DateTimeImmutable;
use App\Entity\JobApplication;
use App\Form\JobApplicationType;
use App\Repository\JobApplicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin/job_application")
 */
class JobApplicationController extends AbstractController
{
    /**
     * @Route("/", name="app_job_application_index", methods={"GET"})
     */
    public function index(JobApplicationRepository $jobApplicationRepository): Response
    {
        return $this->render('dashboard/crud/job_application/index.html.twig', [
            'jobApplications' => $jobApplicationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_job_application_show", methods={"GET"})
     */
    public function show(JobApplication $jobApplication): Response
    {
        return $this->render('dashboard/crud/job_application/show.html.twig', [
            'jobApplications' => $jobApplication,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_job_application_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, JobApplication $jobApplication, JobApplicationRepository $jobApplicationRepository): Response
    {
        $form = $this->createForm(JobApplicationType::class, $jobApplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jobApplicationRepository->add($jobApplication, true);

            return $this->redirectToRoute('app_job_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dashboard/crud/job_application/edit.html.twig', [
            'jobApplications' => $jobApplication,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_job_application_delete", methods={"POST"})
     */
    public function delete(Request $request, JobApplication $jobApplication, JobApplicationRepository $jobApplicationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $jobApplication->getId(), $request->request->get('_token'))) { // Vérification du token CSRF
            $jobApplicationRepository->remove($jobApplication, true); // Suppression de l'annonce
        }

        return $this->redirectToRoute('app_job_application_index', [], Response::HTTP_SEE_OTHER);
    }
}
