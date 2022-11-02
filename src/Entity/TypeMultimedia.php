<?php

namespace App\Entity;

use App\Repository\TypeMultimediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;

#[ORM\Entity(repositoryClass: TypeMultimediaRepository::class)]
class TypeMultimedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibelleTypeMultimedia = null;

    #[ORM\OneToMany(mappedBy: 'TypeMultimedia', targetEntity: Multimedia::class)]
    private Collection $multimedia;

    #[Pure]
    public function __construct()
    {
        $this->multimedia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleTypeMultimedia(): ?string
    {
        return $this->LibelleTypeMultimedia;
    }

    public function setLibelleTypeMultimedia(string $LibelleTypeMultimedia): self
    {
        $this->LibelleTypeMultimedia = $LibelleTypeMultimedia;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getLibelleTypeMultimedia();
    }

    /**
     * @return Collection<int, Multimedia>
     */
    public function getMultimedia(): Collection
    {
        return $this->multimedia;
    }

    public function addMultimedia(Multimedia $multimedia): self
    {
        if (!$this->multimedia->contains($multimedia)) {
            $this->multimedia->add($multimedia);
            $multimedia->setTypeMultimedia($this);
        }

        return $this;
    }

    public function removeMultimedia(Multimedia $multimedia): self
    {
        if ($this->multimedia->removeElement($multimedia)) {
            // set the owning side to null (unless already changed)
            if ($multimedia->getTypeMultimedia() === $this) {
                $multimedia->setTypeMultimedia(null);
            }
        }

        return $this;
    }
}
