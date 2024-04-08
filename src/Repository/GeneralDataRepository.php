<?php

namespace App\Repository;

use App\Entity\GeneralData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GeneralData>
 *
 * @method GeneralData|null find($id, $lockMode = null, $lockVersion = null)
 * @method GeneralData|null findOneBy(array $criteria, array $orderBy = null)
 * @method GeneralData[]    findAll()
 * @method GeneralData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeneralDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GeneralData::class);
    }

    //    /**
    //     * @return GeneralData[] Returns an array of GeneralData objects
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

    //    public function findOneBySomeField($value): ?GeneralData
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
