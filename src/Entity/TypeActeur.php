<?php

namespace App\Entity;

use App\Repository\TypeActeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeActeurRepository::class)]
class TypeActeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['acteurs_read'])]
    private ?string $NomTypeActeur = null;

    #[ORM\OneToMany(mappedBy: 'TypeActeur', targetEntity: Acteur::class)]
    private Collection $acteurs;

    #[ORM\ManyToMany(targetEntity: Propriete::class, inversedBy: 'typeActeurs')]
    #[Groups(['acteurs_read'])]
    private Collection $Propriete;

    public function __construct()
    {
        $this->acteurs = new ArrayCollection();
        $this->Propriete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeActeur(): ?string
    {
        return $this->NomTypeActeur;
    }

    public function setNomTypeActeur(string $NomTypeActeur): self
    {
        $this->NomTypeActeur = $NomTypeActeur;

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
            $acteur->setTypeActeur($this);
        }

        return $this;
    }

    public function removeActeur(Acteur $acteur): self
    {
        if ($this->acteurs->removeElement($acteur)) {
            // set the owning side to null (unless already changed)
            if ($acteur->getTypeActeur() === $this) {
                $acteur->setTypeActeur(null);
            }
        }

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

    public function __toString(): string
    {
        return $this->NomTypeActeur;
    }
}
