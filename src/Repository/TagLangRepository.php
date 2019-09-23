<?php

namespace App\Repository;

use App\Entity\TagLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TagLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagLang[]    findAll()
 * @method TagLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagLangRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TagLang::class);
    }
}
