<?php

namespace App\Command;

use App\Entity\ContactFormUrlPost;
use App\Entity\Enum\LanguageEnum;
use App\Entity\GeneralData;
use App\Entity\GlobalTags;
use App\Entity\PageSeo;
use App\Entity\User;
use App\Entity\WhoWeArePage;
use App\Repository\ContactFormUrlPostRepository;
use App\Repository\GeneralDataRepository;
use App\Repository\GlobalTagsRepository;
use App\Repository\PageSeoRepository;
use App\Repository\UserRepository;
use App\Repository\WhoWeArePageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-sample-data',
    description: 'Criar dados iniciais para o sistema',
)]
class CreateSampleDataCommand extends Command
{
    public function __construct(
        private GeneralDataRepository $generalDataRepository,
        private PageSeoRepository $pageSeoRepository,
        private GlobalTagsRepository $globalTagsRepository,
        private ContactFormUrlPostRepository $contactFormUrlPostRepository,
        private WhoWeArePageRepository $whoWeArePageRepository,
        private UserRepository $userRepository,
        private UserPasswordHasherInterface $passwordHasher,
        private EntityManagerInterface $entityManager
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        foreach (LanguageEnum::getOptions() as $index => $option)
        {
            $pageSeo = $this->pageSeoRepository->findOneBy(['language' => $option]);
            if ($pageSeo)
            {
                $io->writeln('Page SEO em '.$index.' <comment>já existe</comment>');
            } else {
                $io->writeln('Page SEO em '.$index.' <info>criado</info>');
                $pageSeo = new PageSeo();
                $pageSeo->setHomePageTitle('Título da página home');
                $pageSeo->setHomePageDescription('Descrição da página home');
                $pageSeo->setAboutUsPageTitle('Título da página sobre nós');
                $pageSeo->setAboutUsPageDescription('Descrição da página sobre nós');
                $pageSeo->setProductListingPageTitle('Título da página de lista de produtos');
                $pageSeo->setProductListingPageDescription('Descrição da página de lista de produtos');
                $pageSeo->setNewsListingPageTitle('Título da página de lista de notícias');
                $pageSeo->setNewsListingPageDescription('Descrição da página de lista de notícias');
                $pageSeo->setServiceListingPageTitle('Título da página de lista de serviços');
                $pageSeo->setServiceListingPageDescription('Descrição da página de lista de serviços');
                $pageSeo->setFinancingListPageTitle('Título da página de lista de financiamentos');
                $pageSeo->setFinancingListPageDescription('Descrição da página de lista de financiamentos');
                $pageSeo->setVideoListingPageTitle('Título da página de lista de vídeos');
                $pageSeo->setVideoListingPageDescription('Descrição da página de lista de vídeos');
                $pageSeo->setLanguage($option);

                $this->entityManager->persist($pageSeo);
                $this->entityManager->flush();
            }
        }

        foreach (LanguageEnum::getOptions() as $index => $option)
        {
            $whoWeArePage = $this->whoWeArePageRepository->findOneBy(['language' => $option]);
            if ($whoWeArePage)
            {
                $io->writeln('Quem somos em '.$index.' <comment>já existe</comment>');
            } else {
                $io->writeln('Quem somos em '.$index.' <info>criado</info>');
                $whoWeArePage = new WhoWeArePage();
                $whoWeArePage->setPresentationPart1('part1');
                $whoWeArePage->setPresentationPart2('part2');
                $whoWeArePage->setPresentationPart3('part3');
                $whoWeArePage->setLanguage($option);

                $this->entityManager->persist($whoWeArePage);
                $this->entityManager->flush();
            }
        }

        $globalTags = $this->globalTagsRepository->findAll();
        if ($globalTags)
        {
            $io->writeln('Tags globais <comment>já existem</comment>');
        } else {
            $io->writeln('Tags globais <info>criadas</info>');
            $globalTags = new GlobalTags();
            $globalTags->setGa4('GA4');
            $globalTags->setPixelMetaAds('Meta pixel ads');
            $globalTags->setTagsGoogleAds('Google ads');

            $this->entityManager->persist($globalTags);
            $this->entityManager->flush();
        }

        $generalData = $this->generalDataRepository->find(1);
        if ($generalData)
        {
            $io->writeln('Dados gerais <comment>já existem</comment>');
        } else {
            $io->writeln('Dados gerais <info>criados</info>');
            $generalData = new GeneralData();
            $generalData->setEmail('email@dominio.com.br');
            $generalData->setAddress('Rua X, 123');
            $generalData->setPhone('(11) 3333-2222');

            $this->entityManager->persist($generalData);
            $this->entityManager->flush();
        }

        $contactForm = $this->contactFormUrlPostRepository->findAll();
        if ($contactForm)
        {
            $io->writeln('URL de postagem <comment>já existe</comment>');
        } else {
            $io->writeln('URL de postagem <info>criado</info>');
            $contactForm = new ContactFormUrlPost();
            $contactForm->setUrl('https://www.teste.com.br');

            $this->entityManager->persist($contactForm);
            $this->entityManager->flush();
        }

        $admin = $this->userRepository->findAll();
        if ($admin)
        {
            $io->writeln('Admin <comment>já existe</comment>');
        } else {
            $io->writeln('Admin <info>criado</info>');

            $user = new User();
            $plaintextPassword = "halry102030";

            $hashedPassword = $this->passwordHasher->hashPassword($user, $plaintextPassword);
            $user->setEmail('halryhenry2004@gmail.com');
            $user->setPassword($hashedPassword);
            $user->setRoles(["ROLE_ADMIN"]);

            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        $io->success('Dados injetados com sucesso.');

        return Command::SUCCESS;
    }
}
