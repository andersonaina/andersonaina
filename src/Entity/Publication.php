<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibellePublication = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DatePublication = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeurePublication = null;

    #[ORM\ManyToOne(inversedBy: 'Publication')]
    private ?Acteur $acteur = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypePublication $TypePublication = null;

    #[ORM\ManyToMany(targetEntity: Propriete::class, inversedBy: 'publications')]
    private Collection $Propriete;

    #[ORM\OneToMany(mappedBy: 'publication', targetEntity: Multimedia::class)]
    private Collection $Multimedia;

    public function __construct()
    {
        $this->Propriete = new ArrayCollection();
        $this->Multimedia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePublication(): ?string
    {
        return $this->LibellePublication;
    }

    public function setLibellePublication(string $LibellePublication): self
    {
        $this->LibellePublication = $LibellePublication;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->DatePublication;
    }

    public function setDatePublication(\DateTimeInterface $DatePublication): self
    {
        $this->DatePublication = $DatePublication;

        return $this;
    }

    public function getHeurePublication(): ?\DateTimeInterface
    {
        return $this->HeurePublication;
    }

    public function setHeurePublication(\DateTimeInterface $HeurePublication): self
    {
        $this->HeurePublication = $HeurePublication;

        return $this;
    }

    public function getActeur(): ?Acteur
    {
        return $this->acteur;
    }

    public function setActeur(?Acteur $acteur): self
    {
        $this->acteur = $acteur;

        return $this;
    }

    public function getTypePublication(): ?TypePublication
    {
        return $this->TypePublication;
    }

    public function setTypePublication(?TypePublication $TypePublication): self
    {
        $this->TypePublication = $TypePublication;

        return $this;
    }

    /**
     * @return Collection<int, Propriete>
     */
    public function getPropriete(): Collection
    {
        return $this->Propriete;
    }

    public function addPropriete(Propriete $propriete): self
    {
        if (!$this->Propriete->contains($propriete)) {
            $this->Propriete->add($propriete);
        }

        return $this;
    }

    public function removePropriete(Propriete $propriete): self
    {
        $this->Propriete->removeElement($propriete);

        return $this;
    }

    /**
     * @return Collection<int, Multimedia>
     */
    public function getMultimedia(): Collection
    {
        return $this->Multimedia;
    }

    public function addMultimedia(Multimedia $multimedia): self
    {
        if (!$this->Multimedia->contains($multimedia)) {
            $this->Multimedia->add($multimedia);
            $multimedia->setPublication($this);
        }

        return $this;
    }

    public function removeMultimedia(Multimedia $multimedia): self
    {
        if ($this->Multimedia->removeElement($multimedia)) {
            // set the owning side to null (unless already changed)
            if ($multimedia->getPublication() === $this) {
                $multimedia->setPublication(null);
            }
        }

        return $this;
    }
}
