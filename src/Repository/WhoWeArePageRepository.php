<?php

namespace App\Repository;

use App\Entity\WhoWeArePage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<WhoWeArePage>
 *
 * @method WhoWeArePage|null find($id, $lockMode = null, $lockVersion = null)
 * @method WhoWeArePage|null findOneBy(array $criteria, array $orderBy = null)
 * @method WhoWeArePage[]    findAll()
 * @method WhoWeArePage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WhoWeArePageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WhoWeArePage::class);
    }

    //    /**
    //     * @return WhoWeArePage[] Returns an array of WhoWeArePage objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('w.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?WhoWeArePage
    //    {
    //        return $this->createQueryBuilder('w')
    //            ->andWhere('w.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
