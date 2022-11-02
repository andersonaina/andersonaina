<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\ActeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ActeurRepository::class)]
#[ApiResource(
    normalizationContext: [
        'groups'=>['acteurs_read']
    ]
)]
class Acteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['acteurs_read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['acteurs_read'])]
    private ?string $NomActeur = null;

    #[ORM\Column(length: 255)]
    #[Groups(['acteurs_read'])]
    private ?string $Contact = null;

    #[ORM\Column(length: 255)]
    #[Groups(['acteurs_read'])]
    private ?string $Email = null;

    #[ORM\ManyToOne(inversedBy: 'acteurs')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['acteurs_read'])]
    private ?TypeActeur $TypeActeur = null;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'acteurs')]
    private Collection $acteur;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'acteur')]
    private Collection $acteurs;

    #[ORM\OneToMany(mappedBy: 'acteur', targetEntity: Publication::class)]
    private Collection $Publication;

    #[ORM\ManyToMany(targetEntity: Propriete::class, inversedBy: 'acteurs')]
    #[Groups(['acteurs_read'])]
    private Collection $Propriete;

    #[ORM\ManyToOne(inversedBy: 'acteurs')]
    private ?Pays $Pays = null;

    public function __construct()
    {
        $this->acteur = new ArrayCollection();
        $this->acteurs = new ArrayCollection();
        $this->Publication = new ArrayCollection();
        $this->Propriete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomActeur(): ?string
    {
        return $this->NomActeur;
    }

    public function setNomActeur(string $NomActeur): self
    {
        $this->NomActeur = $NomActeur;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->Contact;
    }

    public function setContact(string $Contact): self
    {
        $this->Contact = $Contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTypeActeur(): ?TypeActeur
    {
        return $this->TypeActeur;
    }

    public function setTypeActeur(?TypeActeur $TypeActeur): self
    {
        $this->TypeActeur = $TypeActeur;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getActeur(): Collection
    {
        return $this->acteur;
    }

    public function addActeur(self $acteur): self
    {
        if (!$this->acteur->contains($acteur)) {
            $this->acteur->add($acteur);
        }

        return $this;
    }

    public function removeActeur(self $acteur): self
    {
        $this->acteur->removeElement($acteur);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getActeurs(): Collection
    {
        return $this->acteurs;
    }

    /**
     * @return Collection<int, Publication>
     */
    public function getPublication(): Collection
    {
        return $this->Publication;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->Publication->contains($publication)) {
            $this->Publication->add($publication);
            $publication->setActeur($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->Publication->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getActeur() === $this) {
                $publication->setActeur(null);
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

    public function getPays(): ?Pays
    {
        return $this->Pays;
    }

    public function setPays(?Pays $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNomActeur().' '.$this->getEmail();
    }
}
