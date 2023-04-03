<?php

namespace App\Entity;

use App\Repository\MetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetierRepository::class)]
#[ORM\Table(name: 'Metier')]
class Metier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(name: 'Libelle', length: 50)]
    private ?string $libelle = null;

    #[ORM\ManyToMany(targetEntity: Casting::class, mappedBy: 'metiers')]
    #[ORM\JoinTable(name: 'Cherche')]
    private Collection $castings;

    #[ORM\ManyToOne(targetEntity: DomaineMetier::class, inversedBy: 'metiers')]
    #[ORM\JoinColumn(name: 'Identifiant_Domaine_Metier', referencedColumnName: 'Identifiant', nullable: false)]
    private ?DomaineMetier $domaineMetier = null;

    public function __construct()
    {
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
            $casting->addMetier($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): self
    {
        if ($this->castings->removeElement($casting)) {
            $casting->removeMetier($this);
        }

        return $this;
    }

    public function getDomaineMetier(): ?DomaineMetier
    {
        return $this->domaineMetier;
    }

    public function setDomaineMetier(?DomaineMetier $domaineMetier): self
    {
        $this->domaineMetier = $domaineMetier;

        return $this;
    }
    public function __toString(): string
    {
        return $this->libelle;
    }
}
