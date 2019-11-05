<?php

namespace App\Entity\Base;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Trait PdfEntity
 * @package App\Entity\Base
 * @Vich\Uploadable
 */
trait PdfEntity
{
    /**
     * @ORM\Column(type="string", length=256, nullable=true)
     * @var string
     */
    private $pdfHy;

    /**
     * @Vich\UploadableField(mapping="news_pdf", fileNameProperty="pdfHy")
     * @var File
     */
    private $pdfFileHy;

    /**
     * @ORM\Column(type="string", length=256, nullable=true)
     * @var string
     */
    private $pdfEn;

    /**
     * @Vich\UploadableField(mapping="news_pdf", fileNameProperty="pdfEn")
     * @var File
     */
    private $pdfFileEn;

    public function getPdfHy()
    {
        return $this->pdfHy;
    }

    public function setPdfHy($pdfHy)
    {
        $this->pdfHy = $pdfHy;

        return $this;
    }

    public function setPdfFileHy(File $pdfHy = null)
    {
        $this->pdfFileHy = $pdfHy;

        if ($pdfHy) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getPdfFileHy()
    {
        return $this->pdfFileHy;
    }

    public function getPdfEn()
    {
        return $this->pdfEn;
    }

    public function setPdfEn($pdfEn)
    {
        $this->pdfEn = $pdfEn;

        return $this;
    }

    public function setPdfFileEn(File $pdfEn = null)
    {
        $this->pdfFileEn = $pdfEn;

        if ($pdfEn) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getPdfFileEn()
    {
        return $this->pdfFileEn;
    }
}