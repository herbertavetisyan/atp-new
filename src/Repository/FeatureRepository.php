<?php

namespace App\Repository;

use App\Entity\Feature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Feature|null find($id, $lockMode = null, $lockVersion = null)
 * @method Feature|null findOneBy(array $criteria, array $orderBy = null)
 * @method Feature[]    findAll()
 * @method Feature[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeatureRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Feature::class);
    }

    /**
     * @param $linkName
     * @param $lang
     * @return mixed
     */
    public function findByLinkName($linkName, $lang)
    {
        $qb = $this->createQueryBuilder("feature");
        $qb
            ->select("feature, entityLang, tags")
            ->leftJoin("feature.entityLang", "entityLang", 'WITH', 'entityLang.lang=:lang')
            ->innerJoin("feature.tag", "tags", 'WITH', 'tags.text=:tag')
            ->setParameter('lang', $lang)
            ->setParameter('tag', $linkName)
            ->setMaxResults(3);
//        dump($qb->getQuery()->getDQL());die();
        return $qb->getQuery()->getResult();
    }

    /**
     * @param $linkName
     * @param $lang
     * @return mixed
     */
    public function findByLinkNameIndex($linkName, $lang)
    {
        $qb = $this->createQueryBuilder("feature");
        $qb
            ->select("feature, entityLang, tags")
            ->leftJoin("feature.entityLang", "entityLang", 'WITH', 'entityLang.lang=:lang')
            ->innerJoin("feature.tag", "tags", 'WITH', 'tags.text=:tag')
            ->setParameter('lang', $lang)
            ->setParameter('tag', $linkName)
            ->setMaxResults(6);

        return $qb->getQuery()->getResult();
    }
}
