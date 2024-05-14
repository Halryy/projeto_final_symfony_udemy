<?php

namespace App\Controller\Public;

use App\Entity\Enum\LanguageEnum;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LanguageController extends BaseController
{
    #[Route('/idioma/{language}', name: 'app_language')]
    public function index($language): Response
    {
        foreach (LanguageEnum::getAbbreviations() as $index => $abbreviation) {
            if ($index == $language) {
                $this->session->set('language', $language);
                break;
            }
        }
        return $this->redirectToRoute('app_home');
    }
}
