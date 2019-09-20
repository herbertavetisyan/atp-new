<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\Base\LangEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MagazineLangRepository")
 * @ORM\Table(name="magazineLang")
 */
class MagazineLang
{
    use BaseEntity, LangEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Magazine
     * @ORM\ManyToOne(targetEntity="App\Entity\Magazine", inversedBy="entityLang", cascade={"persist"})
     */
    private $magazine;

    /**
     * @ORM\Column(type="string", nullable=true, length=2)
     */
    private $lang;

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

    /**
     * @return Magazine
     */
    public function getMagazine()
    {
        return $this->magazine;
    }

    /**
     * @param Magazine $magazine
     */
    public function setMagazine(Magazine $magazine): void
    {
        $this->magazine = $magazine;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param mixed $lang
     */
    public function setLang($lang): void
    {
        $this->lang = $lang;
    }
}
