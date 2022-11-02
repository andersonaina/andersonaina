<?php

namespace App\Entity;

use App\Repository\ProprieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProprieteRepository::class)]
class Propriete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['acteurs_read'])]
    private ?string $LibellePropriete = null;

    #[ORM\Column(length: 150, nullable: true)]
    #[Groups(['acteurs_read'])]
    private ?string $LibelleCourtPropriete = null;

    #[ORM\ManyToMany(targetEntity: TypeActeur::class, mappedBy: 'Propriete')]
    private Collection $typeActeurs;

    #[ORM\ManyToOne(inversedBy: 'proprietes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypePropriete $TypePropriete = null;

    #[ORM\ManyToMany(targetEntity: TypePublication::class, mappedBy: 'Propriete')]
    private Collection $typePublications;

    #[ORM\ManyToMany(targetEntity: Acteur::class, mappedBy: 'Propriete')]
    private Collection $acteurs;

    #[ORM\ManyToMany(targetEntity: Publication::class, mappedBy: 'Propriete')]
    private Collection $publications;

    public function __construct()
    {
        $this->typeActeurs = new ArrayCollection();
        $this->typePublications = new ArrayCollection();
        $this->acteurs = new ArrayCollection();
        $this->publications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePropriete(): ?string
    {
        return $this->LibellePropriete;
    }

    public function setLibellePropriete(string $LibellePropriete): self
    {
        $this->LibellePropriete = $LibellePropriete;

        return $this;
    }

    public function getLibelleCourtPropriete(): ?string
    {
        return $this->LibelleCourtPropriete;
    }

    public function setLibelleCourtPropriete(?string $LibelleCourtPropriete): self
    {
        $this->LibelleCourtPropriete = $LibelleCourtPropriete;

        return $this;
    }

    /**
     * @return Collection<int, TypeActeur>
     */
    public function getTypeActeurs(): Collection
    {
        return $this->typeActeurs;
    }

    public function addTypeActeur(TypeActeur $typeActeur): self
    {
        if (!$this->typeActeurs->contains($typeActeur)) {
            $this->typeActeurs->add($typeActeur);
            $typeActeur->addPropriete($this);
        }

        return $this;
    }

    public function removeTypeActeur(TypeActeur $typeActeur): self
    {
        if ($this->typeActeurs->removeElement($typeActeur)) {
            $typeActeur->removePropriete($this);
        }

        return $this;
    }

    public function getTypePropriete(): ?TypePropriete
    {
        return $this->TypePropriete;
    }

    public function setTypePropriete(?TypePropriete $TypePropriete): self
    {
        $this->TypePropriete = $TypePropriete;

        return $this;
    }

    /**
     * @return Collection<int, TypePublication>
     */
    public function getTypePublications(): Collection
    {
        return $this->typePublications;
    }

    public function addTypePublication(TypePublication $typePublication): self
    {
        if (!$this->typePublications->contains($typePublication)) {
            $this->typePublications->add($typePublication);
            $typePublication->addPropriete($this);
        }

        return $this;
    }

    public function removeTypePublication(TypePublication $typePublication): self
    {
        if ($this->typePublications->removeElement($typePublication)) {
            $typePublication->removePropriete($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Acteur>
     */
    public function getActeurs(): Collection
    {
        return $this->acteurs;
    }

    public function addActeur(Acteur $acteur): self
    {
        if (!$this->acteurs->contains($acteur)) {
            $this->acteurs->add($acteur);
            $acteur->addPropriete($this);
        }

        return $this;
    }

    public function removeActeur(Acteur $acteur): self
    {
        if ($this->acteurs->removeElement($acteur)) {
            $acteur->removePropriete($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Publication>
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications->add($publication);
            $publication->addPropriete($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->removeElement($publication)) {
            $publication->removePropriete($this);
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getLibellePropriete();
    }
}
