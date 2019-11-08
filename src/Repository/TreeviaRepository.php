<?php

namespace App\Repository;

use App\Entity\Treevia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Treevia|null find($id, $lockMode = null, $lockVersion = null)
 * @method Treevia|null findOneBy(array $criteria, array $orderBy = null)
 * @method Treevia[]    findAll()
 * @method Treevia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TreeviaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Treevia::class);
    }

    // /**
    //  * @return Treevia[] Returns an array of Treevia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Treevia
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
