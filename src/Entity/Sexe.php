<?php

namespace App\Entity;

use App\Repository\SexeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SexeRepository::class)]
#[ORM\Table(name: 'Sexe')]
class Sexe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(name: 'Libelle', length: 50)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'sexe', targetEntity: Artiste::class)]
    private Collection $artistes;

    #[ORM\ManyToMany(targetEntity: Casting::class, mappedBy: 'sexe')]
    #[ORM\JoinTable(name: 'Recherche')]
    private Collection $castings;

    public function __construct()
    {
        $this->artistes = new ArrayCollection();
        $this->castings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Artiste>
     */
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): self
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes->add($artiste);
            $artiste->setSexe($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): self
    {
        if ($this->artistes->removeElement($artiste)) {
            // set the owning side to null (unless already changed)
            if ($artiste->getSexe() === $this) {
                $artiste->setSexe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Casting>
     */
    public function getCastings(): Collection
    {
        return $this->castings;
    }

    public function addCasting(Casting $casting): self
    {
        if (!$this->castings->contains($casting)) {
            $this->castings->add($casting);
            $casting->addSexe($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): self
    {
        if ($this->castings->removeElement($casting)) {
            $casting->removeSexe($this);
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->libelle;
    }
}
