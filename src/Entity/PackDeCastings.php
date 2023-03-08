<?php

namespace App\Entity;

use App\Repository\PackDeCastingsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity(repositoryClass: PackDeCastingsRepository::class)]
#[ORM\Table(name: 'PackDeCastings')]
class PackDeCastings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 50, name: 'Libelle')]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'NombreCastings')]
    private ?int $nombreCastings = null;

    #[ORM\Column(type: Types::FLOAT, name: 'Prix')]
    private ?float $prix = null;

    #[ORM\Column(type: Types::SMALLINT, name: 'TempsDiffusionOffreEnHeures')]
    private ?int $tempsDiffusionOffreEnHeures = null;

    #[ORM\ManyToMany(targetEntity: Professionnel::class, inversedBy: 'packDeCastings')]
    #[JoinTable(name: 'Acheter')]
    #[ORM\JoinColumn(name: 'IdentifiantPack', referencedColumnName: 'Identifiant')]
    #[ORM\InverseJoinColumn(name: 'IdentifiantProfessionnel', referencedColumnName: 'Identifiant')]
    private Collection $professionnel;

    public function __construct()
    {
        $this->professionnel = new ArrayCollection();
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

    public function getNombreCastings(): ?int
    {
        return $this->nombreCastings;
    }

    public function setNombreCastings(int $nombreCastings): self
    {
        $this->nombreCastings = $nombreCastings;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getTempsDiffusionOffreEnHeures(): ?int
    {
        return $this->tempsDiffusionOffreEnHeures;
    }

    public function setTempsDiffusionOffreEnHeures(int $tempsDiffusionOffreEnHeures): self
    {
        $this->tempsDiffusionOffreEnHeures = $tempsDiffusionOffreEnHeures;

        return $this;
    }

    /**
     * @return Collection<int, Professionnel>
     */
    public function getProfessionnel(): Collection
    {
        return $this->professionnel;
    }

    public function addProfessionnel(Professionnel $professionnel): self
    {
        if (!$this->professionnel->contains($professionnel)) {
            $this->professionnel->add($professionnel);
        }

        return $this;
    }

    public function removeProfessionnel(Professionnel $professionnel): self
    {
        $this->professionnel->removeElement($professionnel);

        return $this;
    }
}
