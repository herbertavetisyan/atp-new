<?php

namespace App\Entity;

use App\Entity\Base\BaseVirtual;
use App\Entity\Base\ImageEntity;
use App\Entity\Base\TimestampableEntity;
use App\Entity\Base\TitleEntityVirtual;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FeatureRepository")
 * @ORM\Table(name="features")
 * @Vich\Uploadable
 */
class Feature
{
    use TitleEntityVirtual, ImageEntity, TimestampableEntity, BaseVirtual;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $linkType;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\FeatureLang",
     *     mappedBy="feature",
     *     cascade={"persist", "remove"},
     *     fetch="EXTRA_LAZY",
     *     orphanRemoval=true
     * )
     */
    public $entityLang;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag")
     */
    public $tag;

    public function __construct()
    {
        $this->entityLang = new ArrayCollection();
        $this->tag = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    public function getLinkType()
    {
        return $this->linkType;
    }

    public function setLinkType( $linkType)
    {
        $this->linkType = $linkType;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @return ArrayCollection
     */
    public function getEntityLang()
    {
        return $this->entityLang;
    }

    /**
     * @param FeatureLang $entityLang
     */
    public function addEntityLang(FeatureLang $entityLang): void
    {
        $entityLang->setFeature($this);
        $this->entityLang->set(0, $entityLang);
    }
}
