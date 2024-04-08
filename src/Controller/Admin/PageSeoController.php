<?php

namespace App\Controller\Admin;

use App\Entity\PageSeo;
use App\Form\PageSeoType;
use App\Repository\PageSeoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/page/seo')]
class PageSeoController extends AbstractController
{
    #[Route('/', name: 'app_admin_page_seo_index', methods: ['GET'])]
    public function index(PageSeoRepository $pageSeoRepository): Response
    {
        return $this->render('admin/page_seo/index.html.twig', [
            'page_seos' => $pageSeoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_page_seo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pageSeo = new PageSeo();
        $form = $this->createForm(PageSeoType::class, $pageSeo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pageSeo);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_page_seo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/page_seo/new.html.twig', [
            'page_seo' => $pageSeo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_page_seo_show', methods: ['GET'])]
    public function show(PageSeo $pageSeo): Response
    {
        return $this->render('admin/page_seo/show.html.twig', [
            'page_seo' => $pageSeo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_page_seo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PageSeo $pageSeo, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PageSeoType::class, $pageSeo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_page_seo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/page_seo/edit.html.twig', [
            'page_seo' => $pageSeo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_page_seo_delete', methods: ['POST'])]
    public function delete(Request $request, PageSeo $pageSeo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pageSeo->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($pageSeo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_page_seo_index', [], Response::HTTP_SEE_OTHER);
    }
}
