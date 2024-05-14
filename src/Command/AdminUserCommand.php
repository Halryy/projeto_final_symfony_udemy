<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
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
    name: 'app:admin-user',
    description: 'Adicionar um usuário administrador',
)]
class AdminUserCommand extends Command
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher,
        private EntityManagerInterface $em,
        private UserRepository $userRepository,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'E-mail')
            ->addArgument('arg2', InputArgument::OPTIONAL, 'Senha')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $userEmail = 'admin2@gmail.com';
        $pass = '12345678';

        $arg1 = $input->getArgument('arg1');
        if ($arg1) {
            $userEmail = $arg1;
        }

        $arg2 = $input->getArgument('arg2');
        if ($arg2) {
            $pass = $arg2;
        }


        $user =  new User();
        $user->setEmail($userEmail);
        $user->setRoles(['ROLE_ADMIN']);
        $passHash = $this->userPasswordHasher->hashPassword($user, $pass);
        $user->setPassword($passHash);
        $this->em->persist($user);
        $this->em->flush();

        $io->writeln('Usuário criado com sucesso');
        $io->writeln('E-Mail: '.$user->getEmail());
        $io->writeln('Senha: '.$pass);
        $io->writeln('Senha Hash: '.$passHash);
        $io->writeln('Role [\'ROLE_ADMIN\']');



        $io->success('Seu admin foi criado com sucesso');

        return Command::SUCCESS;
    }
}
