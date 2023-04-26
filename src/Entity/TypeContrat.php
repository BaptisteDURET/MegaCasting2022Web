<?php

namespace App\Entity;

use App\Repository\TypeContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeContratRepository::class)]
#[ORM\Table(name: 'TypeContrat')]
class TypeContrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(name: 'LibelleCourt', length: 10)]
    private ?string $libelleCourt = null;

    #[ORM\Column(name: 'LibelleLong', length: 50)]
    private ?string $libelleLong = null;

    #[ORM\OneToMany(mappedBy: 'typeContrat', targetEntity: Casting::class)]
    private Collection $casting;

    public function __construct()
    {
        $this->casting = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCourt(): ?string
    {
        return $this->libelleCourt;
    }

    public function setLibelleCourt(string $libelleCourt): self
    {
        $this->libelleCourt = $libelleCourt;

        return $this;
    }

    public function getLibelleLong(): ?string
    {
        return $this->libelleLong;
    }

    public function setLibelleLong(string $libelleLong): self
    {
        $this->libelleLong = $libelleLong;

        return $this;
    }

    /**
     * @return Collection<int, Casting>
     */
    public function getCastings(): Collection
    {
        return $this->casting;
    }

    public function addCasting(Casting $casting): self
    {
        if (!$this->casting->contains($casting)) {
            $this->casting->add($casting);
            $casting->setTypeContrat($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): self
    {
        if ($this->casting->removeElement($casting)) {
            // set the owning side to null (unless already changed)
            if ($casting->getTypeContrat() === $this) {
                $casting->setTypeContrat(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->libelleLong;
    }
}
