<?php

namespace App\Entity;

use App\Entity\Base\BaseEntityVirtual;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Base\ImageEntity;
use App\Entity\Base\TimestampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 * @ORM\Table(name="teams")
 * @Vich\Uploadable
 */
class Team
{
    use BaseEntityVirtual, ImageEntity, TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $branch;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $branchType;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\TeamLang",
     *     mappedBy="team",
     *     cascade={"persist", "remove", "refresh", "merge"},
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true
     * )
     */
    public $entityLang;

    public function __construct()
    {
        $this->entityLang = new ArrayCollection();
        $this->branches = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param mixed $branch
     */
    public function setBranch($branch): void
    {
        $this->branch = $branch;
    }

    /**
     * @return mixed
     */
    public function getBranchType()
    {
        return $this->branchType;
    }

    /**
     * @param mixed $branchType
     */
    public function setBranchType($branchType): void
    {
        $this->branchType = $branchType;
    }

    /**
     * @return ArrayCollection
     */
    public function getEntityLang()
    {
        return $this->entityLang;
    }

    /**
     * @param TeamLang $entityLang
     */
    public function addEntityLang(TeamLang $entityLang): void
    {
        $entityLang->setTeam($this);
        $this->entityLang->set(0, $entityLang);
    }
}
