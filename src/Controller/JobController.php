<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use DateTimeImmutable;
use App\Repository\JobRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("admin/job")
 */
class JobController extends AbstractController
{
    /**
     * @Route("/", name="app_job_index", methods={"GET"})
     */
    public function index(JobRepository $jobRepository): Response
    {
        return $this->render('dashboard/crud/job/index.html.twig', [
            'jobs' => $jobRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_job_new", methods={"GET", "POST"})
     */
    public function new(Request $request, JobRepository $jobRepository): Response
    {
        $job = new Job();
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $job->setUser($this->getUser());
            $job->setCreatedAt(new DateTimeImmutable());
            $jobRepository->add($job, true);
            return $this->redirectToRoute('app_job_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dashboard/crud/job/new.html.twig', [
            'job' => $job,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_job_show", methods={"GET"})
     */
    public function show(Job $job): Response
    {
        return $this->render('dashboard/crud/job/show.html.twig', [
            'job' => $job,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_job_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Job $job, JobRepository $jobRepository): Response
    {
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jobRepository->add($job, true);

            return $this->redirectToRoute('app_job_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dashboard/crud/job/edit.html.twig', [
            'job' => $job,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_job_delete", methods={"POST"})
     */
    public function delete(Request $request, Job $job, JobRepository $jobRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $job->getId(), $request->request->get('_token'))) {
            $jobRepository->remove($job, true);
        }

        return $this->redirectToRoute('app_job_index', [], Response::HTTP_SEE_OTHER);
    }
}
