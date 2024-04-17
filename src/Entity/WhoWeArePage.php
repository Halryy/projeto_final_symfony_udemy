<?php

namespace App\Entity;

use App\Repository\WhoWeArePageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WhoWeArePageRepository::class)]
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
}
