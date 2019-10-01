<?php

namespace App\Repository;

use App\Entity\BranchesLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BranchesLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method BranchesLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method BranchesLang[]    findAll()
 * @method BranchesLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BranchesLangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BranchesLang::class);
    }

    // /**
    //  * @return BranchesLang[] Returns an array of BranchesLang objects
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
    public function findOneBySomeField($value): ?BranchesLang
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
