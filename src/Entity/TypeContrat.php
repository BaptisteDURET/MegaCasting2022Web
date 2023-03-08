<?php

namespace App\Entity;

use App\Repository\TypeContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeContratRepository::class)]
class TypeContrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 10, name: 'LibelleCourt')]
    private ?string $LibelleCourt = null;

    #[ORM\Column(length: 50, name: 'LibelleLong')]
    private ?string $LibelleLong = null;

    #[ORM\ManyToMany(targetEntity: Casting::class, mappedBy: 'TypeContrat')]
    private Collection $castings;

    public function __construct()
    {
        $this->castings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleCourt(): ?string
    {
        return $this->LibelleCourt;
    }

    public function setLibelleCourt(string $LibelleCourt): self
    {
        $this->LibelleCourt = $LibelleCourt;

        return $this;
    }

    public function getLibelleLong(): ?string
    {
        return $this->LibelleLong;
    }

    public function setLibelleLong(string $LibelleLong): self
    {
        $this->LibelleLong = $LibelleLong;

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
            $casting->addTypeContrat($this);
        }

        return $this;
    }

    public function removeCasting(Casting $casting): self
    {
        if ($this->castings->removeElement($casting)) {
            $casting->removeTypeContrat($this);
        }

        return $this;
    }
}
