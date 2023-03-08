<?php

namespace App\Entity;

use App\Repository\ProfessionnelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionnelRepository::class)]
class Professionnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Entreprise = null;

    #[ORM\Column]
    private ?bool $Verifie = null;

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
}
