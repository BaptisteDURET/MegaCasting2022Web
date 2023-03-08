<?php

namespace App\Entity;

use App\Repository\PackDeCastingsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity(repositoryClass: PackDeCastingsRepository::class)]
class PackDeCastings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 50, name: 'Libelle')]
    private ?string $Libelle = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'NombreCastings')]
    private ?int $NombreCastings = null;

    #[ORM\Column(type: Types::FLOAT, name: 'Prix')]
    private ?float $Prix = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'TempsDiffusionOffreEnHeures')]
    private ?int $TempsDiffusionOffreEnHeures = null;

    #[ORM\ManyToMany(targetEntity: Professionnel::class, inversedBy: 'packDeCastings')]
    #[JoinTable(name: 'Acheter')]
    private Collection $Professionnel;

    public function __construct()
    {
        $this->Professionnel = new ArrayCollection();
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

    public function getNombreCastings(): ?int
    {
        return $this->NombreCastings;
    }

    public function setNombreCastings(int $NombreCastings): self
    {
        $this->NombreCastings = $NombreCastings;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getTempsDiffusionOffreEnHeures(): ?int
    {
        return $this->TempsDiffusionOffreEnHeures;
    }

    public function setTempsDiffusionOffreEnHeures(int $TempsDiffusionOffreEnHeures): self
    {
        $this->TempsDiffusionOffreEnHeures = $TempsDiffusionOffreEnHeures;

        return $this;
    }

    /**
     * @return Collection<int, Professionnel>
     */
    public function getProfessionnel(): Collection
    {
        return $this->Professionnel;
    }

    public function addProfessionnel(Professionnel $professionnel): self
    {
        if (!$this->Professionnel->contains($professionnel)) {
            $this->Professionnel->add($professionnel);
        }

        return $this;
    }

    public function removeProfessionnel(Professionnel $professionnel): self
    {
        $this->Professionnel->removeElement($professionnel);

        return $this;
    }
}
