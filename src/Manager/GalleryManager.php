<?php

namespace App\Manager;

use App\Entity\Gallery;
use App\Repository\GalleryRepository;
use Doctrine\ORM\EntityManagerInterface;

class GalleryManager extends BaseManager
{
    /**
     * @var GalleryRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * GalleryManager constructor.
     * @param GalleryRepository $repository
     * @param EntityManagerInterface $em
     */
    public function __construct
    (
        GalleryRepository $repository,
        EntityManagerInterface $em
    )
    {
        parent::__construct($repository, $em);
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @param $lang
     * @return Gallery[]
     */
    public function getPhoto($lang)
    {
        $gallery = $this->repository->getPhotos($lang);

        return $gallery;
    }
}
