<?php

namespace App\Repository;

use App\Entity\GlobalTags;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GlobalTags>
 *
 * @method GlobalTags|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlobalTags|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlobalTags[]    findAll()
 * @method GlobalTags[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlobalTagsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GlobalTags::class);
    }

    //    /**
    //     * @return GlobalTags[] Returns an array of GlobalTags objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?GlobalTags
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
