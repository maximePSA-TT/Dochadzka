<?php

namespace App\Repository;

use App\Entity\CalendarEntity\DaySchedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Types\Type;
use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\CalendarEntity\Ur;

/**
 * @method DaySchedule|null find($id, $lockMode = null, $lockVersion = null)
 * @method DaySchedule|null findOneBy(array $criteria, array $orderBy = null)
 * @method DaySchedule[]    findAll()
 * @method DaySchedule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DayScheduleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DaySchedule::class);
    }


    /**
    * @return DaySchedule[] Returns an array of DaySchedule objects
    */
    public function findShifts(\DateTimeInterface $firstDay, \DateTimeInterface $lastDay,$urId)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.date BETWEEN :firstDay AND :lastDay')
            ->andWhere('v.ur = :urId')
            ->setParameter('firstDay', $firstDay, Type::DATE)
            ->setParameter('lastDay', $lastDay, Type::DATE)
            ->setParameter('urId', $urId)
            ->orderBy('v.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Vocabulary
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
