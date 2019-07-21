<?php

namespace App\Repository;

use App\Entity\Ur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ur[]    findAll()
 * @method Ur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UrRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ur::class);
    }


    // /**
    //  * @return Ur[] Returns an array of Ur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
