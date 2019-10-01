<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Team|null find($id, $lockMode = null, $lockVersion = null)
 * @method Team|null findOneBy(array $criteria, array $orderBy = null)
 * @method Team[]    findAll()
 * @method Team[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Team::class);
    }

    /**
     * @param $lang
     * @return Team
     */
    public function getTeam($lang)
    {
        $qb = $this->createQueryBuilder('t')
            ->select('t.id, t.image, t.branch, l.text, l.title')
            ->leftJoin('t.entityLang', 'l')
            ->where("l.lang = :lang")
            ->setParameter('lang', $lang)
            ->getQuery();

        $result = $qb->getResult();

        return $result;
    }
}
