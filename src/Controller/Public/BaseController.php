<?php

namespace App\Controller\Public;

use App\Entity\Enum\LanguageEnum;
use App\Repository\ContactFormUrlPostRepository;
use App\Repository\GeneralDataRepository;
use App\Repository\GlobalTagsRepository;
use App\Repository\PageSeoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Translation\LocaleSwitcher;

class BaseController extends AbstractController
{
    protected $session;
    protected $pageSeo;
    protected $languageId;
    protected $generalData;
    protected $globalTags;
    protected $urlToPostForm;
    public function __construct(
        private LocaleSwitcher $localeSwitcher,
        private PageSeoRepository $pageSeoRepository,
        private GlobalTagsRepository $globalTagsRepository,
        private GeneralDataRepository $generalDataRepository,
        private ContactFormUrlPostRepository $contactFormUrlPostRepository
    ){
        $this->session = new Session();

        if ($this->session->has('language')) {
            $this->localeSwitcher->setLocale($this->session->get('language'));
        } else {
            $this->session->set('language', 'pt');
            $this->localeSwitcher->setLocale('pt');
        }

        $this->languageId = LanguageEnum::getId($this->session->get('language'));
        $this->pageSeo = $pageSeoRepository->findOneBy(['language' => $this->languageId]);

        $allGeneralData = $generalDataRepository->findAll();
        $this->generalData = end($allGeneralData);

        $allGlobalTags = $globalTagsRepository->findAll();
        $this->globalTags = end($allGlobalTags);

        $allContact = $contactFormUrlPostRepository->findAll();
        $this->urlToPostForm = end($allContact);
    }

    public function getLanguageId()
    {
        return $this->languageId;
    }
}
