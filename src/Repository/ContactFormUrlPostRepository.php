<?php

namespace App\Repository;

use App\Entity\ContactFormUrlPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactFormUrlPost>
 *
 * @method ContactFormUrlPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactFormUrlPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactFormUrlPost[]    findAll()
 * @method ContactFormUrlPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactFormUrlPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactFormUrlPost::class);
    }

    //    /**
    //     * @return ContactFormUrlPost[] Returns an array of ContactFormUrlPost objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ContactFormUrlPost
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
