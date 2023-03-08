<?php

namespace App\Entity;

use App\Repository\FicheMetierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheMetierRepository::class)]
#[ORM\Table(name: 'FicheMetier')]
class FicheMetier extends ContenuEditorial
{
    #[ORM\Column(name: 'Description', type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToOne(targetEntity: Metier::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'Identifiant_Metier', referencedColumnName: 'Identifiant', nullable: false)]
    private ?Metier $Metier = null;

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
