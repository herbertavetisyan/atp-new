<?php

namespace App\Entity;

use App\Entity\Base\BaseEntityVirtual;
use App\Entity\Base\ImageEntity;
use App\Entity\Base\PdfEntity;
use App\Entity\Base\TimestampableEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MagazineRepository")
 * @Vich\Uploadable
 */
class Magazine
{
    use BaseEntityVirtual, TimestampableEntity, PdfEntity, ImageEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\MagazineLang",
     *     mappedBy="magazine",
     *     cascade={"persist", "remove", "refresh", "merge"},
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true
     * )
     * @Serializer\Accessor(setter="setEntityLang")
     */
    public $entityLang;

    /**
     * Country constructor.
     */
    public function __construct()
    {
        $this->entityLang = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * @return ArrayCollection
     */
    public function getEntityLang()
    {
        return $this->entityLang;
    }

    /**
     * @param MagazineLang $entityLang
     */
    public function addEntityLang(MagazineLang $entityLang): void
    {
        $entityLang->setMagazine($this);
        $this->entityLang->set(0, $entityLang);
    }
}
