<?php

namespace App\Controller\Public;

use App\Entity\Enum\LanguageEnum;
use App\Repository\BannerRepository;
use App\Repository\FinancingRepository;
use App\Repository\NewsRepository;
use App\Repository\ProductCategoryRepository;
use App\Repository\TestimonyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends BaseController
{
    #[Route('/', name: 'app_home')]
    public function index(
        BannerRepository $bannerRepository,
        ProductCategoryRepository $productCategoryRepository,
        NewsRepository $newsRepository,
        TestimonyRepository $testimonyRepository,
        FinancingRepository $financingRepository,
    ): Response
    {
        $languageId = LanguageEnum::getId($this->session->get('language'));

        $banners = $bannerRepository->findBy(
            [
                'language' => $languageId,
                'active' => 1
            ],
            [
                'position' => 'ASC'
            ]
        );

        $productCategories = $productCategoryRepository->findBy([
            'language' => $languageId,
        ]);

        $allNews = $newsRepository->findBy([
           'language' => $languageId,
            'status' => 1,
            'highlighted' => 1
        ], [
            'date' => 'DESC'
        ]);

        $testimonies = $testimonyRepository->findBy([
            'language' => $languageId,
            'status' => 1,
            'highlighted' => 1
        ], [
            'position' => 'ASC'
        ]);

        $financings = $financingRepository->findBy([
            'language' => $languageId,
            'status' => 1,
            'highlighted' => 1
        ], [
            'position' => 'ASC'
        ]);

        return $this->render('public/home/index.html.twig', [
            'banners' => $banners,
            'productCategories' => $productCategories,
            'allNews' => $allNews,
            'testimonies' => $testimonies,
            'financings' => $financings,
        ]);
    }

    #[Route('/quem-somos', name: 'app_who_we_are')]
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
