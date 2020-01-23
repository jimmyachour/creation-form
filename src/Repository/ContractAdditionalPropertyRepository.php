<?php

namespace App\Repository;

use App\Entity\ContractAdditionalProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ContractAdditionalProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContractAdditionalProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContractAdditionalProperty[]    findAll()
 * @method ContractAdditionalProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContractAdditionalPropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContractAdditionalProperty::class);
    }

    // /**
    //  * @return ContractAdditionalProperty[] Returns an array of ContractAdditionalProperty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContractAdditionalProperty
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
