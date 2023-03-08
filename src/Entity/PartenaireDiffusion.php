<?php

namespace App\Entity;

use App\Repository\PartenaireDiffusionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartenaireDiffusionRepository::class)]
#[ORM\Table(name: 'PartenaireDiffusion')]
class PartenaireDiffusion extends Utilisateur
{

    #[ORM\Column(name: 'Entreprise', length: 50)]
    private ?string $entreprise = null;

    #[ORM\Column(name: 'Verifie', type: 'boolean')]
    private ?bool $verifie = null;

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function isVerifie(): ?bool
    {
        return $this->verifie;
    }

    public function setVerifie(bool $verifie): self
    {
        $this->verifie = $verifie;

        return $this;
    }
}
