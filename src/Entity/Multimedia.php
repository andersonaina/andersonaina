<?php

namespace App\Entity;

use App\Repository\MultimediaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MultimediaRepository::class)]
class Multimedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomMultimedia = null;

    #[ORM\Column(length: 255)]
    private ?string $CheminMultimedia = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $DescriptionMultimedia = null;

    #[ORM\ManyToOne(inversedBy: 'Multimedia')]
    private ?Publication $publication = null;

    #[ORM\ManyToOne(inversedBy: 'multimedia')]
    private ?TypeMultimedia $TypeMultimedia = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMultimedia(): ?string
    {
        return $this->NomMultimedia;
    }

    public function setNomMultimedia(string $NomMultimedia): self
    {
        $this->NomMultimedia = $NomMultimedia;

        return $this;
    }

    public function getCheminMultimedia(): ?string
    {
        return $this->CheminMultimedia;
    }

    public function setCheminMultimedia(string $CheminMultimedia): self
    {
        $this->CheminMultimedia = $CheminMultimedia;

        return $this;
    }

    public function getDescriptionMultimedia(): ?string
    {
        return $this->DescriptionMultimedia;
    }

    public function setDescriptionMultimedia(?string $DescriptionMultimedia): self
    {
        $this->DescriptionMultimedia = $DescriptionMultimedia;

        return $this;
    }

    public function getPublication(): ?Publication
    {
        return $this->publication;
    }

    public function setPublication(?Publication $publication): self
    {
        $this->publication = $publication;

        return $this;
    }

    public function getTypeMultimedia(): ?TypeMultimedia
    {
        return $this->TypeMultimedia;
    }

    public function setTypeMultimedia(?TypeMultimedia $TypeMultimedia): self
    {
        $this->TypeMultimedia = $TypeMultimedia;

        return $this;
    }
}
