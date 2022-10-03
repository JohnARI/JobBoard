<?php

namespace App\Controller;

use App\Entity\Job;
use DateTimeImmutable;
use App\Form\JobApplyType;
use App\Entity\JobApplication;
use App\Repository\JobApplicationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JobApplyController extends AbstractController
{
    /**
     * @Route("/job/apply/{id}", name="app_job_apply")
     */
    public function index(Job $job, Request $request, JobApplicationRepository $jobApplicationRepository): Response
    {
        $jobApplication = new JobApplication();
        $form = $this->createForm(JobApplyType::class, $jobApplication); // Création du formulaire
        $form->handleRequest($request); // Traitement du formulaire
        $user = $this->getUser(); // Récupération de l'utilisateur connecté

        if ($form->isSubmitted() && $form->isValid()) {
            if ($jobApplicationRepository->findOneBy(['job' => $job, 'user' => $user])) {
                $this->addFlash('red', 'Vous avez déjà postulé à cette offre !');
                return $this->redirectToRoute('app_user_home');
            }
            $jobApplication->setUser($user); // Insértion de l'utilisateur
            $jobApplication->setJob($job); // Insértion de l'annonce
            if ($user->getFirstname() != null && $user->getLastname() != null) {
                $jobApplication->setFirstname($user->getFirstname()); // Insértion du prénom
                $jobApplication->setLastname($user->getLastname()); // Insértion du nom
            }
            $jobApplication->setCreatedAt(new DateTimeImmutable()); // Set la date de création
            $jobApplicationRepository->add($jobApplication, true); // Enregistrement en base de données
            $this->addFlash('green', 'Votre candidature a bien été envoyée'); // Message flash
            return $this->redirectToRoute('app_user_home', [], Response::HTTP_SEE_OTHER); // Redirection vers la liste des annonces
        }

        return $this->render('job_apply/index.html.twig', [
            'jobApplication' => $jobApplication, // Envoi de l'annonce à la vue
            'form' => $form->createView(), // Envoi du formulaire à la vue
        ]);
    }
}
