<?php

namespace App\Controller\Admin;

use App\Entity\ContactFormUrlPost;
use App\Form\ContactFormUrlPostType;
use App\Repository\ContactFormUrlPostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/contact/form/url/post')]
class ContactFormUrlPostController extends AbstractController
{
    #[Route('/', name: 'app_admin_contact_form_url_post_index', methods: ['GET'])]
    public function index(ContactFormUrlPostRepository $contactFormUrlPostRepository): Response
    {
        return $this->render('admin/contact_form_url_post/index.html.twig', [
            'contact_form_url_posts' => $contactFormUrlPostRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_contact_form_url_post_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactFormUrlPost = new ContactFormUrlPost();
        $form = $this->createForm(ContactFormUrlPostType::class, $contactFormUrlPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contactFormUrlPost);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_contact_form_url_post_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/contact_form_url_post/new.html.twig', [
            'contact_form_url_post' => $contactFormUrlPost,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_contact_form_url_post_show', methods: ['GET'])]
    public function show(ContactFormUrlPost $contactFormUrlPost): Response
    {
        return $this->render('admin/contact_form_url_post/show.html.twig', [
            'contact_form_url_post' => $contactFormUrlPost,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_contact_form_url_post_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContactFormUrlPost $contactFormUrlPost, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactFormUrlPostType::class, $contactFormUrlPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_contact_form_url_post_edit', ['id' => $contactFormUrlPost->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/contact_form_url_post/edit.html.twig', [
            'contact_form_url_post' => $contactFormUrlPost,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_contact_form_url_post_delete', methods: ['POST'])]
    public function delete(Request $request, ContactFormUrlPost $contactFormUrlPost, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactFormUrlPost->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($contactFormUrlPost);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_contact_form_url_post_index', [], Response::HTTP_SEE_OTHER);
    }
}
