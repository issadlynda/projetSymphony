<?php

namespace App\Repository;

use App\Entity\RechercheFreelance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RechercheFreelance>
 *
 * @method RechercheFreelance|null find($id, $lockMode = null, $lockVersion = null)
 * @method RechercheFreelance|null findOneBy(array $criteria, array $orderBy = null)
 * @method RechercheFreelance[]    findAll()
 * @method RechercheFreelance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RechercheFreelanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RechercheFreelance::class);
    }

//    /**
//     * @return RechercheFreelance[] Returns an array of RechercheFreelance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RechercheFreelance
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
