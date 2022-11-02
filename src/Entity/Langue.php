<?php

namespace App\Entity;

use App\Repository\LangueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LangueRepository::class)]
class Langue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleLangue = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $CodificationLangue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleLangue(): ?string
    {
        return $this->LibelleLangue;
    }

    public function setLibelleLangue(string $LibelleLangue): self
    {
        $this->LibelleLangue = $LibelleLangue;

        return $this;
    }

    public function getCodificationLangue(): ?string
    {
        return $this->CodificationLangue;
    }

    public function setCodificationLangue(?string $CodificationLangue): self
    {
        $this->CodificationLangue = $CodificationLangue;

        return $this;
    }
}
