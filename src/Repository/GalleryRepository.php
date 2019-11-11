<?php

namespace App\Repository;

use App\Entity\Gallery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gallery|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gallery|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gallery[]    findAll()
 * @method Gallery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GalleryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gallery::class);
    }

    /**
     * @param $lang
     * @return Gallery
     */
    public function getPhotos($lang)
    {
        $qb = $this->createQueryBuilder('g')
            ->select('g', 'l', 'i')
            ->leftJoin('g.entityLang', 'l')
            ->leftJoin('g.images', 'i')
            ->where("l.lang = :lang")
            ->setParameter('lang', $lang)
            ->orderBy('DESC')
        ->getQuery();

        $result = $qb->getResult();

        return $result;
    }
}
