<?php

namespace App\Entity;

use App\Repository\PackDeCastingsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackDeCastingsRepository::class)]
class PackDeCastings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Libelle = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $NombreCastings = null;

    #[ORM\Column]
    private ?float $Prix = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $TempsDiffusionOffreEnHeures = null;

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
}
