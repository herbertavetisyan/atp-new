<?php

namespace App\Repository;

use App\Entity\MagazineLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MagazineLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method MagazineLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method MagazineLang[]    findAll()
 * @method MagazineLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MagazineLangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MagazineLang::class);
    }
}
