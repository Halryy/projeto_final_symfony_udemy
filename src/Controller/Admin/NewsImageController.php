<?php

namespace App\Controller\Admin;

use App\Entity\NewsImage;
use App\Form\NewsImageType;
use App\Repository\NewsImageRepository;
use App\Repository\NewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/news-image')]
class NewsImageController extends AbstractController
{
    #[Route('/{newsId}', name: 'app_admin_news_image_index', methods: ['GET'])]
    public function index(NewsImageRepository $newsImageRepository, $newsId, NewsRepository $newsRepository): Response
    {
        $newsId = $newsRepository->find($newsId);
        return $this->render('admin/news_image/index.html.twig', [
            'news_images' => $newsImageRepository->findAll(),
        ]);
    }

    #[Route('/{newsId}/new', name: 'app_admin_news_image_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, $newsId, NewsRepository $newsRepository): Response
    {
        $newsImage = new NewsImage();
        $form = $this->createForm(NewsImageType::class, $newsImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($newsImage);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_news_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/news_image/new.html.twig', [
            'news_image' => $newsImage,
            'form' => $form,
        ]);
    }

    #[Route('/{newsId}/{id}/edit', name: 'app_admin_news_image_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NewsImage $newsImage, EntityManagerInterface $entityManager, $newsId, NewsRepository $newsRepository): Response
    {
        $form = $this->createForm(NewsImageType::class, $newsImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_news_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/news_image/edit.html.twig', [
            'news_image' => $newsImage,
            'form' => $form,
        ]);
    }

    #[Route('/{newsId}/{id}', name: 'app_admin_news_image_delete', methods: ['POST'])]
    public function delete(Request $request, NewsImage $newsImage, EntityManagerInterface $entityManager, $newsId, NewsRepository $newsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newsImage->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($newsImage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_news_image_index', [], Response::HTTP_SEE_OTHER);
    }
}
