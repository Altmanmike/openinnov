<?php

namespace App\Repository;

use App\Entity\SavingsGoals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SavingsGoals>
 *
 * @method SavingsGoals|null find($id, $lockMode = null, $lockVersion = null)
 * @method SavingsGoals|null findOneBy(array $criteria, array $orderBy = null)
 * @method SavingsGoals[]    findAll()
 * @method SavingsGoals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SavingsGoalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SavingsGoals::class);
    }

//    /**
//     * @return SavingsGoals[] Returns an array of SavingsGoals objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SavingsGoals
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
