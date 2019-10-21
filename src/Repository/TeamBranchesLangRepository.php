<?php

namespace App\Repository;

use App\Entity\TeamBranchesLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TeamBranchesLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamBranchesLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamBranchesLang[]    findAll()
 * @method TeamBranchesLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamBranchesLangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TeamBranchesLang::class);
    }
}
