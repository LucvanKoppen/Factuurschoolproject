<?php

namespace App\Repository;

use App\Entity\FactuurProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FactuurProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactuurProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactuurProduct[]    findAll()
 * @method FactuurProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactuurProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactuurProduct::class);
    }

    // /**
    //  * @return FactuurProduct[] Returns an array of FactuurProduct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FactuurProduct
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
