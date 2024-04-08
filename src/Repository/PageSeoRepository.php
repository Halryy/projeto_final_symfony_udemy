<?php

namespace App\Repository;

use App\Entity\PageSeo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PageSeo>
 *
 * @method PageSeo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageSeo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageSeo[]    findAll()
 * @method PageSeo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageSeoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageSeo::class);
    }

    //    /**
    //     * @return PageSeo[] Returns an array of PageSeo objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?PageSeo
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
