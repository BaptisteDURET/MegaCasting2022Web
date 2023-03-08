<?php

namespace App\Entity;

use App\Repository\MetierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MetierRepository::class)]
class Metier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 50, name: 'Libelle')]
    private ?string $Libelle = null;

    #[ORM\ManyToMany(targetEntity: Casting::class, mappedBy: 'Metier')]
    private Collection $castings;

    #[ORM\ManyToOne(inversedBy: 'metiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DomaineMetier $DomaineMetier = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?FicheMetier $FicheMetier = null;

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
        return $this->Libelle;
    }

    public function setLibelle(string $Libelle): self
    {
        $this->Libelle = $Libelle;

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
        return $this->DomaineMetier;
    }

    public function setDomaineMetier(?DomaineMetier $DomaineMetier): self
    {
        $this->DomaineMetier = $DomaineMetier;

        return $this;
    }

    public function getFicheMetier(): ?FicheMetier
    {
        return $this->FicheMetier;
    }

    public function setFicheMetier(?FicheMetier $FicheMetier): self
    {
        $this->FicheMetier = $FicheMetier;

        return $this;
    }
}
