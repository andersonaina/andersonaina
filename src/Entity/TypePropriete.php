<?php

namespace App\Entity;

use App\Repository\TypeProprieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: TypeProprieteRepository::class)]
class TypePropriete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleTypePropriete = null;

    #[ORM\OneToMany(mappedBy: 'TypePropriete', targetEntity: Propriete::class)]
    private Collection $proprietes;

    public function __construct()
    {
        $this->proprietes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypePropriete(): ?string
    {
        return $this->LibelleTypePropriete;
    }

    public function setLibelleTypePropriete(string $LibelleTypePropriete): self
    {
        $this->LibelleTypePropriete = $LibelleTypePropriete;

        return $this;
    }

    /**
     * @return Collection<int, Propriete>
     */
    public function getProprietes(): Collection
    {
        return $this->proprietes;
    }

    public function addPropriete(Propriete $propriete): self
    {
        if (!$this->proprietes->contains($propriete)) {
            $this->proprietes->add($propriete);
            $propriete->setTypePropriete($this);
        }

        return $this;
    }

    public function removePropriete(Propriete $propriete): self
    {
        if ($this->proprietes->removeElement($propriete)) {
            // set the owning side to null (unless already changed)
            if ($propriete->getTypePropriete() === $this) {
                $propriete->setTypePropriete(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getLibelleTypePropriete();
    }
}
