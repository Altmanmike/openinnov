<?php

namespace App\Repository;

use App\Entity\Budgets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Budgets>
 *
 * @method Budgets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Budgets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Budgets[]    findAll()
 * @method Budgets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BudgetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Budgets::class);
    }

//    /**
//     * @return Budgets[] Returns an array of Budgets objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Budgets
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
