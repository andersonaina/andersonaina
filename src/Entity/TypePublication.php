<?php

namespace App\Entity;

use App\Repository\TypePublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypePublicationRepository::class)]
class TypePublication
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleTypePublication = null;

    #[ORM\OneToMany(mappedBy: 'TypePublication', targetEntity: Publication::class)]
    private Collection $publications;

    #[ORM\ManyToMany(targetEntity: Propriete::class, inversedBy: 'typePublications')]
    private Collection $Propriete;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->Propriete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypePublication(): ?string
    {
        return $this->LibelleTypePublication;
    }

    public function setLibelleTypePublication(string $LibelleTypePublication): self
    {
        $this->LibelleTypePublication = $LibelleTypePublication;

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
            $publication->setTypePublication($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getTypePublication() === $this) {
                $publication->setTypePublication(null);
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
        return $this->getLibelleTypePublication();
    }
}
