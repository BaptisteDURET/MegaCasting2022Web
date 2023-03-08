<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteRepository::class)]
class Artiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(length: 200, name: 'CV')]
    private ?string $CV = null;

    #[ORM\Column(length: 50, name: 'Nom')]
    private ?string $Nom = null;

    #[ORM\Column(length: 50, name: 'Prenom')]
    private ?string $Prenom = null;

    #[ORM\ManyToOne(inversedBy: 'artistes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Sexe $Sexe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(string $CV): self
    {
        $this->CV = $CV;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->Sexe;
    }

    public function setSexe(?Sexe $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }
}
