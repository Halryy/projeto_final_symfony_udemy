<?php

namespace App\Controller\Public;

use App\Entity\Enum\LanguageEnum;
use App\Repository\BannerRepository;
use App\Repository\FinancingRepository;
use App\Repository\NewsRepository;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
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
        $banners = $bannerRepository->findBy(
            [
                'language' => $this->getLanguageId(),
                'active' => 1
            ],
            [
                'position' => 'ASC'
            ]
        );

        $productCategories = $productCategoryRepository->findBy([
            'language' => $this->getLanguageId(),
        ]);

        $allNews = $newsRepository->findBy([
           'language' => $this->getLanguageId(),
            'status' => 1,
            'highlighted' => 1
        ], [
            'date' => 'DESC'
        ]);

        $testimonies = $testimonyRepository->findBy([
            'language' => $this->getLanguageId(),
            'status' => 1,
            'highlighted' => 1
        ], [
            'position' => 'ASC'
        ]);

        $financings = $financingRepository->findBy([
            'language' => $this->getLanguageId(),
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
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm
        ]);
    }

    #[Route('/quem-somos', name: 'app_who_we_are')]
    public function whoWeAre(): Response
    {
        return $this->render('public/who_we_are/who_we_are.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm
        ]);
    }

    #[Route('/noticias', name: 'app_news')]
    public function news(NewsRepository $newsRepository): Response
    {
        $allNews = $newsRepository->findBy([
            'language' => $this->getLanguageId(),
            'status' => 1,
            'highlighted' => 1
        ], [
            'date' => 'DESC'
        ]);

        return $this->render('public/news/news.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm,
            'allNews' => $allNews,
        ]);
    }

    #[Route('/noticia/{slug}', name: 'app_new_detail')]
    public function new($slug, NewsRepository $newsRepository): Response
    {
        $news = $newsRepository->findOneBy(['slug' => $slug]);
        return $this->render('public/news/news-detail.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm,
            'news' => $news,
        ]);
    }

    #[Route('/produtos', name: 'app_products')]
    public function products(ProductRepository $productRepository): Response
    {
        $allProducts = $productRepository->findBy([
            'status' => 1,
            'language' => $this->getLanguageId(),
        ]);
        return $this->render('public/product/products.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm,
            'allProducts' => $allProducts,
        ]);
    }

    #[Route('/produto/{slug}', name: 'app_product_detail')]
    public function product($slug, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(['slug' => $slug]);
        return $this->render('public/product/product-detail.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm,
            'product' => $product,
        ]);
    }

    #[Route('/financiamentos', name: 'app_financing')]
    public function financing(): Response
    {
        return $this->render('public/financing/financing.html.twig', [
            'pageSeo' => $this->pageSeo,
            'generalData' => $this->generalData,
            'globalTags' => $this->globalTags,
            'urlToPostForm' => $this->urlToPostForm
        ]);
    }
}
