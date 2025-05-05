<?php

namespace App\Controller;

use App\Entity\Medecin;
use App\Form\MedecinForm;
use App\Repository\MedecinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

#[Route('/medecin')]
final class MedecinController extends AbstractController
{
    #[Route(name: 'app_medecin_index', methods: ['GET'])]
    public function index(MedecinRepository $medecinRepository): Response
    {
        return $this->render('medecin/index.html.twig', [
            'medecins' => $medecinRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medecin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medecin = new Medecin();
        $form = $this->createForm(MedecinForm::class, $medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medecin);
            $entityManager->flush();

            return $this->redirectToRoute('app_medecin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medecin/new.html.twig', [
            'medecin' => $medecin,
            'form' => $form,
        ]);
    }

    #[Route('/{id_medecin}', name: 'app_medecin_show', methods: ['GET'], requirements: ['id_medecin' => Requirement::DIGITS])]
    public function show(MedecinRepository $repo, int $id_medecin): Response
    {
        $medecin = $repo->find($id_medecin);

        if (!$medecin) {
            throw $this->createNotFoundException('Médecin non trouvé');
        }

        return $this->render('medecin/show.html.twig', [
            'medecin' => $medecin,
        ]);
    }

    #[Route('/{id_medecin}/edit', name: 'app_medecin_edit', methods: ['GET', 'POST'], requirements: ['id_medecin' => Requirement::DIGITS])]
    public function edit(Request $request, MedecinRepository $repo, EntityManagerInterface $entityManager, int $id_medecin): Response
    {
        $medecin = $repo->find($id_medecin);

        if (!$medecin) {
            throw $this->createNotFoundException('Médecin non trouvé');
        }

        $form = $this->createForm(MedecinForm::class, $medecin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medecin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medecin/edit.html.twig', [
            'medecin' => $medecin,
            'form' => $form,
        ]);
    }

    #[Route('/{id_medecin}', name: 'app_medecin_delete', methods: ['POST'], requirements: ['id_medecin' => Requirement::DIGITS])]
    public function delete(Request $request, MedecinRepository $repo, EntityManagerInterface $entityManager, int $id_medecin): Response
    {
        $medecin = $repo->find($id_medecin);

        if (!$medecin) {
            throw $this->createNotFoundException('Médecin non trouvé');
        }

        if ($this->isCsrfTokenValid('delete' . $id_medecin, $request->getPayload()->getString('_token'))) {
            $entityManager->remove($medecin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medecin_index', [], Response::HTTP_SEE_OTHER);
    }
}