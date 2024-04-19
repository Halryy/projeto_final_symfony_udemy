<?php

namespace App\Entity;

use App\Repository\WhoWeArePageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: WhoWeArePageRepository::class)]
#[Vich\Uploadable()]
class WhoWeArePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPart1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPart2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentationPart3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $youtubeVideoCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image1 = null;

    #[Vich\UploadableField(mapping: 'whoWeAreImage', fileNameProperty: 'image1')]
    private ?File $imageFile1 = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imgUpdatedAt1= null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image2 = null;

    #[Vich\UploadableField(mapping: 'whoWeAreImage', fileNameProperty: 'image2')]
    private ?File $imageFile2 = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imgUpdatedAt2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image3 = null;

    #[Vich\UploadableField(mapping: 'whoWeAreImage', fileNameProperty: 'image2')]
    private ?File $imageFile3 = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $imgUpdatedAt3 = null;
    #[ORM\Column(nullable: true)]
    private ?int $language = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresentationPart1(): ?string
    {
        return $this->presentationPart1;
    }

    public function setPresentationPart1(?string $presentationPart1): static
    {
        $this->presentationPart1 = $presentationPart1;

        return $this;
    }

    public function getPresentationPart2(): ?string
    {
        return $this->presentationPart2;
    }

    public function setPresentationPart2(?string $presentationPart2): static
    {
        $this->presentationPart2 = $presentationPart2;

        return $this;
    }

    public function getPresentationPart3(): ?string
    {
        return $this->presentationPart3;
    }

    public function setPresentationPart3(?string $presentationPart3): static
    {
        $this->presentationPart3 = $presentationPart3;

        return $this;
    }

    public function getYoutubeVideoCode(): ?string
    {
        return $this->youtubeVideoCode;
    }

    public function setYoutubeVideoCode(?string $youtubeVideoCode): static
    {
        $this->youtubeVideoCode = $youtubeVideoCode;

        return $this;
    }

    public function getLanguage(): ?int
    {
        return $this->language;
    }

    public function setLanguage(?int $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): static
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImageFile1(): ?File
    {
        return $this->imageFile1;
    }

    public function setImageFile1(?File $imageFile1): void
    {
        $this->imageFile1 = $imageFile1;
        if (null !== $imageFile1) {
            $this->imgUpdatedAt1 = new \DateTimeImmutable();
        }
    }

    public function getImgUpdatedAt1(): ?\DateTimeImmutable
    {
        return $this->imgUpdatedAt1;
    }

    public function setImgUpdatedAt1(?\DateTimeImmutable $imgUpdatedAt1): void
    {
        $this->imgUpdatedAt1 = $imgUpdatedAt1;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): static
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImageFile2(): ?File
    {
        return $this->imageFile2;
    }

    public function setImageFile2(?File $imageFile2): void
    {
        $this->imageFile2 = $imageFile2;
        if (null !== $imageFile2) {
            $this->imgUpdatedAt2 = new \DateTimeImmutable();
        }
    }

    public function getImgUpdatedAt2(): ?\DateTimeImmutable
    {
        return $this->imgUpdatedAt2;
    }

    public function setImgUpdatedAt2(?\DateTimeImmutable $imgUpdatedAt2): void
    {
        $this->imgUpdatedAt2 = $imgUpdatedAt2;
    }
    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): static
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImageFile3(): ?File
    {
        return $this->imageFile3;
    }

    public function setImageFile3(?File $imageFile3): void
    {
        $this->imageFile3 = $imageFile3;
        if (null !== $imageFile3) {
            $this->imgUpdatedAt3 = new \DateTimeImmutable();
        }
    }

    public function getImgUpdatedAt3(): ?\DateTimeImmutable
    {
        return $this->imgUpdatedAt3;
    }

    public function setImgUpdatedAt3(?\DateTimeImmutable $imgUpdatedAt3): void
    {
        $this->imgUpdatedAt3 = $imgUpdatedAt3;
    }
}
