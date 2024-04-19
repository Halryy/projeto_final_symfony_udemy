<?php

namespace App\Controller\Admin;

use App\Entity\Timeline;
use App\Form\TimelineType;
use App\Repository\TimelineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/timeline')]
class TimelineController extends AbstractController
{
    #[Route('/', name: 'app_admin_timeline_index', methods: ['GET'])]
    public function index(TimelineRepository $timelineRepository): Response
    {
        return $this->render('admin/timeline/index.html.twig', [
            'timelines' => $timelineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_timeline_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $timeline = new Timeline();
        $form = $this->createForm(TimelineType::class, $timeline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($timeline);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_timeline_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/timeline/new.html.twig', [
            'timeline' => $timeline,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_timeline_show', methods: ['GET'])]
    public function show(Timeline $timeline): Response
    {
        return $this->render('admin/timeline/show.html.twig', [
            'timeline' => $timeline,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_timeline_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Timeline $timeline, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TimelineType::class, $timeline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_timeline_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/timeline/edit.html.twig', [
            'timeline' => $timeline,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_timeline_delete', methods: ['POST'])]
    public function delete(Request $request, Timeline $timeline, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$timeline->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($timeline);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_timeline_index', [], Response::HTTP_SEE_OTHER);
    }
}
