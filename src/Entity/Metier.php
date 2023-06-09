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

    #[ORM\OneToMany(mappedBy: 'metier', targetEntity: Casting::class)]
    private Collection $casting;

    #[ORM\ManyToOne(targetEntity: DomaineMetier::class, inversedBy: 'metier')]
    #[ORM\JoinColumn(name: 'IdentifiantDomaineMetier', referencedColumnName: 'Identifiant', nullable: false)]
    private ?DomaineMetier $domaineMetier = null;

    public function __construct()
    {
        $this->casting = new ArrayCollection();
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
    public function getCasting(): Collection
    {
        return $this->casting;
    }

    public function addCasting(Casting $casting): self
    {
        if (!$this->casting->contains($casting)) {
            $this->casting->add($casting);
            $casting->setMetier($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): self
    {
        if ($this->Casting->removeElement($casting)) {
            // set the owning side to null (unless already changed)
            if ($casting->getMetier() === $this) {
                $casting->setMetier(null);
            }
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
