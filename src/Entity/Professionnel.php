<?php

namespace App\Entity;

use App\Repository\ProfessionnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionnelRepository::class)]
class Professionnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 50, name: 'Entreprise')]
    private ?string $Entreprise = null;

    #[ORM\Column(type: 'boolean', name: 'Verifie')]
    private ?bool $Verifie = null;

    #[ORM\ManyToMany(targetEntity: PackDeCastings::class, mappedBy: 'Professionnel')]
    private Collection $packDeCastings;

    #[ORM\OneToMany(mappedBy: 'professionnel', targetEntity: Casting::class)]
    private Collection $Casting;

    public function __construct()
    {
        $this->packDeCastings = new ArrayCollection();
        $this->Casting = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntreprise(): ?string
    {
        return $this->Entreprise;
    }

    public function setEntreprise(string $Entreprise): self
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }

    public function isVerifie(): ?bool
    {
        return $this->Verifie;
    }

    public function setVerifie(bool $Verifie): self
    {
        $this->Verifie = $Verifie;

        return $this;
    }

    /**
     * @return Collection<int, PackDeCastings>
     */
    public function getPackDeCastings(): Collection
    {
        return $this->packDeCastings;
    }

    public function addPackDeCasting(PackDeCastings $packDeCasting): self
    {
        if (!$this->packDeCastings->contains($packDeCasting)) {
            $this->packDeCastings->add($packDeCasting);
            $packDeCasting->addProfessionnel($this);
        }

        return $this;
    }

    public function removePackDeCasting(PackDeCastings $packDeCasting): self
    {
        if ($this->packDeCastings->removeElement($packDeCasting)) {
            $packDeCasting->removeProfessionnel($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Casting>
     */
    public function getCasting(): Collection
    {
        return $this->Casting;
    }

    public function addCasting(Casting $casting): self
    {
        if (!$this->Casting->contains($casting)) {
            $this->Casting->add($casting);
            $casting->setProfessionnel($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): self
    {
        if ($this->Casting->removeElement($casting)) {
            // set the owning side to null (unless already changed)
            if ($casting->getProfessionnel() === $this) {
                $casting->setProfessionnel(null);
            }
        }

        return $this;
    }
}
