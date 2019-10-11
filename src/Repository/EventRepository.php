<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * @param $lang
     * @return Event
     */
    public function getHomepageEvents($lang)
    {
        $qb = $this->createQueryBuilder('e')
            ->select('e.id, e.image, e.startDate, e.linkText, l.text, l.title')
            ->leftJoin('e.entityLang', 'l')
            ->where("l.lang = :lang")
            ->andWhere("e.isActive = 1")
            ->setParameter('lang', $lang)
            ->getQuery();

        $result = $qb->getResult();

        return $result;
    }

    /**
     * @param $lang
     * @return Event
     */
    public function getEvents($lang)
    {
        $qb = $this->createQueryBuilder('e')
            ->select('e.id, e.image, e.startDate, e.endDate, e.linkText, e.location, l.text, l.title')
            ->leftJoin('e.entityLang', 'l')
            ->where("l.lang = :lang")
            ->setParameter('lang', $lang)
            ->orderBy('e.startDate', 'DESC')
            ->getQuery();

        $result = $qb->getResult();

        return $result;
    }
}
