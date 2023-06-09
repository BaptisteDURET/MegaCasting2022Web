<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteRepository::class)]
#[ORM\Table(name: 'Artiste')]
class Artiste extends Utilisateur
{
    #[ORM\Column(name: 'CV', length: 200, nullable: true)]
    private ?string $cv = null;

    #[ORM\ManyToOne(targetEntity: Sexe::class, inversedBy: 'artistes')]
    #[ORM\JoinColumn(name: 'IdentifiantSexe', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Sexe $sexe = null;

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
}
