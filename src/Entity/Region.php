<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomRegion = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $LongitudeRegion = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $LatitudeRegion = null;

    #[ORM\ManyToOne(inversedBy: 'regions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pays $Pays = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRegion(): ?string
    {
        return $this->NomRegion;
    }

    public function setNomRegion(string $NomRegion): self
    {
        $this->NomRegion = $NomRegion;

        return $this;
    }

    public function getLongitudeRegion(): ?string
    {
        return $this->LongitudeRegion;
    }

    public function setLongitudeRegion(?string $LongitudeRegion): self
    {
        $this->LongitudeRegion = $LongitudeRegion;

        return $this;
    }

    public function getLatitudeRegion(): ?string
    {
        return $this->LatitudeRegion;
    }

    public function setLatitudeRegion(?string $LatitudeRegion): self
    {
        $this->LatitudeRegion = $LatitudeRegion;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->Pays;
    }

    public function setPays(?Pays $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }
}
