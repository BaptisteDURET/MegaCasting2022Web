<?php

namespace App\Entity;

use App\Repository\InterviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterviewRepository::class)]
#[ORM\Table(name: 'Interview')]
class Interview extends ContenuEditorial
{
    #[ORM\Column(name: 'Lien', length: 200)]
    private ?string $lien = null;

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }
}
