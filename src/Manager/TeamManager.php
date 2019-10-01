<?php

namespace App\Manager;

use App\Entity\Team;
use App\Repository\EventRepository;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;

class TeamManager extends BaseManager
{
    /**
     * @var TeamRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * NewsManager constructor.
     * @param TeamRepository $repository
     * @param EntityManagerInterface $em
     */
    public function __construct
    (
        TeamRepository $repository,
        EntityManagerInterface $em
    )
    {
        parent::__construct($repository, $em);
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @param $lang
     * @return Team
     */
    public function getTeamMembers($lang)
    {
        $members = $this->repository->getTeam($lang);
        return $members;
    }
}
