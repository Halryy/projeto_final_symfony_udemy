<?php

namespace App\Controller\Public;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('public/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/', name: 'app_who_we_are')]
    public function whoWeAre(): Response
    {
        return $this->render('public/who_we_are/who_we_are.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/noticias', name: 'app_news')]
    public function news(): Response
    {
        return $this->render('public/news/news.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/noticia/{slug}', name: 'app_new_detail')]
    public function new($slug): Response
    {
        return $this->render('public/news/news-detail.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/produtos', name: 'app_products')]
    public function products(): Response
    {
        return $this->render('public/product/products.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/produto/{slug}', name: 'app_product_detail')]
    public function product($slug): Response
    {
        return $this->render('public/product/product-detail.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/financiamentos', name: 'app_financing')]
    public function financing(): Response
    {
        return $this->render('public/financing/financing.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
