<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteRepository::class)]
#[ORM\Table(name: 'Artiste')]
class Artiste extends Utilisateur
{
    #[ORM\Column(name: 'CV', length: 200)]
    private ?string $cv = null;

    #[ORM\Column(name: 'Nom', length: 50)]
    private ?string $nom = null;

    #[ORM\Column(name: 'Prenom', length: 50)]
    private ?string $prenom = null;

    #[ORM\ManyToOne(targetEntity: Sexe::class, inversedBy: 'artistes')]
    #[ORM\JoinColumn(name: 'Identifiant_Sexe', referencedColumnName: 'Identifiant', nullable: false)]
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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
