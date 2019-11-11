<?php

namespace App\Manager;

use App\Entity\Feature;
use App\Repository\FeatureRepository;
use App\Repository\MagazineRepository;
use Doctrine\ORM\EntityManagerInterface;

class MagazineManager extends BaseManager
{
    /**
     * @var MagazineRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * FeatureManager constructor.
     * @param MagazineRepository $repository
     * @param EntityManagerInterface $em
     */
    public function __construct
    (
        MagazineRepository $repository,
        EntityManagerInterface $em
    )
    {
        parent::__construct($repository, $em);
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @return Feature
     */
    public function create()
    {
        return new Feature();
    }

    /**
     * @param $linkName
     * @return mixed
     */
    public function getMagazine($linkName)
    {
//        return $this->repository->findByLinkName($linkName);
    }
}
