<?php

namespace App\Entity;

use App\Repository\FicheMetierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheMetierRepository::class)]
#[ORM\Table(name: 'FicheMetier')]
class FicheMetier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'Identifiant')]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, name: 'Description')]
    private ?string $description = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'Identifiant_Metier', nullable: false)]
    private ?Metier $Metier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMetier(): ?Metier
    {
        return $this->Metier;
    }

    public function setMetier(Metier $Metier): self
    {
        $this->Metier = $Metier;

        return $this;
    }
}
